@extends('layouts.app')
@section('titulo')
    PT - Stock Crítico
@endsection
@push('css')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/g_productos.css') }}">

@endpush
@section('contenido')
    @section('nom_pagina', 'Productos con Stock crítico')
    
    <div>

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

        <main style="display: flex; justify-content: center;">
            <table class="table table-striped table-hover table-danger text-center" style="border-collapse: collapse; width: 70%;">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Stock Actual</th>
                        <th>Stock Mínimo</th>
                        <th>Diferencia</th>
                        <th style="width: 18%;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $prd)
                    <tr>
                        <td>
                            <div>{{ $prd->nombre }}</div>
                            
                        </td>
                        <td>{{ $prd->stock_actual }}</td>
                        <td>{{ $prd->stock_minimo }}</td>
                        <td >
                            @php
                                $diferencia = $prd->stock_actual - $prd->stock_minimo;
                            @endphp
                            <span class="text-danger fw-bold"><i class="fa-solid fa-triangle-exclamation me-1"></i>
                                {{ $diferencia }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#reponerModal-{{ $prd->id }}">Reponer</button>
                            
                        </td>
                    </tr>
                    @include('stock_critico.modales.crear_orden')
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            No hay productos con stock crítico
                        </td>
                    </tr>                  
                    @endforelse
                </tbody>
            </table>
        </main>
        
    </div>
                
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>                    
@endsection