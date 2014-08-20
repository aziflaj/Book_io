var app = angular.module('book-io',['ui.bootstrap']);

app.controller('MainCtrl', ['$scope',
    function($scope) {
        $scope.hello = 'Welcome to Book.io Main Page';
}]);