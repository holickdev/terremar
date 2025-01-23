<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Valida los datos
        Mail::to('chacho06122004@gmail.com')
            ->send(new ContactMessage());

        Log::info('Correo enviado');

        // Redirige con mensaje de éxito
        return redirect()->back()->with('success', 'Tu mensaje ha sido enviado con éxito.');
    }
}

