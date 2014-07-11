'use strict';

/* Controllers */
var profilesControllers = angular.module('profilesControllers', []);

profilesControllers.controller('MainCtrl', ['$scope', 'Profiles', function($scope, Profiles) {
  $scope.profiles = [];
  $scope.technology = [];
  $scope.technologySearch = '';
  $scope.technologyArray = [];

  Profiles.getProfiles().$promise.then(function(data){
    for(var val in data.data){
//      $scope.profiles.push({id: val, value: data.data[val]});
      $scope.profiles.push(data.data[val]);
    }
  });

  Profiles.getTechnology().$promise.then(function(data){
    for(var val in data.data){
      $scope.technology.push({tid: val, value: data.data[val]});
    }
  });

  $scope.addTechnology = function(t){
    var index = $scope.technology.indexOf(t);
    $scope.technologyArray.push($scope.technology[index]);
    $scope.technology.splice(index, 1);
  }

  $scope.close_technology = function(t){
    var index = $scope.technologyArray.indexOf(t);
    $scope.technologyArray.splice(index, 1);
    $scope.technology.unshift(t);
  }

}]);
