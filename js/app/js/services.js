'use strict';

/* Services */

var profilesServices = angular.module('profilesServices', ['ngResource']);

profilesServices.factory('Profiles', ['$resource', function($resource){
  return $resource('rest.php',
    {},{
//      get: {
//        method: 'GET',
//        params: {prfileId: '@profileId'},
//        isArray: false
//      },
      getProfiles: {
        method: 'GET',
        params: {type: 'profiles'},
        isArray: false
      },
      getTechnology: {
        method: 'GET',
        params: {type: 'technology'},
        isArray: false
      }
    }
  );
}]);
