<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Property;
use App\Models\Person;
use App\Models\UserProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::all();
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
        DB::transaction(function () use ($request) { // Usa "use" para acceder a $request
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
                'addresses_id' => $ownerAddress->id, // Relación con la dirección del dueño
            ]);

            // 3. Insertar la dirección de la propiedad
            $propertyAddress = Address::create([
                'state' => $request->input('state'),
                'municipality' => $request->input('municipality'),
                'parish' => $request->input('parish'),
                'point_reference' => $request->input('point_reference')
            ]);

            // 4. Crear la propiedad y asociar la dirección y el dueño
            $property = Property::create([
                'owner_id' => $owner->id,  // Relación con el dueño
                'title' => $request->input('title'),
                'price' => $request->input('price'),
                'area' => $request->input('area'),
                'bedrooms' => $request->input('bedrooms'),
                'bathrooms' => $request->input('bathrooms'),
                'parkings' => $request->input('parkings'),
                'type' => $request->input('type'),
                'class' => $request->input('class'),
                'description' => $request->input('description'),
                'captation_date' => $request->input('start_captation'),
                'address_id' => $propertyAddress->id,  // Relación con la dirección de la propiedad
            ]);

            $advisor = Person::where('identification', $request->input('advisorIdentification'))->first();

            // ->where('identification','=',$request->input('advisorIdentification'));

            $user_property = UserProperty::Create([
                'user_id' => $advisor->id,
                'property_id' => $property->id,
            ]);

            // Si algo falla aquí, toda la transacción se deshace.
        });

        return redirect::to('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $property = Property::find($id);

        return view('products', [
            'property' => $property
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
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
