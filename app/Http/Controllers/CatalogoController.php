<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogoController extends Controller
{
    public function index()
    {
        $imagenes = Storage::disk('public')->files('images');
        return view('catalogo', ['imagenes' => $imagenes]);
    }
}
