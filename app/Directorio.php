<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directorio extends Model
{
    protected $fillable =['nombre','apellido','telefono','direccion','email','foto'];
    protected $hidden =['created_at','updated_at'];
}
