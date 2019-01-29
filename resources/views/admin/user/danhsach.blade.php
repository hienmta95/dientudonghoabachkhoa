@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách các user
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            
            <div class="row">
                <div class="col-lg-8">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                </div>
                <div class="col-lg-4">
                    <p class="pull-right">
                      <a href="admin/user/them">
                        <button class="btn btn-primary">
                            <i class="fa fa-plus fa-fw"></i>Thêm user
                        </button>
                      </a>
                    </p>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Group</th>
                        <th>Email</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $user)
                    <tr class="odd gradeX" align="center">
                        <td>{{$user->id}}</td>
                        <td><img style="width: 30px; float: left" src="upload/user/{{$user->image}}">  {{$user->name}}</td>
                        <td>Admin</td>
                        <td>{{$user->email}}</td>
                        <!-- <td>
                            @if($user->level == 1)
                              {{"Admin"}}
                            @else
                              {{"Thường"}}
                            @endif
                          </td> -->
                        <td class="center">
                            <a style="color: #d43f3a;" href="admin/user/xoa/{{$user->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ...?  ')" data-toggle="tooltip" data-placement="bottom" title="Xóa user">
                                <i class="glyphicon glyphicon-remove"></i>
                            </a>
                        </td>
                        <td class="center">
                            <a href="admin/user/sua/{{$user->id}}" data-toggle="tooltip" data-placement="bottom" title="Sửa user">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection