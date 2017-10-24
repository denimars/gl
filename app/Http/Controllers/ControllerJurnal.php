<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurnal;
use App\Akun;
use App\Departemen;
use App\Http\Controllers\ControllerAkun;
use App\Http\Controllers\ControllerReff;
use App\Http\Controllers\ControllerDepartemen;
use Auth;
use Session;
class ControllerJurnal extends Controller
{

  public function create(){
    $call = new ControllerAkun();
    $data = $call->data_all();
    return view('akuntan.jurnal')->with('data', $data);
  }

  public function index(){
    $data = Jurnal::orderBy('tgl', 'ASC')->orderBy('reff','ASC')->get();
    return view('akuntan.juju')->with('data', $data);
  }

  public function bukubesar(Request $request){
    $getdata = explode("-", $request->input('akun'));
    if(count($getdata)==1){
      $data = Departemen::all();
      $data2 = [];
      return view('akuntan.bukubesar')->with('data', $data)->with('data2', $data2);
    }else{
      $kelompok = $getdata[0];
      $departemen = $getdata[1];
      $mulai = explode("/", $request->input('start'));
      $selesai = explode("/", $request->input('end'));
      $data = Departemen::all();
      $data2 = Jurnal::where('kelompok',$kelompok)->where('departemen', $departemen)->whereBetween('tgl', array($mulai[2]."-".$mulai[1]."-".$mulai[0], $selesai[2]."-".$selesai[1]."-".$selesai[0]))->get();
      return view('akuntan.bukubesar')->with('data', $data)->with('data2', $data2);
    }
  }

  public function cekSaldo($akun){
    $gAkun = explode("~", $akun);
    $fAkun = explode("-", $gAkun[0]);
    $saldo = 0;
    $data = Jurnal::where('kelompok', $fAkun[0])->where('departemen', $fAkun[1])->where('noakun', $fAkun[2])->get();
    foreach($data as $a){
      if($a->posisi=="D"){
        $saldo = $saldo + $a->nominal;
      }else{
        $saldo = $saldo - $a->nominal;
      }
    }
    return $saldo;
  }

  //testing saldo
  public function testing(){
    return self::cekSaldo('1-1-1~KAS BESAR');
  }

  public function insert_auto($kelompok, $departemen, $noakun, $reff, $nama, $tgl, $keterangan, $posisi, $nominal, $user){
    Jurnal::create([
      'kelompok'=>$kelompok,
      'departemen'=> $departemen,
      'noakun'=>$noakun,
      'reff'=>$reff,
      'nama'=>$nama,
      'tgl'=>$tgl,
      'keterangan'=>$keterangan,
      'posisi'=>$posisi,
      'nominal'=>$nominal,
      'user'=>$user
    ]);
  }



