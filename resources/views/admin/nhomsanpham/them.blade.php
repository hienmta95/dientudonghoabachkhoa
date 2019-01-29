@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm nhóm sản phẩm (thuộc loại sản phẩm)
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">

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

                <form action="admin/nhomsanpham/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Loại sản phẩm *</label>
                        <div class="fg-line">
                            <select class="form-control" name="loaisukien" title="Chọn loaị">
                              @foreach($loaisukien as $loai)
                                <option value='{{$loai->id}}'>{{$loai->ten}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tên nhóm sản phẩm</label>
                        <input type="text" class="form-control" name="ten" placeholder="Nhập tên loại sản phẩm" />
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
