<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;


class BlogController extends Controller
{


    public function index()
    {
        $blogs = Blog::Paginate(8);

        return view('auth.blog-index', [
            'blogs' => $blogs,
            'title' => "Todos los Blogs",
            'action' => "Agregar Blog"
        ]);
    }

    public function publicIndex()
    {
        $blogs = Blog::Paginate(8);

        return view('blog', compact('blogs'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.blog-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'title'       => 'required|string|max:128',
            'type'        => 'required|string|max:50',
            'description' => 'nullable|string|max:256',
            'body'        => 'required|string',
            'picture'     => 'required|image|mimes:jpg,jpeg,png|max:2048', // Opcional, para subir imágenes
        ]);

        // Manejo de la imagen si se sube
        if ($request->hasFile('picture')) {
            $validatedData['picture'] = $request->file('picture')->store('uploads', 'public');
        }

        // Agregar el `user_id` del usuario autenticado
        $validatedData['user_id'] = Auth::id();

        // Crear el registro en la base de datos
        Blog::create($validatedData);

        session()->flash('success', 'Blog Creado Exitosamente');

        // Redirigir con mensaje de éxito
        return redirect()->route('dashboard.blog.create');
    }

    /**
     * Display the specified resource.
     */
    public function show($title)
    {
        $blog = Blog::where('title', $title)->first();

        if (!$blog) {
            abort(404, 'Blog no encontrado');
        }

        return view('auth.blog-show', [
            'blog' => $blog,
            'title' => $blog->title,
        ]);
    }

    public function publicShow($title)
    {
        $blog = Blog::where('title', $title)->first();

        if (!$blog) {
            abort(404, 'Blog no encontrado');
        }

        $related = Blog::where('type', $blog->type)->take(4)->get();



        return view('blog-view', [
            'blog' => $blog,
            'related' => $related
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($title)
    {
        $blog = Blog::where('title', $title)->first();

        if (!$blog) {
            abort(404, 'Blog no encontrado');
        }

        return view('auth.blog-edit', [
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $Blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($title)
    {
        $blog = Blog::where('title', $title)->first();


        try {
            DB::transaction(function () use ($blog) {

                $blog->delete();

                session()->flash('success', 'Propiedad eliminada exitosamente');
            });
        } catch (\Exception $e) {
            // Captura la excepción y envía un mensaje de error
            session()->flash('error', 'Hubo un error al eliminar el blog. Por favor, intenta nuevamente.' . $e);
        }

        // Retornar la vista con la propiedad cargada
        return redirect(route('dashboard.blog.index'));
    }
}
