<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Property;
use App\Models\Person;
use App\Models\UserProperty;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PropertyController extends Controller
{

    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Property::query();

        // if (!empty($type)) {
        //     $query->where('type', $type);
        // }

        $properties = $query->paginate(8);
        return view('services', ['properties' => $properties]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeB(Request $request)
    {
        // Validación de datos
        $validated = $request->validate([
            'ownerState' => 'required|string',
            'ownerMunicipality' => 'required|string',
            'ownerParish' => 'required|string',
            'ownerPoint_reference' => 'required|string',
            'name' => 'required|string',
            'lastname' => 'required|string',
            'birthdate' => 'required|date',
            'identification' => 'required|string',
            'gender' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'state' => 'required|string',
            'municipality' => 'required|string',
            'parish' => 'required|string',
            'point_reference' => 'required|string',
            'title' => 'required|string',
            'price' => 'required|numeric',
            'area' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'parkings' => 'required|integer',
            'type' => 'required|string',
            'class' => 'required|string',
            'description' => 'nullable|string',
            'start_captation' => 'required|date',
            'advisorIdentification' => 'required|string'
        ]);

        DB::transaction(function () use ($validated) {
            // 1. Crear dirección del dueño
            $ownerAddress = Address::create([
                'state' => $validated['ownerState'],
                'municipality' => $validated['ownerMunicipality'],
                'parish' => $validated['ownerParish'],
                'point_reference' => $validated['ownerPoint_reference'],
            ]);

            // 2. Crear al dueño y asociarle su dirección
            $owner = Person::create(array_merge($validated, [
                'addresses_id' => $ownerAddress->id,
            ]));

            // 3. Crear la dirección de la propiedad
            $propertyAddress = Address::create([
                'state' => $validated['state'],
                'municipality' => $validated['municipality'],
                'parish' => $validated['parish'],
                'point_reference' => $validated['point_reference'],
            ]);

            // 4. Crear la propiedad y asociar al dueño y la dirección
            $property = $owner->properties()->create(array_merge($validated, [
                'address_id' => $propertyAddress->id,
            ]));

            // 5. Asociar un asesor a la propiedad
            $advisor = Person::where('identification', $validated['advisorIdentification'])->firstOrFail();
            $property->advisors()->attach($advisor->id);
        });
    }

    public function storeA(Request $request)
    {
        // Validación de datos
        $validated = $request->validate([
            'ownerState' => 'required|string',
            'ownerMunicipality' => 'required|string',
            'ownerParish' => 'required|string',
            'ownerPoint_reference' => 'required|string',
            'name' => 'required|string',
            'lastname' => 'required|string',
            'birthdate' => 'required|date',
            'identification' => 'required|string',
            'gender' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'state' => 'required|string',
            'municipality' => 'required|string',
            'parish' => 'required|string',
            'point_reference' => 'required|string',
            'title' => 'required|string',
            'price' => 'required|numeric',
            'area' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'parkings' => 'required|integer',
            'type' => 'required|string',
            'class' => 'required|string',
            'description' => 'nullable|string',
            'start_captation' => 'required|date',
            'advisorIdentification' => 'required|string'
        ]);

        DB::transaction(function () use ($validated) {
            // 1. Crear dirección del dueño
            $ownerAddress = new Address();
            $ownerAddress->state = $validated['ownerState'];
            $ownerAddress->municipality = $validated['ownerMunicipality'];
            $ownerAddress->parish = $validated['ownerParish'];
            $ownerAddress->point_reference = $validated['ownerPoint_reference'];
            $ownerAddress->save();

            // 2. Crear al dueño y asociarle su dirección
            $owner = new Person();
            $owner->name = $validated['name'];
            $owner->lastname = $validated['lastname'];
            $owner->birthdate = $validated['birthdate'];
            $owner->identification = $validated['identification'];
            $owner->gender = $validated['gender'];
            $owner->phone = $validated['phone'];
            $owner->email = $validated['email'];
            $owner->addresses_id = $ownerAddress->id;
            $owner->save();

            // 3. Crear la dirección de la propiedad
            $propertyAddress = new Address();
            $propertyAddress->state = $validated['state'];
            $propertyAddress->municipality = $validated['municipality'];
            $propertyAddress->parish = $validated['parish'];
            $propertyAddress->point_reference = $validated['point_reference'];
            $propertyAddress->save();

            // 4. Crear la propiedad y asociarla al dueño y la dirección
            $property = new Property();
            $property->title = $validated['title'];
            $property->price = $validated['price'];
            $property->area = $validated['area'];
            $property->bedrooms = $validated['bedrooms'];
            $property->bathrooms = $validated['bathrooms'];
            $property->parkings = $validated['parkings'];
            $property->type = $validated['type'];
            // $property->class = $validated['class'];
            $property->description = $validated['description'];
            // $property->start_captation = $validated['start_captation'];
            $property->address_id = $propertyAddress->id;
            $property->owner_id = $owner->id;
            $property->save();

            // 5. Asociar un asesor a la propiedad
            $advisor = Person::where('identification', $validated['advisorIdentification'])->firstOrFail();
            $property->advisors()->attach($advisor->id);
        });

        return redirect::to('/dashboard');
    }


    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'ownerState' => 'required|string|max:100',
            'ownerMunicipality' => 'required|string|max:100',
            'ownerParish' => 'required|string|max:100',
            'ownerPoint_reference' => 'required|string|max:255',
            'name' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'birthdate' => 'required|date',
            'identification' => 'required|string|unique:person,identification|max:20',
            'gender' => 'required|string|in:male,female,other',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:person,email',
            'state' => 'required|string|max:100',
            'municipality' => 'required|string|max:100',
            'parish' => 'required|string|max:100',
            'point_reference' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'area' => 'required|numeric|min:0',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'parkings' => 'required|integer|min:0',
            'type' => 'required|string|max:50',
            'trade' => 'required|string|max:50',
            'social_class' => 'required|string|max:50',
            'description' => 'required|string|max:2000',
            'captation_start' => 'nullable|date',
            'captation_end' => 'nullable|date|after_or_equal:captation_start',
            'advisorIdentification' => 'required|string|exists:person,identification|max:20',
            'media.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,avi|max:5120', // Cada archivo debe ser imagen o video, máx. 5MB
        ]);

        try {
            DB::transaction(function () use ($request) {
                // 1. Insertar la dirección del dueño
                $ownerAddress = Address::create([
                    'state' => $request->input('ownerState'),
                    'municipality' => $request->input('ownerMunicipality'),
                    'parish' => $request->input('ownerParish'),
                    'point_reference' => $request->input('ownerPoint_reference'),
                ]);

                // 2. Crear el dueño y asociarle la dirección creada
                $owner = Person::create([
                    'name' => $request->input('name'),
                    'lastname' => $request->input('lastname'),
                    'birthdate' => $request->input('birthdate'),
                    'identification' => $request->input('identification'),
                    'gender' => $request->input('gender'),
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    'addresses_id' => $ownerAddress->id,
                ]);

                // 3. Insertar la dirección de la propiedad
                $propertyAddress = Address::create([
                    'state' => $request->input('state'),
                    'municipality' => $request->input('municipality'),
                    'parish' => $request->input('parish'),
                    'point_reference' => $request->input('point_reference'),
                ]);

                // 4. Crear la propiedad y asociar la dirección y el dueño
                $property = Property::create([
                    'owner_id' => $owner->id,
                    'title' => $request->input('title'),
                    'price' => $request->input('price'),
                    'area' => $request->input('area'),
                    'bedrooms' => $request->input('bedrooms'),
                    'bathrooms' => $request->input('bathrooms'),
                    'parkings' => $request->input('parkings'),
                    'type' => $request->input('type'),
                    'trade' => $request->input('trade'),
                    'social_class' => $request->input('social_class'),
                    'description' => $request->input('description'),
                    'captation_start' => $request->input('captation_start'),
                    'captation_end' => $request->input('captation_end'),
                    'address_id' => $propertyAddress->id,
                ]);

                // 5. Asociar la propiedad con el asesor
                $advisor = Person::where('identification', $request->input('advisorIdentification'))->first();
                UserProperty::create([
                    'user_id' => $advisor->user->id,
                    'property_id' => $property->id,
                ]);

                // 6. Subir los archivos multimedia
                if ($request->hasFile('media')) {
                    foreach ($request->file('media') as $file) {
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
            session()->flash('error', 'Hubo un error al registrar la propiedad. Por favor, intenta nuevamente.');
            // (Opcional) Loguear el error para análisis
            // \Log::error('Error al registrar propiedad: ' . $e->getMessage());
        }

        return redirect(route('new_property', absolute: false));
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $property = Property::with('media')->find($id);

        if ($property && $property->address) {
            $similars = Property::whereHas('address', function ($query) use ($property) {
                $query->where('municipality', $property->address->municipality);
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $property = Property::findOrFail($id);

        return view('auth.editproperty', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            // Obtener la propiedad existente
            $property = Property::findOrFail($id);

            // 1. Actualizar la dirección del dueño
            $ownerAddress = Address::findOrFail($property->owner->addresses_id);
            $ownerAddress->update([
                'state' => $request->input('ownerState'),
                'municipality' => $request->input('ownerMunicipality'),
                'parish' => $request->input('ownerParish'),
                'point_reference' => $request->input('ownerPoint_reference'),
            ]);

            // 2. Actualizar los datos del dueño
            $owner = Person::findOrFail($property->owner_id);
            $owner->update([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'birthdate' => $request->input('birthdate'),
                'identification' => $request->input('identification'),
                'gender' => $request->input('gender'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
            ]);

            // 3. Actualizar la dirección de la propiedad
            $propertyAddress = Address::findOrFail($property->address_id);
            $propertyAddress->update([
                'state' => $request->input('state'),
                'municipality' => $request->input('municipality'),
                'parish' => $request->input('parish'),
                'point_reference' => $request->input('point_reference'),
            ]);

            // 4. Actualizar la propiedad
            $property->update([
                'title' => $request->input('title'),
                'price' => $request->input('price'),
                'area' => $request->input('area'),
                'bedrooms' => $request->input('bedrooms'),
                'bathrooms' => $request->input('bathrooms'),
                'parkings' => $request->input('parkings'),
                'type' => $request->input('type'),
                'trade' => $request->input('trade'),
                'class' => $request->input('class'),
                'description' => $request->input('description'),
                'start_captation' => $request->input('start_captation'),
                'pic1' => $request->input('pic1'),
                'pic2' => $request->input('pic2'),
                'pic3' => $request->input('pic3'),
                'pic4' => $request->input('pic4'),
                'pic5' => $request->input('pic5'),
            ]);

            // 5. Actualizar o asignar al asesor
            $advisor = Person::where('identification', $request->input('advisorIdentification'))->firstOrFail();
            $userProperty = UserProperty::updateOrCreate(
                [
                    'property_id' => $property->id,
                ],
                [
                    'user_id' => $advisor->id,
                ]
            );

            // Si algo falla aquí, toda la transacción se deshace.
            session()->flash('success', 'Propiedad Actualizada Exitosamente');
        });

        return redirect::to('/dashboard/properties' . $id);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $property = Property::findOrFail($id);
    
        // Autorizar la acción de ver la propiedad
        $this->authorize('delete', $property);
    
        // Retornar la vista con la propiedad cargada
        return view('auth.property-delete', compact('property'));
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
