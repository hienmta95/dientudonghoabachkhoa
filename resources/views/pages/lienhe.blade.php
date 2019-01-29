@extends('master')
@section('content')


<div class="productbreadcrumb" style="height: 50px; margin-bottom: 50px">
  <div class="container">
    <!-- <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12"></div> -->

    <ol class="breadcrumb col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display:block; border-bottom: 0px;     padding: 14px 5px;
    line-height: 20px;">
      <li>
        <a href="" style="font-size: 16px;">Trang chủ </a>
      </li>
      <li>
        <a href="lienhe" style="font-size: 16px;">/ Liên hệ - Tư vấn</a>
      </li>
    </ol>
  </div>
</div>


<div class="container">
	

<div class="f-contact-page">
  
  <!-- <div class="f-contact-page-info" style="margin-top: 50px;" id="tuvan">
    <h2 align="center">Tư vấn</h2>
  </div> -->

  <!-- <div class="f-contact-form row">
    <div class="col-md-6" style="padding: 70px 50px; text-align: center;">
      <h3 style="font-size: 35px;font-weight: 600; margin: 20px 0;">
        Bạn đang tìm kiếm giải pháp công nghệ?
      </h3>
      <p>Chúng tôi cung cấp các giải pháp tự động hóa PLC, kêt nối hệ thống Skada, tư vấn hệ thống điện, cơ điện cho nhà máy, xưởng sản xuất , tòa nhà.</p>
      <a href="lienhe/#lienhe"><button style="margin: 20px" class="btn btn-success">Liên hệ chúng tôi ngay</button></a>
    </div>
    <div class="col-md-6" style="padding: 10px">
      <img style="widows: 100%;" src="upload/tuvan.jpg">
    </div>
  </div> -->

  <div class="f-contact-page-info" style="margin-top: 50px;" id="lienhe">
    <h2 align="center">Liên hệ</h2>
  </div>

  <div class="f-contact-form row">

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
    @endif
    @if(session('loi'))
        <div class="alert alert-danger">
            {{session('loi')}}
        </div>
    @endif
    @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif

    <div class="col-md-6 no-padding">
      <p style="margin-top: 17px;padding: 20px;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d5268.615457882455!2d105.81694806094842!3d20.97363976474662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zIENUMTJBLCBLxJBUIEtpbSBWxINuLCBLaW0gTMWpLCBQLiDEkOG6oWkgS2ltLCBRLkhvw6BuZyBNYWksIEjDoCBO4buZaQ!5e0!3m2!1sen!2s!4v1517201247933" width="100%" height="590" frameborder="0" style="border:0" allowfullscreen></iframe>
      </p>
    </div>

    <div class="col-md-6 no-padding">
      <form class="form-horizontal no-padding" action="lienhe" id="form_contact" method="post" name="register">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <fieldset>
          <div class="form-group">
            <label class="col-md-12 control-label" for="txtName">Họ và tên <span style="color:red">*</span></label>

            <div class="col-md-12">
              <input id="txtName" name="hoten" type="text" placeholder="Nhập họ tên" class="form-control input-md" />
              
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-12 control-label" for="txtName">Số điện thoại<span style="color:red">*</span></label>

            <div class="col-md-12">
              <input id="txtName" name="sdt" type="number" placeholder="Nhập số điện thoại" class="form-control input-md" />
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-12 control-label" for="txtEmail">Email <span style="color:red">*</span></label>
            <div class="col-md-12">
              <input id="txtEmail" name="email" type="email" placeholder="Nhập email" class="form-control input-md" />
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-12 control-label" for="txtAddress">Địa chỉ</label>

            <div class="col-md-12">
              <input id="txtAddress" name="diachi" type="text" placeholder="Nhập địa chỉ..." class="form-control input-md" />
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-12 control-label" for="txtContent">Nội dung <span style="color:red">*</span></label>
            <div class="col-md-12">
              <textarea class="form-control" id="txtContent" placeholder="Nhập nội dung..."  name="noidung"></textarea>
            </div>
          </div>


          <div class="form-group">
            <div class="col-md-12">
              <button id="btnSent" type="submit" name="action" class="btn btn-primary" value="addContat">Gửi</button>
              <button type="reset" id="btnCancel" name="btnSent" class="btn btn-primary">Hủy</button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>

    
  </div>
</div>
</div>
@endsection