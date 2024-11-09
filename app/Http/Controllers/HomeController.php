<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('avaina'); // Esto retorna la vista "welcome.blade.php"
    }
}
