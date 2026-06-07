<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenReposicion extends Model
{
    protected $table = 'ordenes_reposicion';

    protected $fillable = [
        'producto_id',
        'fecha_solicitud',
        'cantidad',
        'estado'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
