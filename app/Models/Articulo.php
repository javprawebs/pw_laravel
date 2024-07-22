<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'articulos';

    protected $fillable = [
        'nombre', 
        'descripcion', 
        'precio', 
        'colores', 
        'tallas', 
        'imagen', 
        'seccion_id'
    ];

    // Convierte los json a arrays automáticamente
    protected $casts = [
        'colores' => 'array',
        'tallas' => 'array'
    ];

    public function seccion()
    {
        return $this->belongsTo(Seccion::class);
    }


}
