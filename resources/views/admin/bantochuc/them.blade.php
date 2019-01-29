@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm ban tổ chức
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

                <form action="admin/bantochuc/them/{{$sukien->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên thành viên</label>
                        <input type="text" class="form-control" name="ten" placeholder="Nhập tên loại sự kiện" />
                    </div>
                    <div class="form-group">
                        <label>Tên sự kiện</label>
                        <input type="text" class="form-control" value="{{$sukien->ten}}" />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh *</label>
                        <input type="file"  class="form-control" name="image" placeholder="Nhập hình ảnh" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <input type="text"  class="form-control" name="mota" placeholder="Nhập mô tả" />
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection