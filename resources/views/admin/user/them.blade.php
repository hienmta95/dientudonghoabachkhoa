@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm user
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
                @if(session('loi'))
                    <div class="alert alert-danger">
                      {{session('loi')}}
                    </div>
                  @endif

                <form action="admin/user/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên user</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên user" />
                    </div>
                    <div class="form-group">
                        <label>Group user</label>
                        <div class="fg-line">
                            <select class="form-control" name="group" title="Chọn group user">
                                <option value=''>- chọn  -</option>
                                <option value='4'> Admin </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh </label>
                        <input type="file"  class="form-control" name="image" placeholder="Nhập hình ảnh" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="Email"  class="form-control" name="email" placeholder="Nhập email" />
                    </div>
                    <div class="form-group">
                        <label>Nhập password</label>
                        <input type="password"  class="form-control" name="password" placeholder="Nhập password" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại password</label>
                        <input type="password"  class="form-control" name="passwordAgain" placeholder="Nhập lại password" />
                    </div>
                    <!-- <div class="form-group">
                        <label>Level</label>
                        <label class="radio-inline">
                            <input type="radio" name="level" value="0" checked="">Thường
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="level" value="1">Admin
                        </label>
                    </div> -->
                    <button type="submit" class="btn btn-default">Thêm</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection