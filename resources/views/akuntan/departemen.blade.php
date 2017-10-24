@extends('layout')

@section('konten')
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Kelompok Akun</h3>
        </div>
          <div class="box-body">
            <form action="<%% url('departemen')  %%>" method="post" class="form-horizontal">
              <%%csrf_field()%%>
              <div class="form-group">
                <label class="col-sm-2 control-label">Kelompok</label>
                <div class="col-sm-4">
                <select name="kelompok" class="form-control">
                  <option value="1">Harta</option>
                  <option value="2">Kewajiban</option>
                  <option value="3">Modal</option>
                  <option value="4">Pendapatan</option>
                  <option value="5">Biaya</option>
                </select>
              </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-4">
                  <input type="text" name="nama" class="form-control" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Mulai No</label>
                <div class="col-sm-2">
                  <input type="number" name="start" class="form-control" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Akhir No</label>
                <div class="col-sm-2">
                  <input type="number" name="end" class="form-control" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Anggaran</label>
                <div class="col-sm-4">
                  <input type="text" name="batas_dana" class="form-control" required>
                </div>
              </div>
              <div class="box-footer">
              </form>
                  <input type="submit" id="submit" class="btn btn-primary" value="Simpan"/>
                <a href="<%%url('departemen/create')%%>" class="btn btn-primary">Batal</a>
                </div>

            </form>
          </div>
        </div>
    </div>
  </div>
@endsection
