@extends('admin.layout.index')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách sản phẩm
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
                      <a href="admin/sanpham/them">
                        <button class="btn btn-primary">
                            <i class="fa fa-plus fa-fw"></i>Thêm sản phẩm
                        </button>
                      </a>
                    </p>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Loại sản phẩm</th>
                        <th>Nhóm</th>
                        <th>Model</th>
                        <th>Công suất</th>
                        <!-- <th>Điện áp</th> -->
                        <!-- <th>Độ sáng</th> -->
                        <!-- <th>Màu sắc</th> -->
                        <!-- <th>Kích thước</th> -->
                        <!-- <th>Tóm tắt</th>
                        <th>Nội dung</th> -->
                        <th>Catalogues</th>
                        <th>Hình ảnh</th>
                        <th>Tình trạng</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sukien as $sk)
                    <tr class="odd gradeX" align="center">
                        <td>{{$sk->id}}</td>
                        <td>{{$sk->ten}}</td>
                        <td>{{$sk->loaisukien->ten}}</td>
                        @if($sk->id_nhomsanpham)
                            <td>{{$sk->nhomsanpham->ten}}</td>
                        @else
                            <td>Chưa có</td>
                        @endif
                        <td>{{$sk->model}}</td>
                        <td>{{$sk->congsuat}}</td>
                       <!--  <td>{{$sk->dienap}}</td> -->
                        <!-- <td>{{$sk->dosang}}</td> -->
                        <!-- <td>{{$sk->mausac}}</td> -->
                        <!-- <td>{{$sk->kichthuoc}}</td> -->
                        <td>{{$sk->catalogues}}</td>
                        <td>
                            <img width="50px" src="upload/sanpham/{{$sk->image}}">
                        </td>
                        


                        <td>
                            @if($sk->tinhtrang == 1)
                              {{"Còn"}}
                            @else
                              {{"Hết"}}
                            @endif
                        </td>
                        <td class="center">
                            <a style="color: #d43f3a;" href="admin/sanpham/xoa/{{$sk->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này...?  ')" data-toggle="tooltip" data-placement="bottom" title="Xóa sản phẩm">
                                <i class="glyphicon glyphicon-remove"></i>
                            </a>
                        </td>
                        <td class="center">
                            <a href="admin/sanpham/sua/{{$sk->id}}" data-toggle="tooltip" data-placement="bottom" title="Sửa sản phẩm">
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