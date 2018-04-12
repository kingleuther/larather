(function() {
    angular.module('App', [])
        .controller('AppController', AppController);
    console.log('angular', angular);
    console.log('outside'); 
    AppController.$inject = ['$http'];

    function AppController($http) {
        console.log('AppController');          
        var vm = this;
        vm.testClick = testClick;
        
        function testClick() {
            console.log('testClick -- name', vm.name);
            console.log('testClick -- email', vm.email);
            console.log('testClick -- message', vm.message);
            $http.post('contact/submit', {
                name: vm.name,
                email: vm.email,
                message: vm.message
            })
                .then(
                    function(response) {
                        console.log(response.data)
                        if (response.data) {
                            window.location.assign('/?data=' + response.data);
                        }
                    }, 
                    function(response) {
                        // failure callback
                    }
                );
        }
    }
})();