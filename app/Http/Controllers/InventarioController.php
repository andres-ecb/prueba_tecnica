<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Categoria, Producto};
use App\Services\TextService;

class InventarioController extends Controller
{
    protected $textService;
    public function __construct(TextService $textService)
    {
        $this->textService = $textService;
    }
    public function index()
    {
        $categorias = Categoria::withCount('productos')->get();
        $productos = Producto::with('categoria')->orderBy('nombre', 'asc')->get();
        return view('gestion_productos.index', compact('categorias', 'productos'));
    }

    public function store_categoria(Request $request)
    {
        $request->validate(['nombre' => 'required|string|max:100']);
        $filtrado_nombre = $this->textService->filtrar_texto($request->nombre);

	    $exists = Categoria::whereRaw('LOWER(REPLACE(REPLACE(REPLACE(nombre, "á", "a"), "é", "e"), "í", "i")) = ?', [$filtrado_nombre])
                    ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'La categoria <b>' . $request->nombre . '</b> ya existe');
        }
        $categoria = Categoria::create($request->all());
        return redirect()->back()->with('success', 'La categoria <b>'. $categoria->nombre .'</b> fue creada exitosamente');
    }

}
