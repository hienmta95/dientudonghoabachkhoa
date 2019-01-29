@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa user: 
                    <small>{{$user->name}}</small>
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

                <form action="admin/user/sua/{{$user->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên user</label>
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên user" value="{{$user->name}}" />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh *</label>
                        <p>
                          <img width="200px" src="upload/user/{{$user->image}}"> 
                        </p>
                        <input type="file" class="form-control" name="image" value="{{$user->image}}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="Email"  class="form-control" name="email" placeholder="Nhập email" value="{{$user->email}}" />
                    </div>
                    <div class="form-group">
                        <label>Click để đổi mật khẩu</label>
                        <input type="checkbox" id="changePassword" name="changePassword" style="margin-left: 20px;">    
                        <input type="password" class="form-control pass"  disabled="" placeholder="Mật khẩu" name="password" value="">
                    </div>
                    <div class="form-group">
                        <label>Nhập lại password</label>
                        <input type="password" class="form-control pass"  disabled="" placeholder="Nhập lại mật khẩu" name="passwordAgain" value="">
                    </div>
                    <!-- <div class="form-group">
                        <label>Level</label>
                        <label class="radio-inline">
                          <input name="level" value="0"
                            @if($user->level == 0)
                              {{"checked"}}
                            @endif
                           type="radio" >Thường
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="level"
                            @if($user->level == 1)
                              {{"checked"}}
                            @endif
                           value="1">Admin
                        </label>
                    </div> -->

                    <button type="submit" class="btn btn-primary">Sửa user</button>
                    <a style="color: #111; margin-left: 20px" href="admin/user/xoa/{{$user->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa ...?  ')" data-toggle="tooltip" data-placement="bottom" title="Xóa user">
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

@section('script')
  <script>
    $(document).ready(function(){
      $("#changePassword").change(function(){
        if($(this).is(":checked"))
        {
          $(".pass").removeAttr('disabled');
        }
        else
        {
          $(".pass").attr('disabled','');
        }
      });
    });
  </script>
@endsection