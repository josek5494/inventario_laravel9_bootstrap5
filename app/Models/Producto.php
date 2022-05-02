<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'observaciones',
        'id_categoria'
    ];

    public function almacenes()
    {
        return $this->belongsToMany(Almacen::class, 'productos_almacenes');
    }

    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
    }

}
