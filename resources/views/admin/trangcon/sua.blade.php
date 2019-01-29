@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa trang con
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

                <form action="admin/trangcon/sua/{{$trangcon->id}}" method="POST"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text"  class="form-control" name="tieude" value="{{$trangcon->tieude}}"/>
                    </div>
                    <div class="form-group">
                        <label>Nội dung *</label>
                        <textarea id="demo" class="form-control" rows="3" name="noidung">{{$trangcon->noidung}}</textarea>
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
                    <div class="form-group">
                        <label>Mô tả *</label>
                        <textarea id="demo" class="form-control" rows="3" name="mota">{{$trangcon->mota}}</textarea>
                        <script type="text/javascript">
                          var editor = CKEDITOR.replace('mota',{
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

                    <div class="form-group">
                        <label>Vị trí của tiêu đề của trang con *</label>
                        <div class="fg-line">
                            <select class="form-control" name="vitri" title="Chọn vị trí">
                                <option value='5'>- chọn  -</option>
                                <option value='1' @if($trangcon->vitri == 1){{"selected"}}@endif >Menu </option>
                                <option value='2' @if($trangcon->vitri == 2){{"selected"}}@endif > Giải pháp </option>
                                <option value='3' @if($trangcon->vitri == 3){{"selected"}}@endif > Hỗ trợ </option>
                                <option value='4' @if($trangcon->vitri == 4){{"selected"}}@endif > Giới thiệu </option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa trang con</button>
                    <a style="color: #111; margin-left: 20px;" href="admin/trangcon/xoa/{{$trangcon->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa trang con này...?  ')" data-toggle="tooltip" data-placement="bottom" title="Xóa trang con"> Xoá <i class="glyphicon glyphicon-remove"></i>
                    </a>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection