angular.module('messageBoard').service('apiService', ['$http', function($http) {


    // USER SERVICE
    this.getUsers = function() {
        return $http.get('/messageboard/api/user');
    };

    this.createUser = function(userData) {
        return $http.post('/messageboard/api/user/register', userData);
    };

    // MESSAGE SERVICE
    this.getMessages = function(){
        return $http.get('/messageboard/api/message');
    }

    // Other user-related methods...
}]);