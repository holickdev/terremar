<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User; // Ejemplo de modelo para obtener usuarios activos
use App\Models\Person; // Ejemplo de modelo para obtener usuarios activos
use App\Models\Faq; // Ejemplo de modelo para obtener usuarios activos

use App\Models\Property; // Ejemplo de modelo para obtener usuarios activos

class DashboardController extends Controller
{
    // Método que muestra el dashboard
    public function index()
    {
        // Lógica para obtener datos (ejemplo de usuarios activos y total de ingresos)
        $activeUsers = User::all(); // Contar usuarios activos

        // Retornar la vista del dashboard con los datos
        return view('auth.dashboard', [
            'activeUsers' => $activeUsers
        ]);
    }

    public function properties()
    {

        $properties = Property::all();

        // foreach ($properties as $property){
        //     echo json_encode($property->owner);
        // }

        return view('auth.properties', [
            'properties' => $properties,
            'title' => "Todas las Propiedades",
            'action' => "Agregar Propiedad"
        ]);
    }

    public function products()
    {

        $properties = Property::all();

        // foreach ($properties as $property){
        //     echo json_encode($property->owner);
        // }

        return view('auth.products', [
            'properties' => $properties
        ]);
    }

    public function faq()
    {
        $faq = Faq::all();

        return view('auth.faq', ['faq' => $faq]);
    }

    public function advisors()
    {
        $advisors = DashboardController::getAdvisors();

        return view('auth.advisors', [
            'advisors' => $advisors,
            'title' => "Todas los Asesores",
            'action' => "Agregar Asesor"
        ]);
    }

    public function owners()
    {
        $owners = DashboardController::getOwners();

        return view('auth.owners', [
            'owners' => $owners,
            'title' => "Todos los Propietarios",
            'action' => "Agregar Propietario"
        ]);
    }

    public function newProperty()
    {

        $advisors = DashboardController::getAdvisors();

        return view('auth.addproperty', [
            'advisors' => $advisors
        ]);
    }

    private static function getAdvisors()
    {
        return User::with('person')->withCount([
                'properties as houses' => function ($query) {
                    $query->where('type', 'Casa');
                },
                'properties as apartments' => function ($query) {
                    $query->where('type', 'Apartamento');
                },
                'properties as terrains' => function ($query) {
                    $query->where('type', 'Terreno');
                },
                'properties as others' => function ($query) {
                    $query->where('type', 'Others');
                },
            ])->get();
    }

    private static function getOwners()
    {
        return Person::doesntHave('User')->withCount([
                'properties as houses' => function ($query) {
                    $query->where('type', 'Casa');
                },
                'properties as apartments' => function ($query) {
                    $query->where('type', 'Apartamento');
                },
                'properties as terrains' => function ($query) {
                    $query->where('type', 'Terreno');
                },
                'properties as others' => function ($query) {
                    $query->where('type', 'Others');
                },
            ])->get();
    }
}
