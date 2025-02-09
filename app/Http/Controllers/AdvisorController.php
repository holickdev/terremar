<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Advisor;
use Illuminate\Http\Request;
use App\Http\Requests\AdvisorUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $advisor = User::findOrFail($id);
        $gender = ['Masculino','Femenino','Otro'];

        return view('auth.advisor-show', compact('advisor','gender'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $advisor = User::findOrFail($id);
        $gender = ['Masculino','Femenino','Otro'];

        return view('auth.advisor-edit', compact('advisor','gender'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdvisorUpdateRequest $request, Advisor $advisor)
    {
        // dd($advisor);
        // Validación de los datos del formulario
        $data = $request->validated();

        try {
            DB::transaction(function () use ($data,$advisor) {
                // Obtener el perfil
                // Actualizar los datos del perfil
                $advisor->person->update([
                    'identification' => $data['identification'],
                    'name' => $data['name'],
                    'lastname' => $data['lastname'],
                    'phone' => $data['phone'],
                    'birthdate' => $data['birthdate'],
                    'gender' => $data['gender'],
                ]);

                $picture = $advisor->picture;

                if (isset($data['picture'])) {
                    if ($picture) {
                        // Limpia la ruta si es necesario
                        $picture = str_replace('\\', '/', $picture);

                        // Verifica si el archivo existe y elimínalo
                        if (Storage::disk('public')->exists($picture)) {
                            Storage::disk('public')->delete($picture); // Ahora apunta correctamente al disco 'public'
                        }
                    }
                    $picture = $data['picture']->store('profile', 'public'); // Almacena en storage/app/public/media
                }

                $advisor->update([
                    'email' => $data['email'],
                    'picture' => $picture
                ]);
            });
            session()->flash('success', 'Asesor actualizado exitosamente.');
        } catch (\Exception $e) {
            // Captura la excepción y envía un mensaje de error
            session()->flash('error', 'Hubo un error al actualizar al asesor. Por favor, intenta nuevamente.<br/>' . $e);
            // (Opcional) Loguear el error para análisis
            // \Log::error('Error al registrar propiedad: ' . $e->getMessage());
        }

        // Redirigir a una página de éxito o con mensaje
        return redirect()->route('dashboard.advisor.show',$advisor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    public function property($id){
        $user = Advisor::with('person:id,name,lastname')->findOrFail($id);

        $properties = $user->properties;

        $title = "Propiedades de ".$user->person->name." ".$user->person->lastname;

        $action = "Agregar Propiedad al Asesor";

        return view('auth.advisor-property', compact('properties','title','action'));
    }


}
