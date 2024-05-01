var app = angular.module('myApp', ['ngRoute']);

app.config(function($routeProvider) {
    console.log(routeProvider);
    $routeProvider
        .when('/', {
            templateUrl: BASE_URL + 'user/messages/list',
            controller: 'msgCtrl'
        })
        .when('/user/messages', {
            templateUrl: BASE_URL + 'user/messages/send',
            controller: 'sendMsgCtrl'
        })
        .otherwise({ redirectTo: '/' }); // Redirect to home page if route not found
});

app.controller('msgCtrl', function($scope) {
    alert('test')
    // Controller logic for the home page
    console.log($scope)

});

