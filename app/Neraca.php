<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neraca extends Model
{
    protected $table = 'neraca';
    protected $fillable = ['kelompok', 'departemen', 'noakun', 'nama', 'nominal', 'bulan'];
}
