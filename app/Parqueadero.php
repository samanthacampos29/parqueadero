<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parqueadero extends Model
{
    protected $fillable = ['nombre', 'puestoautos', 'puestomotos'];
}
