@extends('_admin_layout')
@section('content')


<body class="container-fluid px-4" ng-app="myapp" ng-controller="billsbancontroller">
    <h1 style="margin-left: 50px;margin-top:20px;">Quản lý bill bán</h1>
    <p>
        <!-- Button trigger modal -->
        <button style="margin-left: 50px;" type="button" class="btn btn-primary btn-lg" ng-click="editClick(0)">
            Create
        </button>
    </p>
    <p style="margin-left: 50px;">Search: <input type="text" ng-model='q'></p>
    <table class="table table-bordered table-stripper">
        <tr>
            <th>TT</th>
            <th>ID bill ban</th>
            <th>Tên KH</th>
            <th>SĐT</th>
            <th>Địa chỉ giao </th>
            <th>Ngày đặt </th>
            <th>Tổng tiền</th>
            <th>Payment</th>
            <th>Trạng thái</th>
            <th>Ghi chú</th>

            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Detail</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        <tr dir-paginate="bb in billsbans | filter:q | itemsPerPage: pageSize" current-page="currentPage">
            <td>@{{$index+1 +(currentPage-1)*pageSize}}</td>
            <td>@{{bb.id}}</td>
            <td>@{{bb.ten_kh}}</td>
            <td>@{{bb.sdt}}</td>
            <td>@{{bb.dc_giaohang}}</td>
            <td>@{{bb.date_order}}</td>
            <td>@{{bb.tong_tien}}</td>
            <td>@{{bb.payment}}</td>
            <td>@{{bb.status}}</td>
            <td>@{{bb.note}}</td>
            <td>@{{bb.created_at|date}}</td>
            <td>@{{bb.updated_at|date}}</td>

            <td><button class="btn btn-success" ng-click="getDetailbill(bb.id)">Detail</button></td>
            <td><button class="btn btn-info" ng-click="editClick(bb.id)">Edit</button></td>
            <td><button class="btn btn-danger" ng-click="deleteClick(bb.id)">Delete</button></td>
        </tr>
    </table>

    <ul class="wn__pagination">
        <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls>
        
    </ul>
    


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
                        <!-- <div class="form-group"><label for="">id KH: </label>
                            <div><input type="text" ng-model="billsban.id_kh" class="form-control"></div>
                        </div> -->
                        <div class="form-group"><label for="">Tên KH: </label>
                            <div><input type="text" ng-model="billsban.ten_kh" class="form-control"></div>
                        </div>

                        <div class="form-group"><label for="">SĐT: </label>
                            <div><input type="text" ng-model="billsban.sdt" class="form-control"></div>
                        </div>
                        <div class="form-group"><label for="">Địa chỉ giao hàng: </label>
                            <div><input type="text" ng-model="billsban.dc_giaohang" class="form-control"></div>
                        </div>

                        
                        <div class="form-group">
                            <label for="">Tổng tiền: </label>
                            <div><input type="text" ng-model="billsban.tong_tien" class="form-control"></div>
                        </div>

                        <div class="form-group">
                            <label for="">payment: </label>
                            <div><input type="text" ng-model="billsban.payment" class="form-control"></div>
                        </div>
                        <div class="form-group">
                            <label for="">Status: </label>
                            <div><input type="text" ng-model="billsban.status" class="form-control"></div>
                        </div>
                        <div class="form-group">
                            <label for="">Note: </label>
                            <div><input type="text" ng-model="billsban.note" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="saveData()">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal detail -->   
    <!-- <div class="modal fade" id="modaldetail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="margin-left: -145px;">
        <div class="modal-dialog" role="document"  ng-controller="billdetailbancontroller">
            <div class="modal-content" style="width:850px">
                <div class="modal-header">
                    <h5 class="modal-title">@{{modaltitle}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <table class="table table-bordered table-stripper">
                            <tr>
                                <th>Thứ tự</th>
                                <th>ID HĐB Chi tiết</th>
                                <th>ID Hóa đơn bán</th>
                                <th>ID SP</th>
                                <th>Số lượng</th>
                                <th>Giá SP</th>   
                            </tr>
                            <tr dir-paginate="b in detailbillban | filter:q | itemsPerPage: pageSize" current-page="currentPage">
                                <td>@{{$index+1 +(currentPage-1)*pageSize}}</td>
                                <td>@{{b.id}}</td>
                                <td>@{{b.id_bill_ban}}</td>
                                <td>@{{b.id_sp}}</td>
                                <td>@{{b.sl}}</td>
                                <td>@{{b.unit_price}}</td>


                                
                                
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="saveData()">Save</button>
                </div>
            </div>
        </div>
        
    </div> -->








        <script src="/jshome/jquery-3.3.1.min.js"></script>
        <script src="/js/angular.min.js"></script>
        <script src="/js/billban.js"></script>
        <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>
    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM
        });
    </script>
</body>
@stop