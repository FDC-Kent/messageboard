angular.module('messageBoard').controller('registerController', ['userService', '$scope', function (userService, $scope, $location) {
    var vm = this;

    // create user
    vm.addUser = function (event) {
        event.preventDefault(); // Prevent default form submission behavior

        $scope.errorMessages = {};

        var postData = {
            name: vm.name != undefined ? vm.name : '',
            email: vm.email != undefined ? vm.email : '',
            password: vm.password != undefined ? vm.password : '',
            confirm_password: vm.confirm_password != undefined ? vm.confirm_password : ''
        };

        userService.createUser(postData)
            .then(function (response) {
                // Handle success response
                if (response.data.status == 'errors' && response.data.message == 'Validation errors') {
                    $scope.errorMessages = response.data.errors;
                    $scope.errorMessagesArr = Object.values($scope.errorMessages);
                } else {
                    $scope.errorMessages = {};
                    window.location.href = BASE_URL + 'users/login';

                }
            })
            .catch(function (error) {
                console.log(error)
                // Handle error response
                console.error('Error:', error);
            });
    };


}]);