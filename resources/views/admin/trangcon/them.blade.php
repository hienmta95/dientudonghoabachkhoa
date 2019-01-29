@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm trang con
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
                @if(session('loi'))
                    <div class="alert alert-danger">
                        {{session('loi')}}
                    </div>
                @endif

                <form action="admin/trangcon/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text"  class="form-control" name="tieude" placeholder="Nhập tiêu đề" />
                    </div>
                    <div class="form-group">
                        <label>Nội dung *</label>
                        <textarea id="demo" class="form-control" rows="3" name="noidung"></textarea>
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
                        <textarea id="demo" class="form-control" rows="2" name="mota"></textarea>
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
                        <label>Vị trí *</label>
                        <div class="fg-line">
                            <select id="loaisukien" class="form-control" name="vitri" title="Chọn vị trí xuất hiện của tiêu đề của trang con">
                                <option value='5'>- chọn  -</option>
                                <option value='1'> Menu </option>
                                <option value='2'> Giải pháp </option>
                                <option value='3'> Hỗ trợ </option>
                                <option value='4'> Giới thiệu </option>
                            </select>
                        </div>
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
