<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\User; // Ejemplo de modelo para obtener usuarios activos
use App\Models\Person; // Ejemplo de modelo para obtener usuarios activos
use App\Models\Owner; // Ejemplo de modelo para obtener usuarios activos
use App\Models\Faq; // Ejemplo de modelo para obtener usuarios activos
use App\Models\Blog; // Ejemplo de modelo para obtener usuarios activos

use App\Models\Property; // Ejemplo de modelo para obtener usuarios activos

class DashboardController extends Controller
{

    use AuthorizesRequests;

    // Método que muestra el dashboard
    public function index()
    {
        // Lógica para obtener datos (ejemplo de usuarios activos y total de ingresos)
        $count = Property::counter();
        $percent = Property::percent();
        $liquid = Property::liquid();
        $age = Owner::age();
        $title = "Dashboard";
        $action = "Crear Reporte";

        // Retornar la vista del dashboard con los datos
        return view('auth.dashboard-index', compact('count', 'percent', 'liquid', 'age', 'title', 'action'));
    }

    public function profile()
    {
        $profile = Auth::user();

        $disabled = true;

        return view('auth.profile', compact('profile','disabled'));
    }

    public function profile_edit()
    {
        $profile = Auth::user();

        $disabled = false;

        return view('auth.profile', compact('profile','disabled'));

    }



    public function faq()
    {
        $faq = Faq::all();

        return view('auth.faq', ['faq' => $faq]);
    }

    public function blog()
    {
        $blogs = Blog::all();

        return view('auth.blog-manager', [
            'blogs' => $blogs,
            'title' => "Todos los Blogs",
            'action' => "Agregar Blog"
        ]);
    }

    public function newBlog()
    {
        return view('auth.add-blog');
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
