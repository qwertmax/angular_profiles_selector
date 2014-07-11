'use strict';

/* App Module */

var profilesApp = angular.module('profilesApp', [
  'profilesControllers',
  'profilesServices'
]);

profilesApp.filter('technologyFilter', function() {
  return function(input, o) {
    if(input == undefined || !input.length) return;

    var tmp = [];
    for(var i in input){

      var flag = false;
      for(var j in o){
        if(input[i].tids.indexOf(o[j].value) >= 0){
          flag = true;
        }else{
          flag = false;
          break;
        }
      }

      if(flag){
        tmp.push(input[i]);
      }

    }

    return tmp;
  };
});