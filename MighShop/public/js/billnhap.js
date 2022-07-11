var app = angular.module('myapp', []).constant('api', 'http://127.0.0.1:8000/api/billsnhap/');
app.controller('mycontrol', ['$scope', '$http', 'api', mycontrol]);

function mycontrol($scope, $http, api) {
    $http({
        method: "GET",
        url: api
    }).then(function(res) {
        $scope.billsnhap = res.data;
    });
    $scope.reloadData = function() {
        $http({
            method: "GET",
            url: api
        }).then(function(res) {
            $scope.billsnhap = res.data;
        });
    }
    $scope.showModal = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modaltitle = "Add news billnhap";
            if ($scope.billban) {
                delete $scope.billnhap;
            }
        } else {
            $scope.modaltitle = "Edit billnhap";
            $http({
                method: "GET",
                url: api + id
            }).then(function(res) {
                $scope.billnhap = res.data;
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
            data: $scope.billnhap,
            'content-Type': 'application/json'

        }).then(function(res) {
            $scope.billnhap == res.data;
        });
        $('#modelId').modal('hide');
        $scope.reloadData();
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm('ban co muon xoa bill nhap nay khong?');
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
$scope.saveData = function() {
    var m = $scope.id == 0 ? "POST" : "PUT";
    var url = $scope.id == 0 ? "http://127.0.0.1:8000/api/billnhaps/" : "http://127.0.0.1:8000/api/billnhaps/" + $scope.id;
    $http({
        method: m,
        url: url,
        data: $scope.billnhap,
        'content-Type': 'application/json'
    }).then(function(res) {
        $scope.billnhap == res.data;
    }, err => console.log(err));
    $('#modelId').modal('hide');
    $scope.loaddata();
}