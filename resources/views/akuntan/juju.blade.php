@extends('layout')

@section('judul')
  Jurnal
@endsection

@section('konten')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Jurnal</h3>
        </div>
          <div class="box-body">
        <div class="col-md-12">
        <table class="table table-bordered">
          <?php
            $debit = 0;
            $keredit =0;
           ?>
  <thead>
    <tr>
      <th>Tanggal</th>
      <th>Reff</th>
      <th>No Akun</th>
      <th>Nama Akun</th>
      <th>Keterangan</th>
      <th>Debit</th>
      <th>Kredit</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $a)
    <tr>
      <td><%% date('d-m-Y', strtotime($a->tgl)) %%></td>
      <td><%% $a->reff %%></td>
      <td><%% $a->kelompok%%>-<%% $a->departemen %%>-<%%$a->noakun %%></td>
      <td><%% $a->nama %%></td>
      <td><%%$a->keterangan%%></td>
      <td align="right">
        @if($a->posisi=="D")
          <%%number_format($a->nominal,0,",",".")%%>
          <?php $debit = $debit + $a->nominal;  ?>
        @else
          <%%0%%>
        @endif
      </td>
      <td align="right">
      @if($a->posisi=="K")
        <%%number_format($a->nominal,0,",",".")%%>
        <?php $keredit = $keredit + $a->nominal;  ?>
      @else
        <%%0%%>
      @endif
    </td>
    </tr>
    @endforeach
  <tr><td colspan="5"></td><td align="right"><b><%%number_format($debit,0,",",".")%%></b></td><td align="right"><b><%%number_format($keredit,0,",",".")%%></b></td></tr>
  </tbody>
</table>
</div>
</div>

      </div>
      <div></div>
    </div>


  </div>
@endsection
