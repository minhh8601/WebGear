


@extends('_admin_layout')
@section('content')
<body  ng-app="myapp" ng-controller="mycontroller">
    <h1>Phan hoi</h1>
    <p>
        <button class="btn btn-primary" ng-click="editClick(0)">Add news</button>
    </p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>TT</th>
                <th>ID Phan hoi</th>
                <th>ID Tai khoan</th>
                <th>ID SP</th>
                <th>Level</th>
                <th>Note</th>
                
                <th>Created_at</th>
                <th>Updated_at</th>

                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat = "sp in phanhois">
                <td>@{{ $index+1 }}</td>
                <td>@{{ sp.id_phan_hoi }}</td>
                <td>@{{ sp.id_tk }}</td>
                <td>@{{ sp.id_sp }}</td>
                <td>@{{ sp.level }}</td>
                <td>@{{ sp.note }}</td>
                
                <td>@{{ sp.created_at }}</td>
                <td>@{{ sp.updated_at }}</td>
               
                <td><button class="btn btn-info" ng-click="editClick(sp.id)">Sua</button></td>
                <td><button class="btn btn-danger" ng-click="deleteClick(sp.id)">xoa</button></td>
            </tr>
        </tbody>
    </table>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
      Launch
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">@{{modalTitle}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                    <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Ten khach hangg</label>
                            <div class="col-sm-9">

                              <input type="text" class="form-control" id="name" ng-model="khachhang.ten_kh">
                            </div>

                            <label for="name" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">

                              <input type="name" class="form-control" id="name" ng-model="khachhang.email">
                            </div>

                            

                          </div>
                          
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="updateData()">Save</button>
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/js/angular.min.js"></script>
    <script src="/js/phanhoicontroller.js">

    </script>
  </body>
@stop