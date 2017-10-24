@extends('layout')
@section('judul')
  Buku Besar
@endsection

@section('konten')
  <div class="row">
    <div class="col-md-12">
      <form action="<%% url('bukubesar') %%>" method="get" class="form-inline">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Cari Akun</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
          <select class="form-control" name="akun">
              @foreach($data as $a)
                <option value="<%%$a->kelompok%%>-<%% $a->no_dep %%>"><%% $a->nama %%> <%%$a->kelompok%%>-<%% $a->no_dep %%></option>
              @endforeach
          </select>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="start" id="datepicker" required>
                </div>


                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="end" id="datepicker2" required>
                </div>
          <input type="submit" value="Tampilkan" class="btn btn-primary">
        </div>
        </div>
      </div>
    </form>
    @if(count($data2))
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">AKUN <%% $data2[0]->nama  %%></h3>
        </div>
        <div class="box-body">

          <table class="table table-bordered">
            <?php
              $debit = 0;
              $keredit =0;
              $total = 0;
             ?>
    <thead>
      <tr>
        <th align="center">Tanggal</th>
        <th align="center">Reff</th>
        <th align="center">No Akun</th>
        <th align="center">Nama Akun</th>
        <th align="center">Keterangan</th>
        <th align="center">Debit</th>
        <th align="center">Kredit</th>
        <th align="center">Saldo</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data2 as $a)
      <tr>
        <td align="center"><%% date('d-m-Y', strtotime($a->tgl)) %%></td>
        <td align="center"><%%$a->reff%%></td>
        <td align="center"><%%$a->kelompok%%>-<%% $a->departemen %%>-<%%$a->noakun%%></td>
        <td align="center"><%%$a->nama%%></td>
        <td><%%$a->keterangan%%></td>
        <td align="right">
          @if($a->posisi=="D")
            <%%number_format($a->nominal,0,",",".")%%>
            <?php $debit = $debit + $a->nominal;  ?>
            @if($a->kelompok==1 || $a->kelompok==5)
              <?php $total = $total + $a->nominal; ?>
            @else
              <?php $total = $total - $a->nominal; ?>
            @endif
          @else
            <%%0%%>
          @endif
        </td>
        <td align="right">
        @if($a->posisi=="K")
          <%%number_format($a->nominal,0,",",".")%%>
          <?php $keredit = $keredit + $a->nominal;  ?>
          @if($a->kelompok==2 || $a->kelompok==3 || $a->kelompok==4)
            <?php $total = $total + $a->nominal; ?>
          @else
            <?php $total = $total - $a->nominal; ?>
          @endif
        @else
          <%%0%%>
        @endif
      </td>
      <td align="right">
        <%% number_format($total,0,",",".") %%>
      </td>
      </tr>
      @endforeach
    <tr><td colspan="5"></td><td align="right"><b><%%number_format($debit,0,",",".")%%></b></td><td align="right"><b><%%number_format($keredit,0,",",".")%%></b></td>
      <td align="right">
        <b><%% number_format($total,0,",",".") %%></b>
      </td>
    </tr>
    </tbody>
  </table>
        </div>
      </div>
      </div>
    </div>
    @endif
  </div>
  @section('script-kode-js')
  <script src=" <%% asset('adminlte/plugins/datepicker/bootstrap-datepicker.js') %%>"></script>
<script>
  $(function(){
    $('#datepicker').datepicker({
    autoclose: true,
    format: "dd/mm/yyyy"
  });

  $('#datepicker2').datepicker({
  autoclose: true,
  format: "dd/mm/yyyy"
});
  });
</script>
  @endsection
@endsection
