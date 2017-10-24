@extends('layout')

@section('judul')
  Jurnal
@endsection

@section('konten')
<script src="<%% asset('jquery/jquery.min.js')  %%>" type="text/javascript"></script>

  <div class="row">
    <div class="col-md-12">
      @if(Session::has('info'))
      <div class="alert alert-info">
      <%%Session::get('info')%%>
</div>
      @endif
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Transaksi</h3>
        </div>
        <form ng-app="angularjs-starter" class="form-horizontal" method="post" action="<%%url('jurnal')%%>">
          <%%csrf_field()%%>

          <div class="box-body">

          <div class="form-group">
            <label class="col-sm-2 control-label">Dari akun</label>
            <div class="col-sm-4">
                <select class="form-control" name="no_akun1">
                    @foreach($data as $a)
                      <option value="<%%$a->kelompok%%>-<%% $a->departemen %%>-<%%$a->noakun%%>~<%%$a->nama%%>"><%%$a->nama%%> <%%$a->kelompok%%>-<%% $a->departemen %%>-<%%$a->noakun%%></option>
                    @endforeach
                </select>
            </div>
          </div>

          

          <div class="form-group">
            <label class="col-sm-2 control-label">Tanggal</label>
            <div class="col-sm-4">
              <input type="text" value="<%% date('d/m/Y', time())   %%>" name="tgl" class="form-control" id="datepicker" required>
            </div>

          </div>

            <div ng-controller="MainCtrl">
            <div data-ng-repeat="choice in choices">

            <div class="form-group">
              <label class="col-sm-2 control-label">Ke akun</label>
              <div class="col-sm-4">
                  <select class="form-control" name="no_akun{{choice}}">
                      @foreach($data as $a)
                        <option value="<%%$a->kelompok%%>-<%% $a->departemen %%>-<%%$a->noakun%%>~<%%$a->nama%%>"><%%$a->nama%%> <%%$a->kelompok%%>-<%%$a->departemen%%>-<%%$a->noakun%%></option>
                      @endforeach
                  </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah</label>
              <div class="col-sm-4">
                  <input type="text" name="nominal{{choice}}" class="form-control " id="uang" required>

              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Keterangan</label>
              <div class="col-sm-4">
                  <textarea name="keterangan{{choice}}" class="form-control"></textarea>
                  <a href="#" ng-show="$last" ng-click="addNewChoice()" class="btn btn-danger">+</a>
                  <a href="#" ng-show="$last" ng-click="removeChoice()" class="btn btn-danger">-</a>
                  <input type="hidden" value="{{choices.length+1}}" ng-show="$last" name="looping">
              </div>
            </div>



          </div>

          </div>

          </div>
          <div class="box-footer">
          </form>
              <input type="submit" id="submit" class="btn btn-primary" value="Simpan"/>
            <a href="<%%url('jurnal/create')%%>" class="btn btn-primary">Batal</a>
            </div>
      </div>
    </div>
  </div>



  <script type="text/javascript" src="<%%asset('angular/angular.min.js')%%>"></script>
  <script type="text/javascript">
  var app = angular.module('angularjs-starter', []);

  app.controller('MainCtrl', function($scope) {

  $scope.choices = [2];




  $scope.addNewChoice = function() {
$scope.ambil = $scope.choices.length + 1;
    if($scope.choices.length < 10){
     var newItemNo = $scope.ambil +1;
     $scope.choices.push(newItemNo);
   }
  };

  $scope.removeChoice = function() {
    if($scope.choices.length > 1){
      var lastItem = $scope.choices.length-1;
      $scope.choices.splice(lastItem);
    }
  };

  });
  </script>

  @section('script-kode-js')
  <script src="http://localhost:8000/adminlte/dist/js/demo.js"></script>
<script src=" http://localhost:8000/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
$(function(){
$('#datepicker').datepicker({
autoclose: true,
format: "dd/mm/yyyy"
});
});
</script>
  @endsection
@endsection
