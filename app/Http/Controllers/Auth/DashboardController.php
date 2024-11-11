<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User; // Ejemplo de modelo para obtener usuarios activos
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

    public function properties(){

        $properties = Property::all();

        return view('auth.properties', [
            'properties' => $properties
        ]);
    }

    public function newProperty(){
        return view('auth.addproperty');
    }

}
