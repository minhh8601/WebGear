var app = angular.module('myapp', []).constant('api', 'http://127.0.0.1:8000/api/nccs/');
app.controller('mycontrol', ['$scope', '$http', 'api', mycontrol]);

function mycontrol($scope, $http, api) {
    $http({
        method: "GET",
        url: api
    }).then(function(res) {
        $scope.nccs = res.data;
    });
    $scope.reloadData = function() {
        $http({
            method: "GET",
            url: api
        }).then(function(res) {
            $scope.nccs = res.data;
        });
    }
    $scope.showModal = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modaltitle = "Add news ncc";
            if ($scope.ncc) {
                delete $scope.ncc;
            }
        } else {
            $scope.modaltitle = "Edit ncc";
            $http({
                method: "GET",
                url: api + id
            }).then(function(res) {
                $scope.ncc = res.data;
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
            data: $scope.ncc,
            'content-Type': 'application/json'

        }).then(function(res) {
            $scope.ncc == res.data;
        });
        $('#modelId').modal('hide');
        $scope.reloadData();
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm('ban co muon xoa ncc nay khong?');
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