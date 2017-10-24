@extends('layout')
@section('judul')
  Pinjaman
@endsection
@section('konten')
<script type="text/javascript" src="<%%asset('angular/angular.min.js')%%>"></script>
<script>
angular.module('sortApp', [])

.controller('mainController', function($scope, $http) {
$scope.sortType     = 'nama';
$scope.sortReverse  = false;
$scope.ptk   = '';

$scope.sushi = [];

$http({
  method : "GET",
  url : "<%% url('getallptk') %%>"
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
          <h3 class="box-title">Cari PTK</h3>
        </div>
        <div class="box-body">
            <div class="col-md-4">
              <input type="text" placeholder="Nama PTK" class="form-control" name="nama" ng-model="ptk">
            </div>
        </div>

          </div>
  <!--- Baru disini -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">PTK</h3>
    </div>
    <div class="box-body">
      <table class="table table-hover">
        <thead>
  <tr>
    <th>Id PTK</th>
    <th>Nama PTK</th>
    <th>Edit</th>
    <th>Riwayat Pinjaman</th>
    <th>Pinjaman</th>
    <th>Pembayaran</th>
  </tr>
</thead>
<tbody>
      <tr ng-repeat="roll in sushi | orderBy:sortType:sortReverse | filter:ptk">
        <td>{{ roll.no_ptk }}</td>
        <td>{{roll.nama}}</td>
        <td><a href="<%%url('/ptk/{{roll.id}}/edit')%%>" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a></td>
      <td><a href="<%%url('riwayat?no_ptk={{roll.no_ptk}}')%%>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a></td>
      <td><a href="<%%url('pinjaman/create?no_ptk={{roll.no_ptk}}')%%>" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a></td>
      <td><a href="<%% url('pembayaran/create?no_ptk={{roll.no_ptk}}') %%>" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a></td>


      </tr>
</tbody>
</table>
    </div>

      </div>

    </div>
  </div>
@endsection
