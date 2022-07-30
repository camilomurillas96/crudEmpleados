<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use stdClass;

class Empleado extends Model
{
    protected $table = 'empleado';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre', 'email', 'sexo', 'area_id', 'boletin', 'descripcion'
    ];
    public $timestamps = false;

   

    

    // Relation Empleado - area
    public function area(){
        return $this->belongsTo(Area::class);
    }

    // Muchos a muchos
    public function roles(){
        return $this->belongsToMany(Rol::class); 
    }
}
