<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ptk;
use App\Pinjaman;
use App\Http\Controllers\ControllerDepartemen;
use App\Http\Controllers\ControllerJurnal;
use App\Http\Controllers\ControllerReff;
use Auth;

class ControllerPinjaman extends Controller
{
  

    public function create(Request $request){
      $data = Ptk::find($request->input('no_ptk'));
      return view('akuntan.pinjaman')->with('data', $data);
    }

    public function store(Request $request){
      $pin_departemen = new ControllerDepartemen;
      $pin_jurnal = new ControllerJurnal;
      $pin_reff = new ControllerReff;

      $reff = $pin_reff->CekNumber();
      
      

      $anggaran = $pin_departemen->getAkhir(1,3);
      $sisa_anggaran = $pin_departemen->getAwal(1,3) + $request->input('jumlah');

      if($anggaran >= $sisa_anggaran){
        $saldo = $pin_jurnal->cekSaldo("1-1-1~KAS");
        if($saldo >= $request->input('jumlah')){
          Pinjaman::create([
        'no_ptk'=>$request->input('no_ptk'),
        'jum'=>$request->input('jumlah'),
        'no_pin'=>$request->input('no_pin'),
        'potongan'=>$request->input('potongan')
      ]);

       $pin_jurnal->insert_auto(1,1,1,$reff, "KAS", date("Y-m-d"), "Pinjaman ptk. No PTK: ".$request->input('no_ptk'), "K", $request->input("jumlah"), Auth::user()->name);
       $pin_jurnal->insert_auto(1,3,2,$reff, "PIUTANG - KARYAWAN/PTK", date("Y-m-d"), "Pinjaman ptk. No PTK: ".$request->input('no_ptk'), "D", $request->input("jumlah"), Auth::user()->name);
       $pin_departemen->updateAwal(1,3,$request->input('jumlah'));
       $pin_reff->get_no();
      return redirect('ptk_search');
        }else{
          return "Saldo tidak mencukupi";
        }

      }else{
        return "melebihi anggaran";
      }
    }

    public function testing(){
     $pin_departemen = new ControllerDepartemen;
      $pin_jurnal = new ControllerJurnal;

      return $pin_jurnal->cekSaldo("1-1-1~KAS");
      
    }


}
