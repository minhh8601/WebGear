var app = angular.module('myapp', []).constant('api', 'http://127.0.0.1:8000/api/khos/');
app.controller('mycontrol', ['$scope', '$http', 'api', mycontrol]);

function mycontrol($scope, $http, api) {
    $http({
        method: "GET",
        url: api
    }).then(function(res) {
        $scope.khos = res.data;
    });
    $scope.reloadData = function() {
        $http({
            method: "GET",
            url: api
        }).then(function(res) {
            $scope.khos = res.data;
        });
    }
    $scope.showModal = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modaltitle = "Add news kho";
            if ($scope.kho) {
                delete $scope.kho;
            }
        } else {
            $scope.modaltitle = "Edit kho";
            $http({
                method: "GET",
                url: api + id
            }).then(function(res) {
                $scope.kho = res.data;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.saveData = function() {
        var m = $scope.id == 0 ? "POST" : "PUT";
        var url = $scope.id == 0 ? api : api + $scope.id;
        $http({
            method: m,
            url: url,
            data: $scope.kho,
            'content-Type': 'application/json'

        }).then(function(res) {
            $scope.kho == res.data;
        });
        $('#modelId').modal('hide');
        $scope.reloadData();
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm('ban co muon xoa khong?');
        if (hoi) {
            $http({
                method: "DELETE",
                url: api + id
            }).then(function(res) {
                $scope.message = res.data;
                $scope.reloadData();
            });
        }


    }
}