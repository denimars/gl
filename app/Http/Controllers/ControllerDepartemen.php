<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departemen;

class ControllerDepartemen extends Controller
{

  public function get_nodep($kelompok){
    $data = Departemen::select("no_dep")->where("kelompok",$kelompok)->max('no_dep');
    if ($data == null){
      return $hasil = 0;
    }else{
      return $hasil = $data;
    }
  }
    public function create(){
      return view('akuntan.departemen');
    }

    public function getAll()
    {
      $data = Departemen::all();
      return $data;
    }

    public function getNumber($kelompok, $no_dep){
      $data = Departemen::where('kelompok', $kelompok)->where('no_dep', $no_dep)->get();
      return $data;
    }

    public function updateNumber($kelompok, $no_dep, $number){
      $data = Departemen::select("end")->where("kelompok",$kelompok)->where('no_dep', $no_dep)->get();
      if($number <= $data[0]->end){
        Departemen::where('kelompok',$kelompok)->where('no_dep', $no_dep)->update(['start'=>$number]);
        return "success";
      }else{
        return "error";
      }

    }

    public function getAwal($kelompok, $no_dep){
      $data = Departemen::select('dana_awal')->where('kelompok', $kelompok)->where('no_dep',$no_dep)->get();
      return $data[0]->dana_awal;
    }

    public function getAkhir($kelompok, $no_dep){
      $data = Departemen::select('dana_akhir')->where('kelompok', $kelompok)->where('no_dep',$no_dep)->get();
      return $data[0]->dana_akhir;
    }

    public function updateAwal($kelompok, $no_dep, $tot_biaya){
        Departemen::where('kelompok',$kelompok)->where('no_dep', $no_dep)->update(['dana_awal'=>self::getAwal($kelompok, $no_dep)+$tot_biaya]);
    }

    public function updateAwalhutang($kelompok, $no_dep, $tot_biaya){
      Departemen::where('kelompok',$kelompok)->where('no_dep', $no_dep)->update(['dana_awal'=>self::getAwal($kelompok, $no_dep)-$tot_biaya]);
    }

    //function testing

    public function testing(){
      return self::updateAwal('5','1', 400000);
    }

    public function store(Request $request){
      Departemen::create([
        'kelompok'=>$request->input('kelompok'),
        'no_dep'=>self::get_nodep($request->input('kelompok')) + 1,
        'nama'=>strtoupper(trim($request->input('nama'))),
        'start'=>intval($request->input('start'))-1,
        'end'=>$request->input('end'),
        'dana_awal'=> 0,
        'dana_akhir'=>$request->input('batas_dana')
      ]);
      return redirect('departemen/create');
    }


}
