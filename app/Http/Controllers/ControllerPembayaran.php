<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ptk;
use App\Pembayaran;
use App\Pinjaman;
use App\Http\Controllers\ControllerDepartemen;
use App\Http\Controllers\ControllerJurnal;
use App\Http\Controllers\ControllerReff;
use Auth;

class ControllerPembayaran extends Controller
{

  public function getPinjaman($no_ptk, $no_pin){
    $data = Pinjaman::where('no_ptk', $no_ptk)->where('no_pin', $no_pin)->get();
    $value = 0;
    if(count($data)){
      foreach($data as $a){
        $value = (int)$a->jum + $value;
      }
    }
    return $value;
  }

  public function getPembayaran($no_ptk, $no_pin){
    $data = Pembayaran::where('no_ptk', $no_ptk)->where('no_pin', $no_pin)->get();
    $value = 0;
    if(count($data)){
      foreach ($data as $a) {
        $value = (int)$a->jum + $value;
      }
    }
    return $value;
  }

  public function testing(){
    $data = self::getPembayaran(1,1);
    return $data;
  }

  public function getTotal($no_ptk, $no_pin){
    $sisa = self::getPinjaman($no_ptk, $no_pin) - self::getPembayaran($no_ptk, $no_pin);
    return $sisa;
  }


    public function create(Request $request){
      $data = Ptk::find($request->input('no_ptk'));
      $sisa = self::getTotal($data->no_ptk, $data->no_pin);
      return view('akuntan.pembayaran')->with('data', $data)->with('sisa', $sisa);
    }

    public function store(Request $request){
      $dep = new ControllerDepartemen;
      $ref = new ControllerReff;
      $jurnal = new ControllerJurnal;
      $reff = $ref->CekNumber();
      $jum = $request->input('jum');
      $sisa = $request->input('sisa');
      if($sisa>=$jum){
        Pembayaran::create([
          'no_ptk'=>$request->input('no_ptk'),
          'jum'=>$request->input('jum'),
          'no_pin'=>$request->input('no_pin')
        ]);
        $dep->updateAwalhutang(1,3,$request->input('jum'));
        $jurnal->insert_auto(1,1,1,$reff, "KAS", date("Y-m-d"), "Pembayaran ptk. No PTK: ".$request->input('no_ptk'), "D", $request->input("jum"), Auth::user()->name);
        $jurnal->insert_auto(1,3,2,$reff, "PIUTANG - KARYAWAN/PTK", date("Y-m-d"), "Pembayaran ptk. No PTK: ".$request->input('no_ptk'), "K", $request->input("jum"), Auth::user()->name);
        $ref->get_no();
        return redirect('ptk_search');
      }else{
        return redirect('pembayaran/create?no_ptk='.$request->input('no_ptk'));
      }
    }

    public function Riwayat(Request $request){
      $ptk = Ptk::find($request->input('no_ptk'));
      $pinjaman = Pinjaman::where('no_ptk',$ptk->no_ptk)->where('no_pin', $ptk->no_pin)->get();
      $pembayaran = Pembayaran::where('no_ptk',$ptk->no_ptk)->where('no_pin', $ptk->no_pin)->get();
      return view('akuntan.riwayat')->with('ptk', $ptk)->with('pinjaman', $pinjaman)->with('pembayaran', $pembayaran);
    }
}
