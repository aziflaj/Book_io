app.controller('MainCtrl', ['$scope',
    function($scope) {
        $scope.hello = 'Welcome to Book.io Main Page';
}]);

app.controller('StandbyCtrl',['$scope',
    function($scope){
        $scope.standbypage= 'Book Io';
    }
]);