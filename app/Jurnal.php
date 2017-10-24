<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    protected $table = 'jurnal';
    protected $fillable = ['kelompok', 'departemen', 'noakun','reff', 'nama', 'tgl', 'keterangan', 'posisi', 'nominal', 'user'];
}
