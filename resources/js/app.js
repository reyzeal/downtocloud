require('./bootstrap');
require('angular');
const app = angular.module('perpus-app',[],['$httpProvider', function ($httpProvider) {
        $httpProvider.defaults.headers.post['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');
    }]);
window.app = app;

app.controller('main',['$scope',function($scope){
  console.log('ok');
}]);
