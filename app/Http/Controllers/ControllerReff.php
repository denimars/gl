<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reff;

class ControllerReff extends Controller
{
    public function get_no(){
      $data = Reff::select('no')->get();
      $nil = $data[0]['no'];
      Reff::where('no', $nil)->update(['no'=>$nil + 1]);
    }

    public function CekNumber(){
      $data = Reff::select('no')->get();
      $nil = $data[0]['no'];
      return $nil;
    }
}
