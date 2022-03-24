<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table = 'producto';
    protected $primaryKey = 'id_producto';

    public $timestamps = true;

    protected $fillable = [
        'id_cat_pro',
        'modelo',
        'nro_parte',
        'marca',
        'motor',
        'precio',
        'precio_compra',
        'stock',
        'aplicacion',
        'destacado',
        'estado'
    ];  
}