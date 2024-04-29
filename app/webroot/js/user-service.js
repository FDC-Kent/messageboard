angular.module('messageBoard').service('userService', ['$http', function($http) {

    this.getUsers = function() {
        return $http.get('/messageboard/api/user');
    };

    this.createUser = function(userData) {
        return $http.post('/messageboard/api/user/register', userData);
    };

    // Other user-related methods...
}]);