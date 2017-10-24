@extends('layout')

@section('judul')
  Pinjaman
@endsection

@section('konten')
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Pinjaman</h3>
  </div>
  <form class="form-horizontal" action="<%% url('pinjaman') %%>" method="post">
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
        <label class="col-sm-2 control-label">Jumlah</label>
        <div class="col-sm-4">
          <input type="text" name="jumlah" class="form-control" required>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Potongan</label>
        <div class="col-sm-4">
          <input type="text" name="potongan" class="form-control" required>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">No Pin.</label>
        <div class="col-sm-1">
          <input type="text" name="no_pin" class="form-control" value="<%% $data->no_pin  %%>" readonly>
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
