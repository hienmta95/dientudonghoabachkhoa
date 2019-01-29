@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa loại sản phẩm: 
                    <small>{{$type->name}}</small>
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

                <form action="admin/loaisanpham/sua/{{$type->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên loại sản phẩm</label>
                        <input type="text" class="form-control" name="ten" value="{{$type->ten}}" />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh *</label>
                        <p>
                          <img width="200px" src="upload/loaisanpham/{{$type->image}}"> 
                        </p>
                        <input type="file" class="form-control" name="image" value="{{$type->image}}">

                    </div>
                    
                    <div class="form-group">
                        <label>Mô tả</label>
                        <input type="text"  class="form-control" name="mota" value="{{$type->mota}}"/>
                    </div>
                    <div class="form-group">
                        <label>Nội dung <span style="color: red">*</span></label>
                        <textarea id="demo" class="form-control" rows="3" name="noidung">{{$type->noidung}}</textarea>
                        <script type="text/javascript">
                          var editor = CKEDITOR.replace('noidung',{
                           language:'vi',
                           filebrowserBrowseUrl :'/admin_asset/ckfinder/ckfinder.html',
                           filebrowserImageBrowseUrl : '/admin_asset/ckfinder/ckfinder.html?type=Images',
                           filebrowserFlashBrowseUrl : '/admin_asset/ckfinder/ckfinder.html?type=Flash',
                           filebrowserUploadUrl : '/admin_asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                           filebrowserImageUploadUrl : '/admin_asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                           filebrowserFlashUploadUrl : '/admin_asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                           });
                          </script>﻿
                    </div>

                    <button type="submit" class="btn btn-primary">Sửa loại sản phẩm</button>
                    <a style="color: #111;margin-left: 20px" href="admin/loaisanpham/xoa/{{$type->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa loại sản phẩm này...?  ')" data-toggle="tooltip" data-placement="bottom" title="Xóa loại sản phẩm">
                                Xóa <i class="glyphicon glyphicon-remove"></i>
                            </a>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection