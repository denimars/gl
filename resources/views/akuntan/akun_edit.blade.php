@extends('layout')

@section('judul')
  Akun
@endsection

@section('konten')
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Akun</h3>
        </div>
        <form class="form-horizontal" action="<%%url('/akun/'.$data->id)%%>" method="post">
          <%%csrf_field()%%>
          <input type="hidden" name="_method" value="PUT">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama akun</label>
              <div class="col-sm-4">
                <input type="text" name="nama_akun" value="<%%$data->nama%%>" class="form-control" required>
              </div>
            </div>

          </div>
          <div class="box-footer">
              <input type="submit" id="submit" class="btn btn-primary" value="Simpan"/>
            </form>
            <a href="<%%url('find_a')%%>" class="btn btn-primary">Batal</a>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
