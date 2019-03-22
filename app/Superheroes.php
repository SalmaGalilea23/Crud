<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Superheroes extends Model
{
    protected $fillable = ['nombre','poder','creador','villano'];
}
