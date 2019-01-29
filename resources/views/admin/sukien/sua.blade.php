@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa sản phẩm - 
                    <small> {{$sukien->ten}}</small>
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

                <form action="admin/sanpham/sua/{{$sukien->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên sản phẩm <span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="ten" placeholder="Nhập tên sản phẩm" value="{{$sukien->ten}}" />
                    </div>
                    <div class="form-group">
                        <label>Loại sản phẩm <span style="color: red">*</span></label>
                        <div class="fg-line">
                            <select class="form-control" name="loaisukien" title="Chọn loại sản phẩm">
                              @foreach($loaisukien as $loai)
                                <option

                                @if($sukien->id_loaisukien == $loai->id)
                                  {{"selected"}}
                                @endif

                                 value='{{$loai->id}}'>{{$loai->ten}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nhóm sản phẩm</label>
                        <div class="fg-line">
                            <select class="form-control" name="nhomsanpham" title="Chọn nhóm">
                              @foreach($nhomsanpham as $nhom)
                                <option

                                @if($sukien->id_nhomsanpham == $nhom->id)
                                  {{"selected"}}
                                @endif

                                 value='{{$nhom->id}}'>{{$nhom->ten}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh <span style="color: red">*</span></label>
                        <p>
                          <img width="200px" src="upload/sanpham/{{$sukien->image}}"> 
                        </p>
                        <input type="file" class="form-control" name="image" value="{{$sukien->image}}">

                    </div>
                    <div class="form-group">
                        <label>Model</label>
                        <input type="text"  class="form-control" name="model" placeholder="Nhập tên model sản phẩm" value="{{$sukien->model}}" />
                    </div>
                    <div class="form-group">
                        <label>Công suất</label>
                        <input type="text"  class="form-control" name="congsuat" placeholder="Nhập công suất" value="{{$sukien->congsuat}}"/>
                    </div>
                    <div class="form-group">
                        <label>Điện áp</label>
                        <input type="text"  class="form-control" name="dienap" placeholder="Nhập điện áp" value="{{$sukien->dienap}}"/>
                    </div>
                    <div class="form-group">
                        <label>Màu sắc</label>
                        <input type="text"  class="form-control" name="mausac" placeholder="Nhập màu sắc" value="{{$sukien->mausac}}"/>
                    </div>
                    <div class="form-group">
                        <label>Kích thước</label>
                        <input type="text"  class="form-control" name="kichthuoc" placeholder="Nhập kích thước" value="{{$sukien->kichthuoc}}"/>
                    </div>
                    <div class="form-group">
                        <label>Ứng dụng</label>
                        <input type="text"  class="form-control" name="ungdung" placeholder="Nhập ứng dụng của sp" value="{{$sukien->ungdung}}"/>
                    </div>
                    <div class="form-group">
                        <label>Bảo hành</label>
                        <input type="text"  class="form-control" name="baohanh" placeholder="Nhập bảo hành" value="{{$sukien->baohanh}}"/>
                    </div>
                    <div class="form-group">
                        <label>Xuất xứ</label>
                        <input type="text"  class="form-control" name="xuatxu" placeholder="Nhập xuất xứ" value="{{$sukien->xuatxu}}"/>
                    </div>
                    <div class="form-group">
                        <label>Catalogues</label>
                        <p>{{$sukien->catalogues}}</p>
                        <input type="file" class="form-control" name="catalogues" value="{{$sukien->catalogues}}">
                    </div>
                    <div class="form-group">
                        <label>Tóm tắt</label>
                        <textarea id="demo" class="form-control" rows="2" name="tomtat">{{$sukien->tomtat}}</textarea>
                        <script type="text/javascript">
                          var editor = CKEDITOR.replace('tomtat',{
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
                        <label>Nội dung <span style="color: red">*</span></label>
                        <textarea id="demo" class="form-control" rows="3" name="noidung">{{$sukien->noidung}}</textarea>
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
                      <label>Tình trạng</label>
                      <label class="radio-inline">
                        <input name="tinhtrang" value="0"
                          @if($sukien->tinhtrang == 0)
                            {{"checked"}}
                          @endif
                         type="radio" >Hết
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="tinhtrang"
                          @if($sukien->tinhtrang == 1)
                            {{"checked"}}
                          @endif
                         value="1">Còn
                      </label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Sửa sản phẩm</button>
                    <a style="color: #111; margin-left: 20px" href="admin/sanpham/xoa/{{$sukien->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này...?  ')" data-toggle="tooltip" data-placement="bottom" title="Xóa sản phẩm">
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