@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi tiết liên hệ của khách hàng: 
                    <small>{{$type->hoten}}</small>
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

                <form action="admin/lienhe/sua/{{$type->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input type="text" class="form-control" name="hoten" value="{{$type->hoten}}" />
                    </div>
                    <div class="form-group">
                        <label>SĐT</label>
                        <input type="number" class="form-control" name="sdt" value="{{$type->sdt}}" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{$type->email}}" />
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control" name="diachi" value="{{$type->diachi}}" />
                    </div>
                    <div class="form-group">
                        <label>Nội dung *</label>
                        <textarea id="demo" class="form-control" rows="3" name="noidung">{{$type->noidung}}</textarea>
                    </div>
                    
                   
                    <div class="form-group">
                        <label>Status</label>
                        <label class="radio-inline">
                          <input name="status" value="0"
                            @if($type->noibat == 0)
                              {{"checked"}}
                            @endif
                           type="radio" >Not yet
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="status"
                            @if($type->noibat == 1)
                              {{"checked"}}
                            @endif
                           value="1">Done
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary">Save liên hệ</button>
                    <a style="color: #111;margin-left: 20px" href="admin/lienhe/xoa/{{$type->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa dữ liệu này...?  ')" data-toggle="tooltip" data-placement="bottom" title="Xóa">
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