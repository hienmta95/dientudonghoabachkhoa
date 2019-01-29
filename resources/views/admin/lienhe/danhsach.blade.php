@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách các liên hệ gần đây
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
                    <!-- <p class="pull-right">
                      <a href="admin/loaisanpham/them">
                        <button class="btn btn-primary">
                            <i class="fa fa-plus fa-fw"></i>Thêm loại sp
                        </button>
                      </a>
                    </p> -->
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>SĐT</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Nội dung</th>
                        <th>Status</th>
                        <th>Xóa</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($type as $type)
                    <tr class="odd gradeX" align="center">
                        <td>{{$type->id}}</td>
                        <td>{{$type->hoten}}</td>
                        <td>{{$type->sdt}}</td>
                        <td>{{$type->email}}</td>
                        <td>{{$type->diachi}}</td>
                        <td>{{$type->noidung}}</td>
                        <td>
                            @if($type->status == 1)
                              {{"Done"}}
                            @else
                              {{"Not yet"}}
                            @endif
                        </td>
                        <td class="center">
                            <a style="color: #d43f3a;" href="admin/lienhe/xoa/{{$type->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa dữ liệu này...?  ')" data-toggle="tooltip" data-placement="bottom" title="Xóa">
                                <i class="glyphicon glyphicon-remove"></i>
                            </a>
                        </td>
                        <td class="center">
                            <a href="admin/lienhe/sua/{{$type->id}}" data-toggle="tooltip" data-placement="bottom" title="Sửa liên hệ">
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