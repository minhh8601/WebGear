@extends('_admin_layout')
@section('content')

<div class="container-fluid px-4" ng-app="myapp" ng-controller="loaispcontroller">
    <h1>Danh sach loai san pham</h1>
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
            <th>ID</th>
            <th>Ten loai</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
        <tr dir-paginate = "lsp in loaisanphams | filter:q | itemsPerPage: pageSize" current-page="currentPage">
            <td>@{{$index+1 +(currentPage-1)*pageSize}}</td>
            <td>@{{lsp.id}}</td>
            <td>@{{lsp.tenloai}}</td>
            <td><button class="btn btn-info" ng-click="editClick(lsp.id)"> Edit</button></td>
            <td><button class="btn btn-danger" ng-click= "deleteClick(lsp.id)">Delete</button></td>
        </tr>
    </table>   
    <dir-pagination-controls max-size='5' on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls>

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">@{{modalTitle}}</h5>
                                <button type="button" class="close" ng-click="modalHide()" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="">ID </label>
                            <div><input type="text" ng-model="loaisanpham.id" class="form-control"></div>
                        </div>
                        <div class="form-group">
                            <label for="">Ten loai </label>
                            <div><input type="text" ng-model="loaisanpham.tenloai" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" ng-click="modalHide()">Close</button>
                    <button type="button" class="btn btn-primary" ng-click = "updateData()">Save</button>
                </div>
            </div>
        </div>
    </div>
        
    
    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM
            
        });
    </script>
        <script src="/js/angular.min.js"></script>      
        <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>
        <script src="/js/loaisanpham.js"></script>
      
</div>
@stop
