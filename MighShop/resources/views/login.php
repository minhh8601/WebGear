<!DOCTYPE html>
<html>
<style>
    input,
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        width: 100%;
        background-color: burlywood;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    body {
        width: 300px;
        margin: 0 auto;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>






<body ng-app="myapp" ng-controller="logincontroller">
    <h3>Đăng nhập</h3>
    <div>
        <label for="tailkhoan">Tài khoản</label>
        <input type="text" id="users_name" name="users_name" placeholder="username...">
        <label for="matkhau">Mật khẩu</label>
        <input type="password" id="password" name="password" placeholder="password...">
        <button ng-click="Login()" type="button">Đăng nhập</button>
        <label id="err" style="color: red;"></label>
    </div>
</body>
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/angular.min.js"></script>
<script src="/js/login.js"></script>
</html>