@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa thành viên ban tổ chức: 
                    <small>{{$bantochuc->ten}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

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

                <form action="admin/bantochuc/sua/{{$bantochuc->id}}/{{$sukien->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên thành viên</label>
                        <input type="text" class="form-control" name="ten" placeholder="Nhập tên loại sự kiện" value="{{$bantochuc->ten}}" />
                    </div>
                    <div class="form-group">
                        <label>Tên sự kiện</label>
                        <input type="text" class="form-control" value="{{$sukien->ten}}" />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh *</label>
                        <p>
                          <img width="200px" src="upload/bantochuc/{{$bantochuc->image}}"> 
                        </p>
                        <input type="file" class="form-control" name="image" value="{{$bantochuc->image}}">
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <input type="text" class="form-control" name="mota" placeholder="Nhập mô tả" value="{{$bantochuc->mota}}" />
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa thành viên ban tổ chức</button>
                    <a style="color: #111;margin-left: 20px" href="admin/bantochuc/xoa/{{$bantochuc->id}}/{{$sukien->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ...?  ')" data-toggle="tooltip" data-placement="bottom" title="Xóa thành viên">
                              Xóa  <i class="glyphicon glyphicon-remove"></i>
                            </a>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection