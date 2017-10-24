<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
use App\Http\Controllers\ControllerDepartemen;
use Session;

class ControllerAkun extends Controller
{

  public function get_noakun($kelompok){
    $data = Akun::select("noakun")->where("kelompok",$kelompok)->max('noakun');
    if ($data == null){
      return $hasil = 0;
    }else{
      return $hasil = $data;
    }
  }

  public function autocomplete(Request $request){
    $data = Akun::select("nama")->where('nama','like',"%".$request->get('q')."%")->get();
    return response()->json($data);
  }

  public function data_all(){
    $data = Akun::orderBy('kelompok', 'ASC')->get();
    return $data;
  }

  public function create(){
    $call = new ControllerDepartemen();
    $data = $call->getAll();
    return view('akuntan.akun')->with('data', $data);
  }


  /**public function store(Request $request){
    $kelompok = explode("-", $request->input('kelompok'));
    Akun::create([
      'kelompok'=>
      'departemen'=>
      'noakun'=>self::get_noakun($request->input('kelompok')) + 1,
      'nama'=>strtoupper(trim($request->input('nama_akun')))
    ]);
    $info = "Data berhasil disimpan";
    Session::flash('info', $info);
    return redirect('/akun/create');
  }*/

  public function store(Request $request){
    $getKelompok = explode("-", $request->input('kelompok'));
    $kelompok = $getKelompok[0];
    $departemen = $getKelompok[1];
    $call = new ControllerDepartemen();
    $getNumber = $call->getNumber($kelompok, $departemen);
    $number = $getNumber[0]['start'] + 1;
    if($call->updateNumber($kelompok, $departemen, $number)=="success"){
      Akun::create([
        'kelompok'=>$kelompok,
        'departemen'=>$departemen,
        'noakun'=>$number,
        'nama'=>strtoupper(trim($request->input('nama_akun')))
      ]);
      $info = "Data berhasil disimpan.";
      Session::flash('info', $info);
      return redirect('/akun/create');
    }else{
      $info = "Gagal disimpan, no akun tidak mencukupi.";
      Session::flash('info', $info);
      return redirect('/akun/create');
    }
  }

  public function get_harta(){
    $data = Akun::where('kelompok', 1)->get();
    return $data;
  }

  public function get_kewajiban(){
    $data = Akun::where('kelompok', 2)->get();
    return $data;
  }

  public function get_modal(){
    $data = Akun::where('kelompok', 3)->get();
    return $data;
  }

  public function get_pendapatan(){
    $data = Akun::where('kelompok', 4)->get();
    return $data;
  }

  public function get_biaya(){
    $data = Akun::where('kelompok', 5)->get();
    return $data;
  }

  public function search(){
    //$data = Akun::where('nama','like',"%".$request->input('nama')."%")->get();
    //return view('akuntan.akun_search')->with('data', $data);
    return view('akuntan.akun_search');
  }

  public function edit($id){
    $data = Akun::find($id);
    return view('akuntan.akun_edit')->with('data', $data);
    //return $data;
  }

  public function update(Request $request, $id){
    Akun::find($id)->update(['nama'=>strtoupper(trim($request->input('nama_akun')))]);
    return redirect('find_a');
  }

  public function destroy($id){
    Akun::find($id)->delete();
    return redirect('find_a');
  }

  public function test2(){
    return view('test2');
  }

}
