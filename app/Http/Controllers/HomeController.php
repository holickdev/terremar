<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Municipality;
use App\Models\Type;
use App\Models\Trade;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $types = Type::pluck('name')->toArray();
        $trades = Trade::pluck('name')->toArray();
        $municipalities = Municipality::pluck('name')->toArray();

        return view('index', compact('types','trades', 'municipalities')); // Esto retorna la vista "welcome.blade.php"
    }
}
