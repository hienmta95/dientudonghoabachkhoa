@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm slide
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
                @if(session('loi'))
                    <div class="alert alert-danger">
                        {{session('loi')}}
                    </div>
                @endif

                <form action="admin/slide/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Hình ảnh *</label>
                        <input type="file"  class="form-control" name="image" placeholder="Nhập hình ảnh" />
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text"  class="form-control" name="tieude" placeholder="Nhập tiêu đề" />
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <input type="text"  class="form-control" name="noidung" placeholder="Nhập nội dung" />
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