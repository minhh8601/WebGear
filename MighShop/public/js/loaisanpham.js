var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
app.controller('loaispcontroller', function($scope, $http, $filter) {
    $scope.q = "";
    $scope.loaddata = function() {
        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/loaisanphams"
        }).success(function(response) {
            $scope.loaisanphams = response;
            console.log(response);
        });
    }
    $scope.loaddata();
    $scope.modalHide = function() {
        $('#modelId').modal('hide');
    }
    $scope.editClick = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Them moi loai san pham";

            if ($scope.sanpham) {
                delete $scope.loaisanpham;
            }

        } else {
            $scope.modalTitle = "Sua loai san pham";
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/loaisanphams/" + id
            }).success(function(response) {
                $scope.loaisanpham = response;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.updateData = function() {
        var mt = $scope.id == 0 ? "POST" : "PUT";
        var url1 = $scope.id == 0 ? "http://127.0.0.1:8000/api/loaisanphams/" : "http://127.0.0.1:8000/api/loaisanphams/" + $scope.id;
        alert($scope.loaisanpham.tenloai);
        $http({
            method: mt,
            url: url1,
            data: $scope.loaisanpham,
            'Content-Type': 'application/json'
        }).success(function(response) {
            console.log(response);
            $('#modelId').modal('hide');
            $scope.loaddata();
        });
    }

    $scope.deleteClick = function(id) {
        var hoi = confirm('Ban co muon xoa loai san pham nay khong?');
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/loaisanphams/" + id,
                data: $scope.loaisanpham,
            }).then(function(res) {
                $scope.message = res.data;
                $scope.loaddata();
            });
        }
    }
    $scope.saveData = function() {
        var m = $scope.id == 0 ? "POST" : "PUT";
        var url = $scope.id == 0 ? "http://127.0.0.1:8000/api/loaisanphams/" : "http://127.0.0.1:8000/api/loaisanphams/" + $scope.id;
        $http({
            method: m,
            url: url,
            data: $scope.loaisanpham,
            'content-Type': 'application/json'
        }).then(function(res) {
            $scope.loaisanpham == res.data;
        }, err => console.log(err));
        $('#modelId').modal('hide');
        $scope.loaddata();
    }
    $scope.currentPage = 1;
    $scope.pageChangeHandler = function(num) {
        $scope.currentPage = num;
    };
    $scope.pageSize = 5;
});