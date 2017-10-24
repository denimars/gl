<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loghutang extends Model
{
    protected $table = 'logpotongan';
    protected $fillable = ['nama', 'potongan','jum', 'hutang', 'sisa', 'tgl'];
}
