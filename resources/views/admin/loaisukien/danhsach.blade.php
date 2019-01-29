@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách các loại sản phẩm
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
                      <a href="admin/loaisanpham/them">
                        <button class="btn btn-primary">
                            <i class="fa fa-plus fa-fw"></i>Thêm loại sp
                        </button>
                      </a>
                    </p>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên loại</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả</th>
                        <!-- <th>Nội dung</th> -->
                        <th>Tên không dấu</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($type as $type)
                    <tr class="odd gradeX" align="center">
                        <td>{{$type->id}}</td>
                        <td>{{$type->ten}}</td>
                        <td>
                            <img width="50px" src="/upload/loaisanpham/{{$type->image}}">
                        </td>
                        <td>{{$type->mota}}</td>
                        <!-- <td>{{$type->noidung}}</td> -->
                        <td>{{$type->slug}}</td>
                        <td class="center">
                            <a style="color: #d43f3a;" href="admin/loaisanpham/xoa/{{$type->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa loại sản phẩm này...?  ')" data-toggle="tooltip" data-placement="bottom" title="Xóa loại sản phẩm">
                                <i class="glyphicon glyphicon-remove"></i>
                            </a>
                        </td>
                        <td class="center">
                            <a href="admin/loaisanpham/sua/{{$type->id}}" data-toggle="tooltip" data-placement="bottom" title="Sửa loại sự kiện">
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