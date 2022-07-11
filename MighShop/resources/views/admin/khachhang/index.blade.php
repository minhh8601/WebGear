<html ng-app="myapp" ng-controller="mycontrol">

    <body>
    @extends('_admin_layout')
        @section('content')
        <h1>khachhang</h1>
        <p><button class="btn btn-primary" ng-click="showModal(0)"> Create</button></p>
        <table class="table table-bordered table-stripper">
            <tr>
                <th>TT</th>
                <th>id</th>
                <th>ten kh</th>
                <th>email</th>
                <th>dia chi</th>
                <th>sdt</th>
                <th>note</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            <tr ng-repeat = "kh in khachhangs">
                <td>@{{$index+1}}</td>
                <td>@{{kh.id}}</td>
                <td>@{{kh.ten_kh}}</td>
                <td>@{{kh.email}}</td>
                <td>@{{kh.dia_chi}}</td>
                <td>@{{kh.sdt}}</td>
                <td>@{{kh.note}}</td>
               
                <td><button class="btn btn-info" ng-click="showModal(kh.id)"> Edit</button></td>
                <td><button class="btn btn-danger" ng-click = "deleteClick(kh.id)"> Delete</button></td>
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
                        <div class="container-fluid">
                            <div class="form-group"><label for="">ten kh </label>
                                <div><input type="text" ng-model="khachhang.ten_kh" class="form-control"></div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="">Address: </label>
                                <div><input type="text" ng-model="khachhang.dia_chi" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Phone: </label>
<div><input type="text" ng-model="khachhang.sdt" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Email: </label>
                                <div><input type="text" ng-model="khachhang.email" class="form-control"></div>
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
        <script src="/js/khachhang.js"></script>
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