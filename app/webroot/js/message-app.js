var app = angular.module('myApp', ['ngRoute']);
// console.log(app);
app.config(function($routeProvider, $locationProvider) {

    $locationProvider.hashPrefix('');
    $routeProvider
        .when('/', {
            templateUrl: BASE_URL + 'user/messages/list',
            controller: 'sendMsgCtrl'
        })
        .when('/list', {
            templateUrl: BASE_URL + 'user/messages/list',
            controller: 'msgListCtrl'
        })
        .when('/send', {
            templateUrl: BASE_URL + 'user/messages/send',
            controller: 'msgListCtrl'
        })
        .otherwise({ redirectTo: BASE_URL + '/' }); // Redirect to home page if route not found
});

app.controller('msgListCtrl', function($scope) {
    $scope.goToPage = function(path) {
        // $location.path(path); // Update the URL path
        alert(path)
    };
    alert('test')
    // Controller logic for the home page
    // console.log($scope)

});

app.controller('sendMsgCtrl', function($scope) {
    alert('test1')
    // Controller logic for the home page
    // console.log($scope)

});

app.controller('msgDetailsCtrl', function($scope) {
    alert('test2')
    // Controller logic for the home page
    console.log($scope)
});

