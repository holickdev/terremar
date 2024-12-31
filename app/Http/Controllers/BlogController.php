<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

use Illuminate\Support\Facades\Auth;


class BlogController extends Controller
{


    public function index()
    {
        $blogs = Blog::Paginate(8);

        return view('blog', compact('blogs'));
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
        $model = Blog::create($validatedData);

        session()->flash('success', 'Blog Creado Exitosamente');

        // Redirigir con mensaje de éxito
        return redirect()->route('new_blog');
    }

    /**
     * Display the specified resource.
     */
    public function dash_show($title)
    {
        $blog = Blog::where('title', $title)->first();

        if (!$blog) {
            abort(404, 'Blog no encontrado');
        }

        return view('auth.blog', [
            'blog' => $blog,
            'title' => "Todos los Blogs",
            'action' => "Agregar Blog"
        ]);
    }

    public function show($title)
    {
        $blog = Blog::where('title', $title)->first();

        $related = Blog::where('type', $blog->type)->take(4)->get();

        if (!$blog) {
            abort(404, 'Blog no encontrado');
        }

        return view('blog-view', [
            'blog' => $blog,
            'related' => $related
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $Blog)
    {
        //
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
    public function destroy(Blog $Blog)
    {
        //
    }
}
