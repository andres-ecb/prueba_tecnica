<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Categoria, Producto};
use App\Services\FiltradoTexto;

class InventarioController extends Controller
{
    protected $filtrado;
    public function __construct(FiltradoTexto $filtrado)
    {
        $this->filtrado = $filtrado;
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
        $filtrado_nombre = $this->filtrado->filtrar_texto($request->nombre);

	    $existe = Categoria::whereRaw('LOWER(REPLACE(REPLACE(REPLACE(nombre, "á", "a"), "é", "e"), "í", "i")) = ?', [$filtrado_nombre])
                    ->exists();

        if ($existe) {
            return redirect()->back()->with('error', 'La categoria ' . $request->nombre . ' ya existe');
        }
        $categoria = Categoria::create($request->all());
        return redirect()->back()->with('success', 'La categoria '. $categoria->nombre .' fue creada exitosamente');
    }

    public function update_categoria(Request $request, $id)
    {
        $request->validate(['nombre' => 'required|string|max:100']);
        $filtrado_nombre = $this->filtrado->filtrar_texto($request->nombre);
        $existe = Categoria::whereRaw('LOWER(REPLACE(REPLACE(REPLACE(nombre, "á", "a"), "é", "e"), "í", "i")) = ?', [$filtrado_nombre])
                        ->where('id', '<>', $id)
                        ->exists();

            if ($existe) {
                return redirect()->back()->with('error', 'La categoría ' . $request->nombre . ' ya existe');
            }
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
        return redirect()->back()->with('success', 'La categoria '. $categoria->nombre .' fue actualizada exitosamente');
    }

}
