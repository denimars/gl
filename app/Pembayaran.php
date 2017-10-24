<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = "pembayaran";
    protected $fillable = ['no_ptk', 'jum', 'no_pin'];
}
