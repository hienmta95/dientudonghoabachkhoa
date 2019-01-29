@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm sản phẩm
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

                <form action="admin/sanpham/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên sản phẩm <span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="ten" placeholder="Nhập tên sản phẩm" />
                    </div>
                   

                    <div class="form-group">
                        <label>Loại sản phẩm <span style="color: red">*</span></label>
                        <div class="fg-line">
                            <select id="loaisukien" class="form-control" name="loaisukien" title="Chọn loại sản phẩm">
                                <option value=''>- chọn  -</option>
                              @foreach($loaisukien as $loai)
                                <option value='{{$loai->id}}'>{{$loai->ten}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label>Nhóm sản phẩm</label>
                        <div class="fg-line">
                            <select id="loaisukien" class="form-control" name="nhomsanpham" title="Chọn nhóm ">
                                <option value=''>- chọn  -</option>
                              @foreach($nhomsanpham as $nhom)
                                <option value='{{$nhom->id}}'>{{$nhom->ten}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh <span style="color: red">*</span></label>
                        <input type="file"  class="form-control" name="image" placeholder="Nhập hình ảnh" />
                    </div>

                    <div class="form-group">
                        <label>Model</label>
                        <input type="text"  class="form-control" name="model" placeholder="Nhập tên model sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Công suất</label>
                        <input type="text"  class="form-control" name="congsuat" placeholder="Nhập công suất" />
                    </div>
                    <div class="form-group">
                        <label>Độ sáng</label>
                        <input type="text"  class="form-control" name="dosang" placeholder="Nhập độ sáng" />
                    </div>
                    <div class="form-group">
                        <label>Màu sắc</label>
                        <input type="text"  class="form-control" name="mausac" placeholder="Nhập màu sắc" />
                    </div>
                    <div class="form-group">
                        <label>Kích thước</label>
                        <input type="text"  class="form-control" name="kichthuoc" placeholder="Nhập kích thước" />
                    </div>
                    <div class="form-group">
                        <label>Ứng dụng</label>
                        <input type="text"  class="form-control" name="ungdung" placeholder="Nhập ứng dụng của sp" />
                    </div>
                    <div class="form-group">
                        <label>Bảo hành</label>
                        <input type="text"  class="form-control" name="baohanh" placeholder="Nhập bảo hành" />
                    </div>
                    <div class="form-group">
                        <label>Xuất xứ</label>
                        <input type="text"  class="form-control" name="xuatxu" placeholder="Nhập xuatxu" />
                    </div>
                    
                    <div class="form-group">
                        <label>Catalogues</label>
                        <input type="file"  class="form-control" name="catalogues" placeholder="Nhập file catalogues" />
                    </div>


                    <div class="form-group">
                        <label>Tóm tắt</label>
                        <textarea id="demo" class="form-control" rows="2" name="tomtat"></textarea>
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
                        <label>Tình trạng</label>
                        <label class="radio-inline">
                            <input type="radio" name="tinhtrang" value="0" checked="">Hết
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="tinhtrang" value="1">Còn
                        </label>
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

<!-- @section('script')
    <script>
        $(document).ready(function(){
            $('#nhomsanpham').change(function(){
                var id_nhomsanpham =  $(this).val();
                $.get("admin/ajax/loaisukien/"+id_nhomsanpham, function(data){
                    $('#loaisukien').html(data);
                });
            });
        });
    </script>
@endsection -->