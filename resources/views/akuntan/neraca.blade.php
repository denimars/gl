@extends('layout')

@section('judul')
  Neraca
@endsection
@section('konten')
    <form action="<%%url('/neraca')%%>" method="get">
      <div class="col-md-3">
    <select name="bulan" class="form-control">
      <option value="januari">Januari</option>
      <option value="februari">Februari</option>
      <option value="maret">Maret</option>
      <option value="april">April</option>
      <option value="mei">Mei</option>
      <option value="juni">Juni</option>
      <option value="juli">Juli</option>
      <option value="agustus">Agustus</option>
      <option value="september">September</option>
      <option value="oktober">Oktober</option>
      <option value="november">November</option>
      <option value="desember">Desember</option>
    </select>
  </div>
    <input type="submit" value="proses" class="btn btn-primary">
  </form>
@endsection
