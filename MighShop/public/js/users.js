var app = angular.module('myapp', []);
app.controller('mycontroller', function($scope, $http) {
    $scope.hello = "Hello world";
    $scope.nhanviens = JSON.parse('{"employees":[ { "firstName": "John", "lastName": "Doe" }, { "firstName": "Anna", "lastName": "Smith" }, { "firstName": "Peter", "lastName": "Jones" }]}');
    $http({
        Method: "GET",
        url: "http://127.0.0.1:8000/api/userss"
    }).success(function(response) {
        $scope.userss = response;
    });
    $scope.editClick = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Them moi ban tin";
           
        } else {
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/userss/" + id
            }).success(function(response) {
                $scope.users = response;
                
            });
            $scope.modalTitle = "Sua ban tin";
        }
        $('#modelId').modal('show');
    }
    $scope.updateData = function() {
        $http({
            method: "PUT",
            url: "http://127.0.0.1:8000/api/userss/" + $scope.id,
            data: $scope.users,
            headers: { 'Content-Type': 'application/json' }
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(err => console.log(err));
    }
    $scope.deleteClick = function(id) {
        var xacnhan = confirm("Ban co muon xoa that khong?");
        if (xacnhan) {
            alert("Ban vua chon xoa id=" + id);
        } else {
            alert("Ban da huy lenh xoa");
        }

    }
});