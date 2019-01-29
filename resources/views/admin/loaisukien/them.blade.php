@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm loại sản phẩm
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

                <form action="admin/loaisanpham/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên loại sản phẩm</label>
                        <input type="text" class="form-control" name="ten" placeholder="Nhập tên loại sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh *</label>
                        <input type="file"  class="form-control" name="image" placeholder="Nhập hình ảnh" />
                    </div>
                    <!-- <div class="form-group">
                        <label>Thể loại *</label>
                        <div class="fg-line">
                            <select class="form-control" name="nhomsanpham" title="Chọn thể loại">
                              @foreach($nhomsanpham as $loai)
                                <option value='{{$loai->id}}'>{{$loai->ten}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label>Mô tả</label>
                        <input type="text"  class="form-control" name="mota" placeholder="Nhập mô tả" />
                    </div>
                    <div class="form-group">
                        <label>Nội dung <span style="color: red">*</span></label>
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
                    <button type="submit" class="btn btn-default">Thêm</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection