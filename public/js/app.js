var app = angular.module('book-io',['ui.bootstrap','ngRoute']);

app.config(function($routeProvider){
    $routeProvider
        .when('/',{
            templateUrl: 'pages/standbypage.html',
            controller: 'StandbyCtrl'
        })
        .otherwise({
            redirectTo: '/'
        });
});

