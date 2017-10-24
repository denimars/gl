@extends('layout')

@section('judul')
  Riwayat Pembayaran
@endsection

@section('konten')

  <table>
    <tr><td>NPTK</td><td>:</td><td><%% $ptk->no_ptk %%></td></tr>
    <tr><td>Nama</td><td>:</td><td><%% $ptk->nama %%></td></tr>
  </table>

  <table border="1">
    <tr>
      <th>Tgl</th>
      <th>Pinjaman</th>
      <th>Pembayaran</th>
    </tr>


    @foreach($pinjaman as $pi)
      <tr><td><%%$pi->created_at->format('d-m-y')%%></td><td><%%$pi->jum%%></td><td></td></tr>
    @endforeach
    @foreach($pembayaran as $pe)
      <tr><td><%%$pe->created_at->format('d-m-y')%%></td><td></td><td><%%$pe->jum%%></td></tr>
    @endforeach


  </table>

@endsection
