@extends('layout')
@section('judul')
  Akun
@endsection
@section('konten')
<script type="text/javascript" src="<%%asset('angular/angular.min.js')%%>"></script>
<script>
angular.module('sortApp', [])

.controller('mainController', function($scope, $http) {
$scope.sortType     = 'nama';
$scope.sortReverse  = false;
$scope.akun   = '';

$scope.sushi = [];

$http({
  method : "GET",
  url : "<%% url('getakundata') %%>"
}).then(function mySucces(response) {
    $scope.myWelcome = response.data;
    $scope.sushi = $scope.myWelcome;
  }, function myError(response) {
    $scope.myWelcome = response.statusText;
  });
});
</script>

  <div class="row" ng-app="sortApp" ng-controller="mainController">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Cari akun</h3>
        </div>
        <div class="box-body">
            <div class="col-md-4">
              <input type="text" placeholder="Nama Akun" class="form-control" name="nama" ng-model="akun">
            </div>
        </div>

          </div>
  <!--- Baru disini -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Akun</h3>
    </div>
    <div class="box-body">
      <table class="table table-hover">
        <thead>
  <tr>
    <th>No Akun</th>
    <th>Nama Akun</th>
    <th>Edit</th>
    <th>Hapus</th>
  </tr>
</thead>
<tbody>
      <tr ng-repeat="roll in sushi | orderBy:sortType:sortReverse | filter:akun">
        <td>{{ roll.kelompok }}-{{roll.departemen}}-{{roll.noakun}}</td>
        <td>{{roll.nama}}</td>
        <td><a href="<%%url('/akun/{{roll.id}}/edit')%%>" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a></td>
      <td><a href="<%%url('/hapusakun/{{roll.id}}')%%>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a></td>


      </tr>
</tbody>
</table>
    </div>

      </div>

    </div>
  </div>
@endsection
