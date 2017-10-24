<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurnal;
use App\Neraca;
use App\Http\Controllers\ControllerAkun;

class ControllerNeraca extends Controller
{

    public function shown(Request $request){
      $bulan = $request->input('bulan');
      $data = Neraca::where('bulan', $bulan)->get();
      return view('akuntan.show_akun')->with('data', $data);
    }

    public function index(Request $request){
      $bb = $request->input('bulan');
      $bulan = self::mounth($bb);
      if($bb == null){
        return view('akuntan.neraca');

      }else{
        self::hapusbulan($bb);
        self::harta($bulan, $bb);
        self::kewajiban($bulan, $bb);
        self::modal($bulan, $bb);
        $hasil = self::pendapatan($bulan) - self::biaya($bulan);
        self::insert_data("-","-","-","LABA TAHUN BERJALAN",$hasil,$bb);
        return redirect('show_neraca');
      }

    }

    public function insert_data($kelompok, $departemen, $noakun, $nama, $nominal, $bulan){
      Neraca::create([
        'kelompok'=>$kelompok,
        'departemen'=>$departemen,
        'noakun'=>$noakun,
        'nama'=>$nama,
        'nominal'=>$nominal,
        'bulan'=>$bulan
      ]);
    }

    public function harta($bulan, $bb){
      $call = new ControllerAkun();
      $akun = $call->get_harta();
      foreach($akun as $a) {
        $ambil = Jurnal::where('nama', $a->nama)->whereBetween('tgl',array('2017-01-01', $bulan[1]))->get();
        $jumlah = 0;
        foreach ($ambil as $b) {
          if($b->posisi=="D"){
            $jumlah = $jumlah + $b->nominal;
          }else{
            $jumlah = $jumlah - $b->nominal;
          }

        }
        //if($jumlah!=0){
          self::insert_data($a->kelompok, $a->departemen,  $a->noakun, $a->nama, $jumlah, $bb);
        //}


      }
    }

    public function kewajiban($bulan, $bb){
      $call = new ControllerAkun();
      $akun = $call->get_kewajiban();
      foreach($akun as $a) {
        $ambil = Jurnal::where('nama', $a->nama)->whereBetween('tgl',array('2017-01-01', $bulan[1]))->get();
        $jumlah = 0;
        foreach ($ambil as $b) {
          if($b->posisi=="K"){
            $jumlah = $jumlah + $b->nominal;
          }else{
            $jumlah = $jumlah - $b->nominal;
          }

        }
        //if($jumlah!=0){
          self::insert_data($a->kelompok, $a->departemen,  $a->noakun, $a->nama,$jumlah, $bb);
        //}
      }
    }

    public function modal($bulan, $bb){
      $call = new ControllerAkun();
      $akun = $call->get_modal();
      foreach($akun as $a) {
        $ambil = Jurnal::where('nama', $a->nama)->whereBetween('tgl',array('2017-01-01', $bulan[1]))->get();
        $jumlah = 0;
        foreach ($ambil as $b) {
          if($b->posisi=="K"){
            $jumlah = $jumlah + $b->nominal;
          }else{
            $jumlah = $jumlah - $b->nominal;
          }

        }
        //if($jumlah!=0){
          self::insert_data($a->kelompok, $a->departemen,  $a->noakun, $a->nama,$jumlah, $bb);
        //}
      }

    }

    /**public function pendapatan($bulan){
       $call = new ControllerAkun();
      $akun = $call->get_harta();
      foreach($akun as $a) {
        $ambil = Jurnal::where('nama', $a->nama)->whereBetween('tgl',array('2017-01-01', $bulan[1]))->get();
        foreach ($ambil as $b) {
          if($b->posisi=="K"){
            $jumlah = $jumlah + $b->nominal;
          }/**else{
            $jumlah = $jumlah - $b->nominal;
          }**/

       /** }
        $pendapatan =$pendapatan + $jumlah;
        }
        return $pendapatan;

      }




    public function biaya($bulan){
      $call = new ControllerAkun();
      $akun = $call->get_biaya();
      $biaya = 0;
      foreach($akun as $a) {
        $ambil = Jurnal::where('nama', $a->nama)->whereBetween('tgl',array('2017-01-01', $bulan[1]))->get();
        $jumlah = 0;
        foreach ($ambil as $b) {
          if($b->posisi=="D"){
            $jumlah = $jumlah + $b->nominal;
          }/**else{
            $jumlah = $jumlah - $b->nominal;
          }**/

     /**   }
        $biaya = $jumlah + $biaya;
        }
        return $biaya;

    }**/

    public function pendapatan($bulan){
      $jumlah = 0;
      $pendapatan = Jurnal::where('kelompok', 4)->whereBetween('tgl',array('2017-01-01', $bulan[1]))->get();
      foreach($pendapatan as $a){
        if($a->posisi=="K"){
          $jumlah = $jumlah + $a->nominal;
        }
      }
      return $jumlah;

    }

    public function biaya($bulan){
      $jumlah = 0;
      $biaya = Jurnal::where('kelompok', 5)->whereBetween('tgl',array('2017-01-01', $bulan[1]))->get();
      foreach($biaya as $a){
        if($a->posisi=="D"){
          $jumlah = $jumlah + $a->nominal;
        }
      }
      return $jumlah;
    }

    public function hapusbulan($bb){
      Neraca::where('bulan', $bb)->delete();
    }

    public function mounth($mounth){

      switch ($mounth) {
        case 'januari':
          $data = ['2017-1-1', '2017-1-31'];
          break;
        case 'februari':
          $data = ['2017-2-1', '2017-2-29'];
          break;
        case 'maret':
          $data = ['2017-3-1', '2017-3-31'];
          break;
        case 'april':
          $data = ['2017-4-1','2017-4-30'];
          break;
        case 'mei':
          $data = ['2017-5-1', '2017-5-31'];
          break;
          case 'juni':
            $data = ['2017-6-1', '2017-6-30'];
            break;
          case 'juli':
            $data = ['2017-7-1', '2017-7-31'];
            break;
          case 'agustus':
            $data = ['2017-8-1', '2017-8-31'];
            break;
          case 'september':
            $data = ['2017-9-1','2017-9-30'];
            break;
          case 'oktober':
            $data = ['2017-10-1', '2017-10-31'];
            break;
          case 'november':
            $data = ['2017-11-1', '2017-11-30'];
            break;
        default:
            $data = ['2017-12-1', '2017-12-31'];
          break;
      }
      return $data;
    }
}
