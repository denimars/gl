<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ptk;

class ControllerPtk extends Controller
{
    public function create(){
      return view('akuntan.ptk');
    }

    public function get_noptk(){
      $data = Ptk::select("no_ptk")->max('no_ptk');
      if($data == null){
        return $hasil = 0;
      }else{
        return $hasil = $data;
      }
    }

    public function store(Request $request){
      Ptk::create([
        'no_ptk'=>self::get_noptk() + 1,
        'nama'=>strtoupper(trim($request->input('nama'))),
        'lembaga'=>$request->input('lembaga'),
        'no_pin'=>1,
        'telp'=>$request->input('telp'),
        'sts'=>1
      ]);
      return redirect('ptk_search');
    }

    public function data_all(){
      $data = Ptk::orderBy('nama', 'ASC')->get();
      return $data;
    }

    public function search(){
      return view('akuntan.ptk_search');
    }

    public function edit($noptk){
      $data = Ptk::find($noptk);
      return view('akuntan.edit_ptk')->with('data', $data);
    }

    public function update($noptk, Request $request){
      Ptk::find($noptk)->update([
        'nama'=>strtoupper(trim($request->input('nama'))),
        'lembaga'=>$request->input('lembaga'),
        'sts'=>$request->input('sts')
      ]);
      return redirect('ptk_search');
    }
}
