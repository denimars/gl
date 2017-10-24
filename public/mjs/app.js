angular.module('angularMaskMoneyDemo', ['maskMoney'])
.run(['$rootScope', function($scope) {

    $scope.setValue = function(){
      $scope.myInput = 1000540.12;    
    }; 
    
  
}
]);