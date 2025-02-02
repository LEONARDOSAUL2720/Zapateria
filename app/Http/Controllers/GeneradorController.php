<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Productos;

class GeneradorController extends Controller
{
   
    public function imprimir()
    {
        $today = Carbon::now()->format('d/m/Y');
        $pdf = \PDF::loadView('ejemplo', compact('today'));
        return $pdf->download('ejemplo.pdf');
    }
    public function imprimirBD(){
        $productos = Productos::where('estatus', 1)->get(); // Obtiene los productos de la base de datos
        $pdf = \PDF::loadView('ejemplobd', compact('productos')); // Pasa la variable $productos a la vista
        return $pdf->download('ejemplobd.pdf');
    }
 
}