    public function store(Request $request){
      $dep = new ControllerDepartemen;
      $getT = 0;
      $looping = $request->input('looping');
      $sloop = 0;
      $trgagal = 0;
      $totloop = $looping;
      for($i=0; $i<=$looping; $i++){
        $getT = $getT + $request->input('nominal'.$i);
      }

      $call = new ControllerReff();
      $reff = $call->CekNumber();
      $total = 0;
      $tgl = explode("/", $request->input('tgl'));
      $tglpus = $tgl[2]."-".$tgl[1]."-".$tgl[0];
      $ket = "";
      if(explode("-",$request->input('no_akun1'))[0]==1){
        if(self::cekSaldo($request->input('no_akun1'))>=$getT){
          while(true){
            $data = explode("~",$request->input('no_akun'.strval($looping)));
            $akun = explode("-", $data[0]);
            $kelompok = $akun[0];
            $departemen = $akun[1];
            $noakun = $akun[2];
            $nama = $data[1];
            $keterangan = $request->input('keterangan'.strval($looping));
            $nominal = $request->input('nominal'.strval($looping));
            $total = $total + $nominal;
            $posisi = "";

            if($looping==1){
              $posisi = "K";
            }else{
              $posisi = "D";
            }

            if($looping ==1 ){
              if($sloop!=0){
                $total = $total - $trgagal;
                self::insert_auto(
                  $kelompok,$departemen, $noakun, $reff, $nama, $tglpus, $ket, $posisi , $total, Auth::user()->name
                );
                $sloop = $sloop + 1;
              }
            }else{
                if((($dep->getAwal($kelompok, $departemen)+$nominal) <= $dep->getAkhir($kelompok, $departemen))|| ($dep->getAkhir($kelompok, $departemen)==0)) {
                  self::insert_auto(
                    $kelompok, $departemen, $noakun, $reff, $nama, $tglpus, $keterangan, $posisi , $nominal, Auth::user()->name
                  );
                  $dep->updateAwal($kelompok, $departemen, $nominal);
                  $sloop = $sloop + 1;
                  if($looping > 1){
                    $ket = $ket . $keterangan.". ";
                  }
              }else{
                $trgagal = $trgagal + $nominal;
              }
            }

            $looping = $looping - 1;
            if($looping==0){
              break;
            }

          }
          //batas while
          if($sloop == $totloop){
            $call->get_no();
            $info = "Transaksi berhasil. No Reff: ".$reff;
            Session::flash('info', $info);
          }else if($sloop !=0){
            $info = $sloop." pencatatan berhasil. reff: ".$reff;
            Session::flash('info', $info);
          }else if($sloop==0){
            $info = "Transaksi gagal. Silahkan cek anggaran.";
            Session::flash('info', $info);
          }

          return redirect('/jurnal/create');
        }else{
          $info = "Saldo tidak mencukupi.";
          Session::flash('info', $info);
          return redirect('/jurnal/create');
        }

      }else{
        while(true){
          $data = explode("~",$request->input('no_akun'.strval($looping)));
          $akun = explode("-", $data[0]);
          $kelompok = $akun[0];
          $departemen = $akun[1];
          $noakun = $akun[2];
          $nama = $data[1];
          $keterangan = $request->input('keterangan'.strval($looping));
          $nominal = $request->input('nominal'.strval($looping));
          $total = $total + $nominal;
          $posisi = "";
          if($looping > 1){
            $ket = $ket . $keterangan.". ";
          }

          if($looping==1){
            $posisi = "K";
          }else{
            $posisi = "D";
          }

          if($looping ==1 ){
            self::insert_auto(
              $kelompok,$departemen, $noakun, $reff, $nama, $tglpus, $ket, $posisi , $total, Auth::user()->name
            );
          }else{
            self::insert_auto(
              $kelompok, $departemen, $noakun, $reff, $nama, $tglpus, $keterangan, $posisi , $nominal, Auth::user()->name
            );
          }

          $looping = $looping - 1;
          if($looping==0){
            break;
          }

        }
        $call->get_no();
        $info = "Transaksi berhasil. No Reff: ".$reff;
        Session::flash('info', $info);
        return redirect('/jurnal/create');


      }

    }



/**
  public function store(Request $request){
    $looping = $request->input('looping');
    $call = new ControllerReff();
    $reff = $call->get_no();
    $total = 0;
    $tgl = explode("/", $request->input('tgl'));
    $tglpus = $tgl[2]."-".$tgl[1]."-".$tgl[0];
    $ket = "";
    while(true){
      $data = explode("~",$request->input('no_akun'.strval($looping)));
      $akun = explode("-", $data[0]);
      $kelompok = $akun[0];
      $departemen = $akun[1];
      $noakun = $akun[2];
      $nama = $data[1];
      $keterangan = $request->input('keterangan'.strval($looping));
      $nominal = $request->input('nominal'.strval($looping));
      $total = $total + $nominal;
      $posisi = "";
      if($looping > 1){
        $ket = $ket . $keterangan.". ";
      }

      if($looping==1){
        $posisi = "K";
      }else{
        $posisi = "D";
      }

      if($looping ==1 ){
        self::insert_auto(
          $kelompok,$departemen, $noakun, $reff, $nama, $tglpus, $ket, $posisi , $total, Auth::user()->name
        );
      }else{
        self::insert_auto(
          $kelompok, $departemen, $noakun, $reff, $nama, $tglpus, $keterangan, $posisi , $nominal, Auth::user()->name
        );
      }

      $looping = $looping - 1;
      if($looping==0){
        break;
      }

    }
    return redirect('/jurnal/create');

  }
  */

}
