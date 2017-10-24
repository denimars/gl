@extends('layout')

@section('judul')
  Pembayaran
@endsection

@section('konten')
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Pinjaman</h3>
  </div>
  <form class="form-horizontal" action="<%% url('pembayaran') %%>" method="post">
    <%% csrf_field() %%>
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">No PTK</label>
        <div class="col-sm-2">
          <input type="text" name="no_ptk" class="form-control" value="<%%$data->no_ptk%%>" readonly>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Nama</label>
        <div class="col-sm-4">
          <input type="text" name="nama" class="form-control" value="<%%$data->nama%%>" readonly>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Pinjaman Ke</label>
        <div class="col-sm-1">
          <input type="text" name="no_pin" class="form-control" value="<%%$data->no_pin%%>" readonly>
        </div>
      </div>



      <div class="form-group">
        <label class="col-sm-2 control-label">Sisa</label>
        <div class="col-sm-2">
          <input type="text" name="sisa" class="form-control" value="<%% $sisa %%>" readonly>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Bayar</label>
        <div class="col-sm-2">
          <input type="text" name="jum" class="form-control"  required>
        </div>
      </div>


    </div>
    <div class="box-footer">
        <input type="submit" id="submit" class="btn btn-primary" value="Simpan"/>
      </form>
      <a href="<%% url('ptk_search') %%>" class="btn btn-primary">Batal</a>
      </div>
  </form>
</div>
</div>
</div>
@endsection
