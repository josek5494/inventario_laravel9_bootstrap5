<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory;
    protected $table = 'almacenes';

    protected $fillable = [
        'nombre',
        'localizacion'
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'productos_almacenes');
    }

}
