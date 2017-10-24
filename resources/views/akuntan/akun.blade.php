@extends('layout')

@section('judul')
  Akun
@endsection

@section('konten')
  <div class="row">
    <div class="col-md-12">
      @if(Session::has('info'))
      <div class="alert alert-info">
      <%% Session::get('info') %%>
</div>
      @endif
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Rekam Akun Baru</h3>
        </div>
        <form class="form-horizontal" action="<%% url('/akun') %%>" method="post">
          <%% csrf_field() %%>
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Kelompok akun</label>
              <div class="col-sm-4">
                <select class="form-control" name="kelompok">
                  @foreach($data as $a)
                    <option value="<%% $a->kelompok %%>-<%% $a->no_dep %%>"><%% $a->nama %%></option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama akun</label>
              <div class="col-sm-4">
                <input type="text" name="nama_akun" autocomplete="false" class="form-control" required>
              </div>
            </div>

          </div>
          <div class="box-footer">
              <input type="submit" id="submit" class="btn btn-primary" value="Simpan"/>
            </form>
            <a href="<%% url('akun/create') %%>" class="btn btn-primary">Batal</a>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
