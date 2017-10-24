@extends('layout')

@section('judul')
  Laba Rugi
@endsection

@section('konten')

    <div class="row">
      <div class="col-md-12">

        <form action="<%% url('laba_rugi') %%>" method="get" class="form-inline">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Saring</h3>
          </div>
          <div class="box-body">
            <div class="form-group">

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




        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Laba Rugi</h3>
          </div>
            <div class="box-body">
              <table class="table table-bordered">
                <?php
                    $tpendapatan = 0;
                    $tbiaya = 0;
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
                <tr><td colspan="7"><b>A. Pendapatan</b></td></tr>
              @foreach($pendapatan as $a)
              <tr>
              <td><%% date('d-m-Y', strtotime($a->tgl)) %%></td>
              <td><%% $a->reff %%></td>
              <td><%%$a->kelompok%%>-<%% $a->departemen %%>-<%%$a->noakun%%></td>
              <td><%% $a->nama %%></td>
              <td><%%$a->keterangan%%></td>
              <td align="right">
              @if($a->posisi=="D")
              <%%number_format($a->nominal,0,",",".")%%>
              @else
              <%%0%%>
              @endif
              </td>
              <td align="right">
              @if($a->posisi=="K")
              <%%number_format($a->nominal,0,",",".")%%>
              <?php $tpendapatan = $tpendapatan + $a->nominal; ?>
              @else
              <%%0%%>
              @endif
              </td>

              </tr>
              @endforeach
              <tr><td colspan="7"><b>B. Biaya</b></td></tr>
              @foreach($biaya as $b)
              <tr>
              <td><%% $b->created_at->format('d-m-y') %%></td>
              <td><%% $b->reff %%></td>
              <td><%% $b->kelompok%%>-<%% $b->departemen %%>-<%%$b->noakun %%></td>
              <td><%% $b->nama %%></td>
              <td><%%$b->keterangan%%></td>
              <td align="right">
              @if($b->posisi=="D")
              <%%number_format($b->nominal,0,",",".")%%>
              <?php $tbiaya = $tbiaya + $b->nominal; ?>
              @else
              <%%0%%>
              @endif
              </td>
              <td align="right">
              @if($b->posisi=="K")
              <%%number_format($b->nominal,0,",",".")%%>
              @else
              <%%0%%>
              @endif
              </td>

              </tr>
              @endforeach
              <tr>
                <td colspan="6" align="right"><b>Laba Rugi</b></td> <td align="right"><b><%% number_format($tpendapatan - $tbiaya, 0, ",",".") %%></b></td>
              </tr>
              </tbody>
              </table>
            </div>
          </div>
          
    </div>
  </div>
@endsection

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
