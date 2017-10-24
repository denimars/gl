<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ptk extends Model
{
    protected $table = "ptk";
    protected $fillable = ['no_ptk', 'nama', 'lembaga', 'no_pin','telp', 'sts'];
}
