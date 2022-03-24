<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    //
    protected $table = 'inventario';
    protected $primaryKey = 'id_inventario';

    public $timestamps = true;

    protected $fillable = [
        'id_producto',
        'id_usuario',
        'id_movimiento',
        'cantidad',
        'stockInicial',
        'stockFinal',
        'obsevaciones',
        'img',
        'estado'
    ];  
}