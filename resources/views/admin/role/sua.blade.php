@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa loại sự kiện: 
                    <small>{{$type->name}}</small>
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

                <form action="admin/loaisukien/sua/{{$type->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên loại sự kiện</label>
                        <input type="text" class="form-control" name="ten" value="{{$type->ten}}" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <input type="text"  class="form-control" name="mota" value="{{$type->mota}}"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa loại sự kiện</button>
                    <a style="color: #111;margin-left: 20px" href="admin/loaisukien/xoa/{{$type->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa loại sự kiện này...?  ')" data-toggle="tooltip" data-placement="bottom" title="Xóa loại sự kiện">
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