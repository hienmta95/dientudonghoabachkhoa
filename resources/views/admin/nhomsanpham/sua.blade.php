@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa nhóm: 
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

                <form action="admin/nhomsanpham/sua/{{$type->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="form-group">
                        <label>Nhóm sản phẩm <span style="color: red">*</span></label>
                        <div class="fg-line">
                            <select class="form-control" name="loaisukien" title="Chọn loại sản phẩm">
                              @foreach($loaisukien as $loai)
                                <option

                                @if($type->id_loaisukien == $loai->id)
                                  {{"selected"}}
                                @endif

                                 value='{{$loai->id}}'>{{$loai->ten}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tên nhóm sản phẩm</label>
                        <input type="text" class="form-control" name="ten" value="{{$type->ten}}" />
                    </div>
                    
                    <div class="form-group">
                        <label>Mô tả</label>
                        <input type="text"  class="form-control" name="mota" value="{{$type->mota}}"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa nhóm sản phẩm</button>
                    <a style="color: #111;margin-left: 20px" href="admin/loaisanpham/xoa/{{$type->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa nhóm sản phẩm này...?  ')" data-toggle="tooltip" data-placement="bottom" title="Xóa nhóm sản phẩm">
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