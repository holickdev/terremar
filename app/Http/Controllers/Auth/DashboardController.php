<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\User; // Ejemplo de modelo para obtener usuarios activos
use App\Models\Person; // Ejemplo de modelo para obtener usuarios activos
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
        $age = Person::age();
        $title = "Dashboard";
        $action = "Crear Reporte";

        // Retornar la vista del dashboard con los datos
        return view('auth.dashboard', compact('count', 'percent', 'liquid', 'age', 'title', 'action'));
    }

    public function profile()
    {
        $profile = User::find(Auth::id());

        return view('auth.profile', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        // Validación de los datos del formulario
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

        // Redirigir a una página de éxito o con mensaje
        return redirect()->route('profile');
    }


    public function properties()
    {

        $user = Auth::user();

        if ($user->isAdmin() || $user->isGerente()) {
            // El admin y gerente ven todos los inmuebles
            $properties = Property::all();
            $title = "Todas las Propiedades";
        } else {
            // Los demás usuarios solo ven sus inmuebles asociados
            $properties = $user->properties;
            $title = "Todas tus Propiedades";
        }

        $action = "Agregar Propiedad";

        return view('auth.properties', compact('properties','title','action'));

        // return $properties;
    }

    public function property($id){
        // Cargar la propiedad con las relaciones 'owner' y 'address' usando Eager Loading
        $property = Property::with('owner', 'address', 'owner.address')->findOrFail($id);
    
        // Autorizar la acción de ver la propiedad
        $this->authorize('view', $property);
    
        // Retornar la vista con la propiedad cargada
        return view('auth.property-view', compact('property'));
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
