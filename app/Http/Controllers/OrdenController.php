<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Producto, OrdenReposicion};

class OrdenController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')->whereColumn('stock_actual', '<', 'stock_minimo')->get();
        return view('stock_critico.index', compact('productos'));
    }

    public function show_orden()
    {
        $ordenes = OrdenReposicion::with('producto')->where('estado', 'Pendiente')->get();
        return view('stock_critico.ordenes', compact('ordenes'));
    }

    public function store_orden(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1'
        ]);
        $existe_orden = OrdenReposicion::where('producto_id', $request->producto_id)->where('estado', 'Pendiente')->exists();
        $producto = Producto::findOrFail($request->producto_id);

        if($existe_orden)
        {
            return back()->with('error', 'Ya existe una orden pendiente para el producto "' . $producto->nombre . '".');
        }

        OrdenReposicion::create([
            'producto_id' => $request->producto_id,
            'fecha_solicitud' => now(),
            'cantidad' => $request->cantidad,
            'estado' => 'Pendiente'
        ]);
        
        return redirect()->route('stock_critico.ordenes')->with('success',
            'La orden de reposición para el producto "' . $producto->nombre . '" fue creada correctamente.'
        );
    }
}
