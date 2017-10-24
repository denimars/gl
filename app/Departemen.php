<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = "departemen";
    protected $fillable = ['kelompok','no_dep','nama', 'start', 'end', 'dana_awal', 'dana_akhir'];
}
