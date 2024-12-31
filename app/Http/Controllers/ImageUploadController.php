<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        // Validar el archivo
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Guardar la imagen en el directorio 'public/uploads'
        $imagePath = $request->file('image')->store('uploads', 'public');

        // Devolver la URL de la imagen
        return response()->json([
            'url' => asset('storage/' . $imagePath)
        ]);
    }
}
