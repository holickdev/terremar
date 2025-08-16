<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function publicIndex()
    {
        $faq = Faq::all();

        return view('faq', [
            'faq' => $faq
        ]);
    }

    public function index()
    {
        $faq = Faq::all();
        return view('auth.faq-index', [
            'faq' => $faq,
            'title' => "Preguntas Frecuentes",
             'action' => '/']);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $Faq)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $Faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $Faq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $Faq)
    {
        //
    }
}
