<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado_Rol extends Model
{
    //
    protected $table = 'empleado_rol';
    protected $primaryKey = 'id';
    protected $fillable = [ 'empleado_id', 'rol_id' ];
    public $timestamps = false;
}
