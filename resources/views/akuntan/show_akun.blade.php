@extends('layout')

@section('judul')
  Neraca
@endsection
@section('konten')
<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"></h3>
      </div>

      <div class="box-body">
        <form action="<%%url('show_neraca')%%>" method="get" class="form-inline">
          <div class="form-group">
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
        <input type="submit" value="Proses" class="btn btn-primary">
      </div>
        </form>

      </div>
    </div>

</div>


<div class="col-md-12">
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Neraca</h3>
    </div>
    <div class="box-body">
      <table class="table table-border">
        <tr>
          <th>No Akun</th>
          <th>Akun</th>
          <th>Aktiva</th>
          <th>Pasiva</th>
        </tr>
        <?php
          $ak = 0;
          $pa = 0;
         ?>
        @foreach($data as $a)
          <tr>
              <td><%%$a->kelompok%%>-<%% $a->departemen %%>-<%%$a->noakun%%></td>
              <td><%%$a->nama%%></td>
              <td align="right">
                @if($a->kelompok==1)
                  <%%number_format($a->nominal,0,",",".")%%>
                  <?php $ak = $ak + $a->nominal; ?>
                @else
                  -
                @endif
              </td>
              <td align="right">
                @if($a->kelompok!=1)
                  <%%number_format($a->nominal,0,",",".")%%>
                  <?php $pa = $pa + $a->nominal; ?>
                @else
                  -
                @endif
              </td>
          </tr>
        @endforeach
      <tr><td colspan="2" aling="right">Total</td><td align="right"><b><%%number_format($ak,0,",",".")%%></b></td><td align="right"><b><%%number_format($pa,0,",",".")%%></b></td></tr>
      </table>
    </div>
  </div>

</div>

</div>
@endsection
