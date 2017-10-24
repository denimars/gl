<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurnal;

class ControllerLabarugi extends Controller
{

  public function laba_rugi(Request $request){
    $mulai = explode("/", $request->input('start'));
    $selesai = explode("/", $request->input('end'));
    if((count($mulai)==1) &&(count($selesai)==1)){
      $pendapatan = [];
      $biaya = [];
      return view('akuntan.laba_rugi')->with('pendapatan', $pendapatan)->with('biaya', $biaya);
    }else{
      $pendapatan = Jurnal::where('kelompok', 4)->whereBetween('tgl', array($mulai[2]."-".$mulai[1]."-".$mulai[0], $selesai[2]."-".$selesai[1]."-".$selesai[0]))->get();
      $biaya = Jurnal::where('kelompok', 5)->whereBetween('tgl', array($mulai[2]."-".$mulai[1]."-".$mulai[0], $selesai[2]."-".$selesai[1]."-".$selesai[0]))->get();
      return view('akuntan.laba_rugi')->with('pendapatan', $pendapatan)->with('biaya', $biaya);
    }

  }

}
