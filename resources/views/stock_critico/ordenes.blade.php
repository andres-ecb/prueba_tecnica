@extends('layouts.app')
@section('titulo')
    MVP - Órdenes de Reposición
@endsection
@push('css')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/g_productos.css') }}">

@endpush
@section('contenido')
    @section('nom_pagina', 'Órdenes de Reposición')
    
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
            <table class="table table-striped table-hover table-secondary text-center" style="border-collapse: collapse; width: 70%;">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th style="width: 18%;">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ordenes as $orp)
                    <tr>
                        <td>{{ $orp->producto->nombre }}</td>
                        <td>{{ $orp->fecha_solicitud }}</td>
                        <td>{{ $orp->cantidad }}</td>
                        <td>{{ $orp->estado }}</td>
                        
                    </tr>
                    
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            No hay órdenes de reposición creadas
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