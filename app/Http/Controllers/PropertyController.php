<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Property;
use App\Models\User;
use App\Models\Advisor;
use App\Models\Person;
use App\Models\Trade;
use App\Models\Type;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Requests\PropertyRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PropertyController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        // Asociar automáticamente las políticas con las acciones del controlador
        $this->authorizeResource(Property::class, 'property');
    }

    /**
     * Display a listing of the resource.
     */
    public function publicIndex(Request $request)
    {
        // Obtener parámetros de la URL

        $filters = [
            'trade' => $request->input('trade'), // Valor de trade (si existe)
            'type' => $request->input('type'),   // Valor de type (si existe)
            'municipality' => $request->input('municipality'), // Valor de municipality (si existe)
        ]; // Construir la consulta dinámica

        // Aplicar el scope y obtener los resultados
        $properties = Property::filter($filters)
            ->with(['trade', 'type'])
            ->paginate(8);

        return view('property-index', ['properties' => $properties]);
    }

    public function index()
    {
        $user = Auth::user();
        $action = "Agregar Propiedad";
        if ($user->isAdmin() || $user->isGerente()) {
            // El admin y gerente ven todos los inmuebles
            $properties = Property::all();
            $title = "Todas las Propiedades";
        } else {
            // Los demás usuarios solo ven sus inmuebles asociados
            $advisor = Advisor::findOrFail($user->id);
            $properties = $advisor->properties;
            $title = "Todas tus Propiedades";
        }


        return view('auth.property-index', compact('properties', 'title', 'action'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $advisors = Auth::user()->isAdmin()
            ? User::with('person:id,name,lastname,identification')->get()
            : null;

        return view('auth.property-create', compact('advisors'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request)
    {
        // Validar los datos del formulario
        $data = $request->validated();
        $data['user'] = $request->user();

        try {
            DB::transaction(function () use ($data) {

                // dd($data);
                // 1. Insertar la dirección del dueño
                $ownerAddress = Address::createNormalize([
                    'country' => $data['ownerCountry'],
                    'state' => $data['ownerState'],
                    'municipality' => $data['ownerMunicipality'],
                    'parish' => $data['ownerParish'],
                    'point_reference' => $data['ownerPoint_reference'],
                ]);

                // 2. Crear el dueño y asociarle la dirección creada
                $owner = Person::firstOrCreate(
                    ['identification' => $data['identification']],
                    [
                        'name' => $data['name'],
                        'lastname' => $data['lastname'],
                        'birthdate' => $data['birthdate'],
                        'gender' => $data['gender'],
                        'phone' => $data['phone'],
                        'email' => $data['email'],
                        'address_id' => $ownerAddress->id
                    ]
                );

                // 3. Insertar la dirección de la propiedad
                $propertyAddress = Address::createNormalize([
                    'country' => $data['country'],
                    'state' => $data['state'],
                    'municipality' => $data['municipality'],
                    'parish' => $data['parish'],
                    'point_reference' => $data['point_reference'],
                ]);

                $trade = Trade::firstOrCreate(
                    ['name' => $data['trade']]
                );

                $type = Type::firstOrCreate(
                    ['name' => $data['type']]
                );

                // 4. Crear la propiedad y asociar la dirección y el dueño
                $property = Property::create([
                    'owner_id' => $owner->id,
                    'title' => $data['title'],
                    'price' => $data['price'],
                    'area' => $data['area'],
                    'bedrooms' => $data['bedrooms'],
                    'bathrooms' => $data['bathrooms'],
                    'parkings' => $data['parkings'],
                    'type_id' => $type->id,
                    'trade_id' => $trade->id,
                    'social_class' => $data['social_class'],
                    'description' => $data['description'],
                    'captation_start' => $data['captation_start'],
                    'captation_end' => $data['captation_end'],
                    'address_id' => $propertyAddress->id,
                ]);

                // 5. Asociar la propiedad con los asesores
                $advisorIds = collect($data['advisorIdentifications'] ?? [])
                    ->map(fn($identification) => Person::where('identification', $identification)->first()?->user->id)
                    ->filter()
                    ->toArray();

                // Si no hay asesores seleccionados, asociar el usuario actual
                if (empty($advisorIds)) {
                    $advisorIds[] = $data['user']->id;
                }

                $property->advisors()->sync($advisorIds);

                // 6. Subir los archivos multimedia
                if (isset($data['uploadMedia'])) {
                    foreach ($data['uploadMedia'] as $file) {
                        $url = $file->store('media', 'public'); // Almacena en storage/app/public/media
                        Media::create([
                            'property_id' => $property->id,
                            'url' => $url,
                            'type' => $file->getMimeType(), // Tipo MIME del archivo
                        ]);
                    }
                }
            });

            // Si la transacción fue exitosa
            session()->flash('success', 'Propiedad registrada exitosamente.');
        } catch (\Exception $e) {
            // Captura la excepción y envía un mensaje de error
            session()->flash('error', 'Hubo un error al registrar la propiedad. Por favor, intenta nuevamente.<br/>' . $e);
            // (Opcional) Loguear el error para análisis
            // \Log::error('Error al registrar propiedad: ' . $e->getMessage());
        }

        return redirect(route('dashboard.property.create', absolute: false));
    }


    /**
     * Display the specified resource.
     */
    public function publicShow($id)
    {
        $property = Property::with('media')->find($id);

        if ($property && $property->address) {
            $similars = Property::whereHas('address', function ($query) use ($property) {
                $query->where('parish_id', $property->address->parish_id);
            })
                ->where('id', '!=', $property->id) // Excluye la propiedad actual
                ->inRandomOrder() // Orden aleatorio
                ->take(4) // Limita el número de resultados a 4
                ->get();
        } else {
            $similars = collect(); // Devuelve una colección vacía si no se encuentra la propiedad o dirección
        }

        return view('products', [
            'property' => $property,
            'similars' => $similars
        ]);
    }

    public function show(Property $property)
    {
        $property->load(['advisors', 'owner', 'address', 'owner.address.parish.municipality.state.country']);

        // Autorizar la acción de ver la propiedad
        $this->authorize('view', $property);

        // Retornar la vista con la propiedad cargada
        return view('auth.property-show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        $advisors = Auth::user()->isAdmin()
            ? User::with('person:id,name,lastname,identification')->get()
            : null;

        return view('auth.property-edit', compact('property', 'advisors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyRequest $request, Property $property)
    {
        $data = $request->validated();
        $data['user'] = $request->user();

        try {

            DB::transaction(function () use ($data, $property) {
                // Obtener la propiedad existente
                // dd($property);

                // 1. Actualizar la dirección del dueño
                $ownerAddress = Address::findOrFail($property->owner->address_id);
                $ownerAddress = Address::updateNormalize([
                    'country' => $data['ownerCountry'],
                    'state' => $data['ownerState'],
                    'municipality' => $data['ownerMunicipality'],
                    'parish' => $data['ownerParish'],
                    'point_reference' => $data['ownerPoint_reference'],
                ]);

                // 2. Buscar o crear la persona con los datos proporcionados
                $owner = Person::updateOrCreate(
                    [
                        'id' => $property->owner->id,
                        'identification' => $data['identification']
                    ],
                    [
                        'name' => $data['name'],
                        'lastname' => $data['lastname'],
                        'birthdate' => $data['birthdate'],
                        'gender' => $data['gender'],
                        'phone' => $data['phone'],
                        'email' => $data['email'],
                        'address_id' => $ownerAddress->id
                    ]
                );

                // 3. Actualizar la dirección de la propiedad
                $propertyAddress = Address::updateNormalize([
                    'country' => $data['country'],
                    'state' => $data['state'],
                    'municipality' => $data['municipality'],
                    'parish' => $data['parish'],
                    'point_reference' => $data['point_reference'],
                ]);


                // Cambiar la referencia a Negocio y Tipo de Propiedad
                $trade = Trade::firstOrCreate(
                    ['name' => $data['trade']]
                );

                $type = Type::firstOrCreate(
                    ['name' => $data['type']]
                );

                // 4. Actualizar la propiedad
                $property->update([
                    'owner_id' => $owner->id,
                    'address_id' => $propertyAddress->id,
                    'type_id' => $type->id,
                    'trade_id' => $trade->id,
                    'title' => $data['title'],
                    'price' => $data['price'],
                    'area' => $data['area'],
                    'bedrooms' => $data['bedrooms'],
                    'bathrooms' => $data['bathrooms'],
                    'parkings' => $data['parkings'],
                    'social_class' => $data['social_class'],
                    'latitude' => $data['latitude'],
                    'longitude' => $data['longitude'],
                    'description' => $data['description'],
                    'captation_start' => $data['captation_start'],
                    'captation_end' => $data['captation_end'],
                ]);

                // 5. Asociar la propiedad con los asesores
                $advisorIds = collect($data['advisorIdentifications'] ?? [])
                    ->map(fn($identification) => Person::where('identification', $identification)->first()?->user->id)
                    ->filter()
                    ->toArray();

                // Si no hay asesores seleccionados, asociar el usuario actual
                if (empty($advisorIds)) {
                    $advisorIds[] = $data['user']->id;
                }

                $property->advisors()->sync($advisorIds); // Sincronizar los asesores con la propiedad

                // 6.1 Eliminas los archivos multimedia seleccionados
                if (isset($data['deleteMedia'])) {
                    foreach ($data['deleteMedia'] as $fileId) {
                        $media = Media::findOrFail($fileId);
                        if ($media) {

                            // Limpia la ruta si es necesario
                            $filePath = str_replace('\\', '/', $media->url);
                            // dd(Storage::disk('public')->path('media/QZEnDTBIac1BaM8oMaSPVLwyaScInL2Tw5Evs8wj.jpg'));

                            // Verifica si el archivo existe y elimínalo
                            if (Storage::disk('public')->exists($filePath)) {
                                Storage::disk('public')->delete($filePath); // Ahora apunta correctamente al disco 'public'
                            }
                            // Elimina el registro de la base de datos
                            $media->delete();
                        }
                    }
                }


                // 6.2 Agregar los archivos Multimedias subidos
                if (isset($data['uploadMedia'])) {
                    foreach ($data['uploadMedia'] as $file) {
                        if ($file) {
                            $url = $file->store('media', 'public'); // Almacena en storage/app/public/media
                            Media::create([
                                'property_id' => $property->id,
                                'url' => $url,
                                'type' => $file->getMimeType(), // Tipo MIME del archivo
                            ]);
                        }
                    }
                }


                // Si algo falla aquí, toda la transacción se deshace.
                session()->flash('success', 'Propiedad Actualizada Exitosamente');
            });

        } catch (\Exception $e) {
            // Captura la excepción y envía un mensaje de error
            session()->flash('error', 'Hubo un error al actualizar la propiedad. Por favor, intenta nuevamente.<br/>' . $e);
            // (Opcional) Loguear el error para análisis
            // \Log::error('Error al registrar propiedad: ' . $e->getMessage());
        }

        return redirect(route('dashboard.property.edit', [$property], absolute: false));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        try {
            DB::transaction(function () use ($property) {

                $property->delete();

                session()->flash('success', 'Propiedad eliminada exitosamente');
            });
        } catch (\Exception $e) {
            // Captura la excepción y envía un mensaje de error
            session()->flash('error', 'Hubo un error al eliminar la propiedad. Por favor, intenta nuevamente.' . $e);
        }

        // Retornar la vista con la propiedad cargada
        return view('dashboard.property.index', compact('property'));
    }

    public function counter()
    {
        return Property::selectRaw("
            COUNT(*) AS total,
            COUNT(CASE WHEN type = 'Casa' THEN 1 END) AS houses,
            COUNT(CASE WHEN type = 'Apartamento' THEN 1 END) AS apartments,
            COUNT(CASE WHEN type = 'Terreno' THEN 1 END) AS terrains,
            COUNT(CASE WHEN type NOT IN ('Casa', 'Apartamento', 'Terreno') THEN 1 END) AS others
        ")->first();
    }

    public function percent()
    {
        return Property::selectRaw("
            COUNT(*) AS total,
            COUNT(CASE WHEN captation_end >= CURDATE() THEN 1 END) AS captated,
            COUNT(CASE WHEN captation_end < CURDATE() THEN 1 END) AS discaptated,
            COUNT(CASE WHEN captation_end is NULL THEN 1 END) AS uncaptated
        ")->first();
    }
}
