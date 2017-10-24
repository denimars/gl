@extends('layout')

@section('judul')
  PTK
@endsection

@section('konten')
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">PTK</h3>
  </div>
  <form class="form-horizontal" action="<%% url('/ptk/'.$data->id) %%>" method="post">
    <%% csrf_field() %%>
    <input type="hidden" name="_method" value="PUT">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">Nama</label>
        <div class="col-sm-4">
          <input type="text" name="nama" class="form-control" value="<%% $data->nama %%>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Lembaga</label>
        <div class="col-sm-4">
          <select class="form-control" name="lembaga">
            <option value="SD IT" @if($data->lembaga=="SD IT") selected  @endif>SD IT</option>
            <option value="SMP IT PUTRI" @if($data->lembaga=="SMP IT PUTRI") selected @endif>SMP IT PUTRI</option>
            <option value="SMA IT" @if($data->lembaga=="SMA IT") selected  @endif>SMA IT</option>
            <option value="MA PLUS" @if($data->lembaga=="MA PLUS") selected @endif>MA PLUS</option>
            <option value="SMP IT PUTRA" @if($data->lembaga=="SMP IT PUTRA") selected  @endif>SMP IT PUTRA</option>
            <option value="FULLDAY" @if($data->lembaga=="FULLDAY") selected @endif>FULLDAY</option>
            <option value="DEPT TAHFIDZ" @if($data->lembaga=="DEPT TAHFIDZ") selected  @endif>DEPT TAHFIDZ</option>
            <option value="KESEKRETARIATAN" @if($data->lembaga=="KESEKRETARIATAN") selected @endif>KESEKRETARIATAN</option>
            <option value="PAUD" @if($data->lembaga=="PAUD") selected  @endif>PAUD</option>
            <option value="UNIT USAHA" @if($data->lembaga=="UNIT USAHA") selected @endif>UNIT USAHA</option>
            <option value="BIDANG UMUM" @if($data->lembaga=="BIDANG UMUM") selected  @endif>BIDANG UMUM</option>
            <option value="CS" @if($data->lembaga=="CS") selected @endif>CS</option>
            <option value="SECURITY" @if($data->lembaga=="SECURITY") selected  @endif>SECURITY</option>
            <option value="DAPUR" @if($data->lembaga=="DAPUR") selected  @endif>DAPUR</option>
            <option value="RUMAH TANGGA" @if($data->lembaga=="RUMAH TANGGA") selected  @endif>RUMAH TANGGA</option>
            <option value="LUAR PONDOK" @if($data->lembaga=="LUAR PONDOK") selected  @endif>LUAR PONDOK</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">No Telp</label>
        <div class="col-sm-2">
          <input type="text" name="telp" value="<%% $data->telp %%>" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Potongan</label>
        <div class="col-sm-2">
          <select name="sts" class="form-control">
            <option value="1" @if($data->sts=="1") selected @endif>Aktif</option>
            <option value="0" @if($data->sts=="0") selected @endif>Tunda</option>
          </select>
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
