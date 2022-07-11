@extends('_admin_layout')
@section('content')

  <body class="container-fluid px-4"  ng-app="myapp" ng-controller="mycontroller">
<h1>Quản lý sản phẩm</h1>
<p>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" ng-click="editClick(0)">
            Create
        </button>
    </p>
    <p>Search: <input type="text" ng-model='q'></p>
        <table class="table table-bordered table-stripper">
            <tr>
                <th>TT</th>
                <th>Tên sản phẩm</th>
                <th>ID Loại SP</th>
                <th>ID NCC</th>
                <th>Mô tả</th>
                <th>Image</th>
                <th>Số lượng</th>
                <th>Đơn vị tính</th>
                <th>Giá tiền</th>
                <th>Delet</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            <tr dir-paginate = "sp in sanphams | filter:q | itemsPerPage: pageSize" current-page="currentPage">
            <td>@{{$index+1 +(currentPage-1)*pageSize}}</td>
            <td>@{{sp.name}}</td>
            <td>@{{sp.id_loai_sp}}</td>
            <td>@{{sp.id_ncc}}</td>
            <td>@{{sp.mota_sp}}</td>           
            <td><img src="/upload/sanpham/@{{sp.image}}" style="width:100px"></td>
            <td>@{{sp.so_luong}}</td>
            <td>@{{sp.don_vi_tinh}}</td>
            <td>@{{sp.unit_price}}</td>
            <td>@{{sp.Delet}}</td>
            <td>@{{sp.created_at|date}}</td>
            <td>@{{sp.updated_at|date}}</td>
            <td><button class="btn btn-info" ng-click="editClick(sp.id)"> Edit</button></td>
            <td><button class="btn btn-danger" ng-click= "deleteClick(sp.id)">Delete</button></td>
        </tr>
        </table>
        <dir-pagination-controls max-size='10' on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls>


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
                            <div class="form-group"><label for="">Tên sản phẩm: </label>
                                <div><input type="text" ng-model="sanpham.name" class="form-control"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="">ID Loại SP: </label>
                                <div><input type="text" ng-model="sanpham.id_loai_sp" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">ID NCC: </label>
                                <div><input type="text" ng-model="sanpham.id_ncc" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả: </label>
                                <div><input type="text" ng-model="sanpham.mota_sp" class="form-control" id="content"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Ảnh: </label>
                                <div><input type="text" ng-model="sanpham.image" class="form-control" id="content"></div>
                            </div>
                            
                            <!-- <div class="form-group">
                            <label for="name">Ảnh:</label>
                            <div>
                                <input type="file" class="form-control" id="file-upload" ng-model="sanpham.image">
                            </div>
                            </br>
                                <div style="height:100px;display:flex;justify-content: space-around;" id="image">
                                    <div ng-repeat="sp in images" >
                                        <div>
                                            <img src="/upload/sanpham/@{{sp}}" alt="Ảnh" style="width:100px;height:100px" ng-model="sanpham.image">
                                        </div>
                                    </div>
                                </div>
                                              
                            </div> -->
                            <div class="form-group">
                                <label for="">Số lượng: </label>
                                <div><input type="text" ng-model="sanpham.so_luong" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Đơn vị tính: </label>
                                <div><input type="text" ng-model="sanpham.don_vi_tinh" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Giá tiền </label>
                                <div><input type="text" ng-model="sanpham.unit_price" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Delet </label>
                                <div><input type="text" ng-model="sanpham.Delet" class="form-control"></div>
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

        <script src="/jshome/jquery-3.3.1.min.js"></script>
        <script src="/js/angular.min.js"></script>
        <script src="/js/sanpham.js"></script>
        <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>
        <!-- <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>  -->
        <script>
            ClassicEditor.create(document.querySelector('#content'));
            $('#exampleModal').on('show.bs.modal', event => {
                var button = $(event.relatedTarget);
                var modal = $(this);
                // Use above variables to manipulate the DOM
            });
        </script>
  </body>
@stop
