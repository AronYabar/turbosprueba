<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    //
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $fillable = ['id','fecha','turbo','modelo','marca','motor','placa','descripcion','importe','adelanto','condicion1',
    'condicion2','costo_total','cliente_id'];
 
}
