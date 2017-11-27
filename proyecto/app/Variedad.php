<?php

namespace proyecto;

use Illuminate\Database\Eloquent\Model;

class Variedad extends Model
{
    protected $table = 'variedad';
    protected $fillable = ['nombre_variedad','id_producto'];
    protected $primaryKey = 'id_variedad';
}
