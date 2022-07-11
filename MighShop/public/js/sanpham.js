var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
app.controller('mycontroller', ['$scope', '$http', mycontrol]);

function mycontrol($scope, $http) {
    $scope.q = "";
    $scope.product_id = sessionStorage.getItem('seletedProduct') ?? undefined;

    $scope.Image = [];

    $scope.loaddata = function(id_loai) {
        
        if (id_loai) {
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/sanphams"
            }).success(function(response) {
                $scope.sanphams = response.filter(item => item.id_loai_sp == id_loai);
            });
        } else {
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/sanphams"
            }).success(function(response) {
                $scope.sanphams = response;
                $scope.banphims = $scope.sanphams.filter(item => item.id_loai_sp == 8);
                $scope.chuots = $scope.sanphams.filter(item => item.id_loai_sp == 9);
                $scope.tainghes = $scope.sanphams.filter(item => item.id_loai_sp == 10);
                console.log(response);
            });


        }
    }
    $scope.loaddata();

    

    $scope.LoadSP = function(masp) {
        $http({
            method: 'GET',
            url: 'http://127.0.0.1:8000/api/sanphams' + masp,
        }).then(function(response) {
            $scope.sanpham = response.data;
        })
    };
    $scope.Getsptheoloai = function(id) {
        $scope.id = id;
        $scope.loaddata(id);

    }




    $scope.modalHide = function() {
        $('#modelId').modal('hide');
    }
    $scope.editClick = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Thêm mới sản phẩm";

            if ($scope.sanpham) {
                delete $scope.sanpham;
            }

        } else {
            $scope.modalTitle = "Sửa sản phẩm";
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/sanphams/" + id
            }).success(function(response) {
                $scope.sanpham = response;
                // $('.ck-content p').text($scope.sanpham.mota_sp);
            });
        }
        $('#modelId').modal('show');
    }
    $scope.updateData = function() {
        var mt = $scope.id == 0 ? "POST" : "PUT";
        var url1 = $scope.id == 0 ? "http://127.0.0.1:8000/api/sanphams/" : "http://127.0.0.1:8000/api/sanphams/" + $scope.id;
        alert($scope.sanpham.name);
        $http({
            method: mt,
            url: url1,
            data: $scope.sanpham,
            'Content-Type': 'application/json'
        }).success(function(response) {
            console.log(response);
            $('#modelId').modal('hide');
            $scope.loaddata();
        });
    }

    $scope.deleteClick = function(id) {
        var hoi = confirm('Bạn có muốn xóa sản phẩm này không?');
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/sanphams/" + id,
                data: $scope.sanpham,
            }).then(function(res) {
                $scope.message = res.data;
                $scope.loaddata();
            });
        }
    }

    $scope.getDetail = function() {
        if ($scope.product_id) {
            $http({
                method: 'GET',
                url: 'http://127.0.0.1:8000/api/sanphams/' + $scope.product_id,
            }).then(function(response) {
                $scope.sanpham = response.data;
                console.log($scope.sanpham);
            })
        }
    }

    $scope.openDetail = function(id) {
        sessionStorage.setItem('seletedProduct', id);
    }


    $scope.saveData = function() {
        // const content =  $('.ck-content p').text();
        // $scope.sanpham.mota_sp = content;
        var m = $scope.id == 0 ? "POST" : "PUT";
        var url = $scope.id == 0 ? "http://127.0.0.1:8000/api/sanphams/" : "http://127.0.0.1:8000/api/sanphams/" + $scope.id;
        $http({
            method: m,
            url: url,
            data: $scope.sanpham,
            'content-Type': 'application/json'
        }).then(function(res) {
            $scope.sanpham == res.data;
        }, err => console.log(err));
        $('#modelId').modal('hide');
        $scope.loaddata();
    }


    $scope.addToCart = function() {

        const quan = Number.parseInt($('#sl').val());

        let item = {};
        item.id = $scope.sanpham.id;
        item.name = $scope.sanpham.name;
        item.id_loai_sp = $scope.sanpham.id_loai_sp;
        item.id_ncc = $scope.sanpham.id_ncc;
        item.unit_price = $scope.sanpham.unit_price;
        item.image = $scope.sanpham.image;
        item.quantity = quan;

        
        var list;
        if (!localStorage.getItem('cart')) {
            list = [item];
        } else {
            list = JSON.parse(localStorage.getItem('cart')) || [];
            let ok = true;
            for (let x of list) {
                if (x.id == item.id) {
                    x.size = item.size;
                    ok = false;
                    break;
                }
            }
            if (ok) {
                list.push(item);
            }
        }
        localStorage.setItem('cart', JSON.stringify(list));
        alert("Đã thêm giở hàng thành công");
    }
    $scope.currentPage = 1;
    $scope.pageChangeHandler = function(num) {
    $scope.currentPage = num;
    };
    $scope.pageSize = 8;


}


