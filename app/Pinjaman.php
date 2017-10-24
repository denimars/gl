<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $table="pinjaman";
    protected $fillable = ['no_ptk', 'jum', 'no_pin', 'potongan'];

}
