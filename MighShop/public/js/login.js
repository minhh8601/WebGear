var app = angular.module('myapp', []);
app.controller('logincontroller', function($scope, $http) {


        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/userss/"
        }).success(function(response) {
            $scope.users = response;
            console.log(response);
        });

        


        $scope.Login=function() {
          
            var item = {};
            item.Username = $("#users_name").val();
            item.Password = $("#password").val();

            if ($scope.users != null) {
               
                for (let x of $scope.users) {
                    if (x.users_name == item.Username && x.password==item.Password) {
                        window.location.href = "/admin/sanpham";
                        break;
                    }
                    else{
                        alert('Tài khoản hoặc mật khẩu không chính xác !');
                        break;
                    }
                }
                
            }
            
        }

})