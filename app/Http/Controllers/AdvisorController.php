<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Advisor;
use Illuminate\Http\Request;

class AdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advisors = Advisor::getAdvisors();

        return view('auth.advisor-index', [
            'advisors' => $advisors,
            'title' => "Todas los Asesores",
            'action' => "Agregar Asesor"
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $profile = User::findOrFail($id);

        return view('auth.advisor-show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $profile = User::findOrFail($id);

        $disabled = false;

        return view('auth.advisor-show', compact('profile', 'disabled'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'identification' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'gender' => 'required|string',
        ]);

        // Obtener el perfil
        $profile = User::findOrFail($id);

        // Actualizar los datos del perfil
        $profile->person->update([
            'identification' => $request->input('identification'),
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'phone' => $request->input('phone'),
            'birthdate' => $request->input('birthdate'),
            'gender' => $request->input('gender'),
        ]);

        // Actualizar el email del perfil
        $profile->update([
            'email' => $request->input('email'),
        ]);

        session()->flash('success', 'Datos Actualizados Exitosamente.');

        // Redirigir a una página de éxito o con mensaje
        return redirect()->route('advisor-show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    public function property($id){
        $user = User::with('person:id,name,lastname')->findOrFail($id);

        $properties = $user->properties;

        $title = "Propiedades de ".$user->person->name." ".$user->person->lastname;

        $action = "Agregar Propiedad al Asesor";

        return view('auth.properties', compact('properties','title','action'));
    }


}
