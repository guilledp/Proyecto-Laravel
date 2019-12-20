<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public $table = 'users';
    public $primaryKey ='id';
    public $timestamps = 'true';
    protected $guarded = [];
}
