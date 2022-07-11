
    @extends('_admin_layout')
        @section('content')
        <body  ng-app="myapp" ng-controller="mycontrol">
        <h1>Nha cung cap</h1>
        <p><button class="btn btn-primary" ng-click="showModal(0)"> Create</button></p>
        <table class="table table-bordered table-stripper">
            <tr>
                <th>TT</th>
                <th>id</th>
                <th>ten_ncc</th>
                <th>diachi_ncc</th>
                <th>email</th>
                <th>sdt</th>
                <th>Delet</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            <tr ng-repeat = "nv in nccs">
                <td>@{{$index+1}}</td>
                <td>@{{nv.id}}</td>
                <td>@{{nv.ten_ncc}}</td>
                <td>@{{nv.diachi_ncc}}</td>
                <td>@{{nv.email}}</td>
                <td>@{{nv.sdt}}</td>
                <td>@{{nv.Delet}}</td>
                <td>@{{nv.created_at}}</td>
                <td>@{{nv.updated_at}}</td>
                <td><button class="btn btn-info" ng-click="showModal(nv.id)"> Edit</button></td>
                <td><button class="btn btn-danger" ng-click = "deleteClick(nv.id)"> Delete</button></td>
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
                            <div class="form-group"><label for="">tenn ncc: </label>
                                <div><input type="text" ng-model="ncc.ten_ncc" class="form-control"></div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="">Sex: </label>
                                <select ng-model="staff.gioitinh" class="form-control">
                                    <option value="Nam">Nam</option>
                                    <option value="Nu">Nu</option>
                                </select>
                            </div> -->
                            <div class="form-group">
                                <label for="">dia chi ncc: </label>
                                <div><input type="text" ng-model="ncc.diachi_ncc" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">email: </label>
                                <div><input type="text" ng-model="ncc.email" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Phone: </label>
                                <div><input type="text" ng-model="ncc.sdt" class="form-control"></div>
                            </div>
                           
                            <div class="form-group">
                                <label for="">Delet: </label>
                                <div><input type="text" ng-model="ncc.Delet" class="form-control"></div>
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
        <script src="/js/nhacungcap.js"></script>
        <script>
            $('#exampleModal').on('show.bs.modal', event => {
                var button = $(event.relatedTarget);
                var modal = $(this);
                // Use above variables to manipulate the DOM
            });
        </script>
        
    </body>
    @stop