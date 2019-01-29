@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách các trang con
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
                      <a href="admin/trangcon/them">
                        <button class="btn btn-primary">
                            <i class="fa fa-plus fa-fw"></i>Thêm trang con
                        </button>
                      </a>
                    </p>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Mô tả</th>
                        <th>Vị trí</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trangcon as $sl)
                    <tr class="odd gradeX" align="center">
                        <td>{{$sl->id}}</td>
                        <td>{{$sl->tieude}}</td>
                        <td>{!! $sl->mota !!}</td>
                        <td>
                            @if($sl->vitri == 1)
                              {{"Menu"}}
                            @elseif($sl->vitri == 2)
                              {{"Giải pháp"}}
                            @elseif($sl->vitri == 3)
                              {{"Hỗ trợ"}}
                            @elseif($sl->vitri == 4)
                              {{"Giới thiệu"}}
                            @else
                              {{"Chưa chọn vị trí"}}
                            @endif
                        </td>
                        <td class="center">
                            <a style="color: #d43f3a;" href="admin/trangcon/xoa/{{$sl->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa trang con này...?  ')" data-toggle="tooltip" data-placement="bottom" title="Xóa trang con">
                                <i class="glyphicon glyphicon-remove"></i>
                            </a>
                        </td>
                        <td class="center">
                            <a href="admin/trangcon/sua/{{$sl->id}}" data-toggle="tooltip" data-placement="bottom" title="Sửa trang con">
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