angular.module('messageBoard').controller('mainController', ['apiService', '$scope', function (apiService, $scope, $location) {
    var vm = this;
    // USER
    vm.addUser = function (event) {
        event.preventDefault(); // Prevent default form submission behavior

        $scope.errorMessages = {};

        var postData = {
            name: vm.name != undefined ? vm.name : '',
            email: vm.email != undefined ? vm.email : '',
            password: vm.password != undefined ? vm.password : '',
            confirm_password: vm.confirm_password != undefined ? vm.confirm_password : ''
        };

        apiService.createUser(postData)
            .then(function (response) {
                // Handle success response
                $scope.isError = false;
                if (response.data.status == 'errors') {
                    $scope.errorMessages = response.data.errors;
                    $scope.isError = true;
                    $scope.errorMessagesArr = Object.values($scope.errorMessages);
                } else {
                    $scope.errorMessages = {};
                    window.location.href = BASE_URL + 'users/success-register';

                }
            })
            .catch(function (error) {
                console.log(error)
                // Handle error response
                console.error('Error:', error);
            });
    };

    // MESSAGE
    vm.getMessages = function (event){
        apiService.getMessages()
        .then(function(res){
            console.log(res);
        })
        .catch(function(err){
            console.error('Error:', error);
        })
    } 

    this.getMessages();
}]);