<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loghutang;

class ControllerRekapHutang extends Controller
{


    public function index(){
        $tgl = 23;
        $mont = date('m');
        $year = date('Y');
        $date = $year."-".$mont."-".$tgl;
        $data = Loghutang::where('tgl', $date)->get();
        return view('akuntan.testing')->with('data', $data)->with('date', $date);
    }
    //return data: nama, lembaga, potongan, pinjaman,  sisa
   /** public function index(){
        $data = array();
        $ptk = Ptk::where('sts', 1)->get();
        foreach($ptk as $p){
            $add = array();
            $pinjaman = self::getPinjaman($p->no_ptk, $p->no_pin);
            $pembayaran = self::getPembayaran($p->no_ptk, $p->no_pin);
            $potongan = self::getPotongan($p->no_ptk, $p->no_pin);
            if ($pinjaman !=0) {
                $sisa = $pinjaman - $pembayaran;
                $add['nama'] = $p->nama;
                $add['lembaga'] = $p->lembaga;
                $add['potongan']= $potongan;
                $add['pinjaman'] = $pinjaman;
                $add['sisa'] = $sisa;
                array_push($data, $add);
            }

        }
        return view('akuntan.testing')->with('data', $data);

    }

    public function getPotongan($no_ptk, $no_pin){
        $potongan = 0;
        $pembayaran = Pembayaran::where('no_ptk', $no_ptk)->where('no_pin', $no_pin)->get();
        foreach($pembayaran as $p){
            $potongan = (int) $p->jum;
        }
        return $potongan;

    }

    public function getPinjaman($no_ptk, $no_pin){
        $total = 0;
        $pinjaman = Pinjaman::where('no_ptk', $no_ptk)->where('no_pin', $no_pin)->get();
        foreach($pinjaman as $p){
            $total = $total + (int) $p->jum;
        }
        return $total;
    }

    public function getPembayaran($no_ptk, $no_pin){
        $total = 0;
        $pembayaran = Pembayaran::where('no_ptk', $no_ptk)->where('no_pin', $no_pin)->get();
        foreach($pembayaran as $p){
            $total = $total + (int) $p->jum;
        }
        return $total;

    }


    
    public function index(){
        $data = array(
            array("nama"=>"Deni Marswandi", "alamat"=>"Mataram", "agama"=>"Islam"),
            array("nama"=>"Sri Ayu Andini", "alamat"=>"Selong", "agama"=>"Islam")
        );
        for($i=0; $i<=10; $i++){
            $tambah = array();
        $tambah["nama"] = "Ulayya Amatullah";
        $tambah["alamat"]= "Selong";
        $tambah["agama"] = "Islam";
        array_push($data, $tambah);
        }
        return view('akuntan.testing')->with('data', $data);
    }**/
}
