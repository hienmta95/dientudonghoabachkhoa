@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa slide
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

                <form action="admin/slide/sua/{{$slide->id}}" method="POST"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Hình ảnh *</label>
                        <p>
                          <img width="200px" src="upload/slide/{{$slide->image}}"> 
                        </p>
                        <input type="file" class="form-control" name="image" value="{{$slide->image}}">
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text"  class="form-control" name="tieude" value="{{$slide->tieude}}"/>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <input type="text"  class="form-control" name="noidung" value="{{$slide->noidung}}"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa slide</button>
                    <a style="color: #111; margin-left: 20px;" href="admin/slide/xoa/{{$slide->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa slide này...?  ')" data-toggle="tooltip" data-placement="bottom" title="Xóa slide">
                               Xoá <i class="glyphicon glyphicon-remove"></i>
                            </a>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection