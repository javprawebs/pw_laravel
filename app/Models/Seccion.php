<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;

    protected $table = 'secciones';  // Especifica el nombre de la tabla

    protected $fillable = ['nombre'];

    public function articulos()
    {
        return $this->hasMany(Articulo::class);
    }
}
