@extends('layout')

@section('judul')
  PTK
@endsection

@section('konten')
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">PTK</h3>
  </div>
  <form class="form-horizontal" action="<%% url('ptk') %%>" method="post">
    <%% csrf_field() %%>
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Nama</label>
        <div class="col-sm-4">
          <input type="text" name="nama" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Lembaga</label>
        <div class="col-sm-4">
          <select class="form-control" name="lembaga">
            <option value="SD IT">SD IT</option>
            <option value="SMP IT PUTRI">SMP IT PUTRI</option>
            <option value="SMA IT">SMA IT</option>
            <option value="MA PLUS">MA PLUS</option>
            <option value="SMP IT PUTRA">SMP IT PUTRA</option>
            <option value="FULLDAY">FULLDAY</option>
            <option value="DEPT TAHFIDZ">DEPT TAHFIDZ</option>
            <option value="KESEKRETARIATAN">KESEKRETARIATAN</option>
            <option value="PAUD">PAUD</option>
            <option value="UNIT USAHA">UNIT USAHA</option>
            <option value="BIDANG UMUM">BIDANG UMUM</option>
            <option value="CS">CS</option>
            <option value="SECURITY">SECURITY</option>
            <option value="DAPUR">DAPUR</option>
            <option value="RUMAH TANGGA">RUMAH TANGGA</option>
            <option value="LUAR PONDOK">LUAR PONDOK</option>
            <optton value="KEASRAMAAN">KEASRAMAAN</option>
            <option value="I'DAD">I'DAD</option>
            <option value="NON-PTK">NON-PTK</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">No Telp</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="telp">
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
