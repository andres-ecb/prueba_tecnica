@extends('layouts.app')
@section('titulo')
    MVP - Inventario
@endsection
@push('css')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/g_productos.css') }}">

@endpush
@section('contenido')
    @section('nom_pagina', 'Inventario')
    <div id="comp">
        @if(session('success'))
            <div class="alert alert-success text-center w-50 mx-auto">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger text-center w-50 mx-auto">
                {{ session('error') }}
            </div>
        @endif
        <div id="subtitulos"><h2 class="text-center">Productos</h2></div>
        
        
        <div id="search-container" class="text-center mb-4 p-4 mx-auto" style="border-collapse: collapse; width: 70%;">
            <input type="text" id="campo-busq" class="form-control" placeholder="¿Desea buscar un producto por su nombre? Escríbalo aquí">
        </div>
        <main style="display: flex; justify-content: center;">
            <table class="text-center" style="border-collapse: collapse; width: 70%;">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Stock Actual</th>
                        <th>Stock Mínimo</th>
                        <th>Diferencia</th>
                    </tr>
                </thead>
                <tbody id="tabla-productos">
                    @forelse($productos as $prd)
                    <tr class="{{ $prd->stock_actual < $prd->stock_minimo ? 'stock-alerta' : '' }}">
                        <td>
                            <div class="prod-nombre">{{ $prd->nombre }}</div>
                            <div class="text-muted" style="font-size: 0.95rem;">
                                Categoría: {{ $prd->categoria->nombre }}
                            </div>
                            <div class="text-muted" style="font-size: 0.85rem;">
                                Precio: ${{ $prd->precio }}
                            </div>
                        </td>
                        <td>{{ $prd->stock_actual }}</td>
                        <td>{{ $prd->stock_minimo }}</td>
                        <td >
                            @php
                                $diferencia = $prd->stock_actual - $prd->stock_minimo;
                            @endphp

                            @if($diferencia < 0)
                                <span class="text-danger fw-bold">
                                    <i class="fa-solid fa-triangle-exclamation me-1"></i>
                                    {{ $diferencia }}
                                </span>
                            @elseif($diferencia <= 8)
                                <span style="color: orange; font-weight: bold;">
                                    <i class="fa-solid fa-circle-exclamation me-1"></i>
                                    {{ $diferencia }}
                                </span>
                            @else
                                <span style="color: green;">
                                    {{ $diferencia }}
                                </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            No hay productos registrados
                        </td>
                    </tr>                  
                    @endforelse
                </tbody>
            </table>
        </main>
    </div>
    <div id="comp">
        <div id="subtitulos"><h2 class="text-center">Categorías</h2></div>
        
        <div class="text-center">
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#crearCategoriaModal">
            <i class="fa-solid fa-plus text-white"></i> Nueva Categoría
        </button></div> 

        <main style="display: flex; justify-content: center;">
            <table class="table table-striped table-hover text-center" style="border-collapse: collapse; width: 70%;">
                <thead>
                    <tr>
                        <th>Categoría</th>
                        <th style="width: 26%;">Cantidad de Productos</th>
                        <th style="width: 22%;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categorias as $ctg)
                    <tr>
                        <td>{{ $ctg->nombre }}</td>
                        <td>{{ $ctg->productos_count }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editarCategoriaModal{{ $ctg->id }}">Editar</button>
                        </td>
                    </tr>
                    @include('gestion_productos.modales.editar_categoria', ['ctg' => $ctg])
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            No hay categorías registradas.
                        </td>
                    </tr>                  
                    @endforelse
                </tbody>
            </table>
        </main>
        @include('gestion_productos.modales.crear_categoria')
    </div>
                            
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
                                
            function removeAccents(str) {
                return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            }
                                
                                            $("#campo-busq").on("keyup", function() {
                                                var value = removeAccents($(this).val().trim().toLowerCase());
                                                $("#tabla-productos tr").filter(function() {
                                                    var cargoName = removeAccents($(this).find(".prod-nombre").text().toLowerCase());
                                                    $(this).toggle(cargoName.indexOf(value) > -1);
                                                });
            });
                                
                                            
                                
        });
    </script>                    
@endsection