<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Angular Sort and Filter</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('adminlte/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('font/css/font-awesome.min.css')}}">
    <style>
        body { padding-top:50px; }
    </style>

    <!-- JS -->
    <script type="text/javascript" src="{{asset('angular/angular.min.js')}}"></script>

</head>
<body>
  <script>
  angular.module('sortApp', [])

.controller('mainController', function($scope, $http) {
$scope.sortType     = 'nama'; // set the default sort type
$scope.sortReverse  = false;  // set the default sort order
$scope.searchFish   = '';     // set the default search/filter term

// create the list of sushi rolls
/**$scope.sushi = [
  { name: 'Cali Roll', fish: 'Crab', tastiness: 2 },
  { name: 'Philly', fish: 'Tuna', tastiness: 4 },
  { name: 'Tiger', fish: 'Eel', tastiness: 7 },
  { name: 'Rainbow', fish: 'Variety', tastiness: 6 }
];**/
$scope.sushi = [];

$http({
    method : "GET",
    url : "{{ url('testdata') }}"
  }).then(function mySucces(response) {
      $scope.myWelcome = response.data;
      $scope.sushi = $scope.myWelcome;
    }, function myError(response) {
      $scope.myWelcome = response.statusText;
    });


});
  </script>
  <div class="container" ng-app="sortApp" ng-controller="mainController">

    <form>
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-addon"><i class="fa fa-search"></i></div>
          <input type="text" class="form-control" placeholder="Search da Fish" ng-model="searchFish">
        </div>
      </div>
    </form>

    <table class="table table-bordered table-striped">

      <thead>
        <tr>
          <td>
            <a href="#" ng-click="sortType = 'name'; sortReverse = !sortReverse">
              Sushi Roll
              <span ng-show="sortType == 'name' && !sortReverse" class="fa fa-caret-down"></span>
              <span ng-show="sortType == 'name' && sortReverse" class="fa fa-caret-up"></span>
            </a>
          </td>
          <td>
            <a href="#" ng-click="sortType = 'fish'; sortReverse = !sortReverse">
            Fish Type
              <span ng-show="sortType == 'fish' && !sortReverse" class="fa fa-caret-down"></span>
              <span ng-show="sortType == 'fish' && sortReverse" class="fa fa-caret-up"></span>
            </a>
          </td>
          <td>
            <a href="#" ng-click="sortType = 'tastiness'; sortReverse = !sortReverse">
            Taste Level
              <span ng-show="sortType == 'tastiness' && !sortReverse" class="fa fa-caret-down"></span>
              <span ng-show="sortType == 'tastiness' && sortReverse" class="fa fa-caret-up"></span>
            </a>
          </td>
        </tr>
      </thead>

      <tbody>
        <tr ng-repeat="roll in sushi | orderBy:sortType:sortReverse | filter:searchFish">
          <td>@{{ roll.nama }}</td>
          <td>@{{ roll.kelompok }}-@{{roll.noakun}}</td>
          <td>@{{ roll.tastiness }}</td>
        </tr>
      </tbody>

    </table>


  </div>
</body>
</html>
