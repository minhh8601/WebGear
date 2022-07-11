<html ng-app="myapp" ng-controller="mycontroller">
    
    <body>
    @extends('_admin_layout')
        @section('content')
        <h1>Bills nhập</h1>
        <p><button class="btn btn-primary" ng-click="showModal(0)"> Create</button></p>
        <table class="table table-bordered table-stripper">
            <tr>
                <th>TT</th>
                <th>Id nhà cung cấp</th>
                <th>Id nhân viên</th>
                <th>Ngày đặt hàng</th>
                <th>Tổng tiền</th>
                <th>Thanh toán</th>
                <th>Ghi chú</th>              
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            <tr ng-repeat = "bn in billsnhap">
                <td>@{{$index+1}}</td>
                <td>@{{bn.id_ncc}}</td>
                <td>@{{bn.id_nhanvien}}</td>
                <td>@{{bn.date_order}}</td>
                <td>@{{bn.tong_tien}}</td>
                <td>@{{bn.payment}}</td>
                <td>@{{bn.note}}</td>            
                <td><button class="btn btn-info" ng-click="showModal(bn.id)"> Edit</button></td>
                <td><button class="btn btn-danger" ng-click = "deleteClick(bn.id)"> Delete</button></td>
            </tr>
        </table>
        


        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">@{{modaltitle}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">ID Nhà cung cấp: </label>
                            <div class="form-group">   
                                <div><input type="text" ng-model="billnhap.id_ncc" class="form-control"></div>
                            </div>  
                        <div class="container-fluid">ID nhân viên: </label>
                            <div class="form-group">   
                                <div><input type="text" ng-model="billnhap.id_nhanvien" class="form-control"></div>
                            </div>                         
                            <div class="form-group">
                                <label for="">Ngày đặt hàng: </label>
                                <div><input type="text" ng-model="billnhap.date_order" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Tổng tiền: </label>
                                <div><input type="text" ng-model="billnhap.tong_tien" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Payment: </label>
                                <div><input type="text" ng-model="billnhap.payment" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Ghi chú: </label>
                                <div><input type="text" ng-model="billnhap.note" class="form-control"></div>
                            </div>                           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" ng-click = "saveData()">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="sha512-Cy3gSrKCS8aJ7AIaammc0wLXyKRmTa8ntgHvU01Tuz4EdsqVgk/lKzFm/b/8RxOWBaoHI2uGLLU6rXMbqKcGHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="/js/angular.min.js"></script>
        <script src="/js/billnhap.js"></script>
        <script>
            $('#exampleModal').on('show.bs.modal', event => {
                var button = $(event.relatedTarget);
                var modal = $(this);
                // Use above variables to manipulate the DOM
            });
        </script>
        
    </body>
    @stop
</html>