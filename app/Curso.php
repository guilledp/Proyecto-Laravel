<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{

    public $table = 'cursos';
    public $primaryKey ='id';
    public $timestamps = 'true';
    protected $guarded = [];

}
