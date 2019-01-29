@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm role hoặc sửa tên của group
                  <small style="margin-left: 20px;"> id: {{$group->id}}</small>
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

                <form action="admin/group/sua/{{$group->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                      <label>Tên group </label>
                      <input type="text" class="form-control" name="ten" placeholder="Nhập tên group user " value="{{$group->ten}}" />
                    </div>

                    <table class="table">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Tên quyền</th>
                          <th></th>
                        </tr> 
                      </thead>
                      <tbody>
                        @foreach($role as $ro)
                          <tr>
                            <td>{{$ro->id}}</td>
                            <td>{{$ro->ten}}</td>
                            <td><label><input type="checkbox" id="role{{$ro->id}}" name="role{{$ro->id}}" value="{{$ro->id}}"

                            @foreach($group->role()->get() as $key)
                              @if($ro->id == $key->id)
                                {{"checked"}}
                              @endif
                            @endforeach
                              
                            > Check</label></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                    <button type="submit" class="btn btn-primary" id="btn">Sửa</button>
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
          @foreach($role as $ro)
            $('#role{{$ro->id}}').change(function(){
              if ($(this).is(':checked')) 
              {
                var id_group = {{$group->id}};
                var id_role =  $(this).val();
                $.get("admin/ajax/setgrouprole/"+id_group+"/"+id_role, function(data){
                    //alert('insert check {{$ro->id}}');
                });
              } 
              else
              {
                var id_group = {{$group->id}};
                var id_role =  $(this).val();
                $.get("admin/ajax/deletegrouprole/"+id_group+"/"+id_role, function(data){
                    //alert('insert check {{$ro->id}}');
                });
              }
            });
          @endforeach
        });
    </script>

@endsection