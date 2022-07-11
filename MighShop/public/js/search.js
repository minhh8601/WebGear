var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
app.controller('searchcontroller', ['$scope', '$http', mycontrol]);

    function mycontrol($scope, $http) {

            $scope.Search = function(keyword) {
                sessionStorage.setItem('keyword', keyword);
                window.location.href = "/shop";
            }
        }