@extends('master')
@section('content')




<div class="main1">
  <div class="container">
    <div class="wp-option-bottom row">


        <div class="container">
          <div class="row">
            <div class="f-contact-form" id="tuvan">
              <div class="">
                <div class="col-md-8 col-md-offset-2" style="padding: 10px 30px 30px 30px; text-align: center;">
                  <h3 style="font-size: 35px;font-weight: 600; margin: 20px 0;">
                    Bạn đang tìm kiếm giải pháp công nghệ?
                  </h3>
                  <p>Chúng tôi cung cấp các giải pháp tự động hóa PLC, kêt nối hệ thống Skada, tư vấn hệ thống điện, cơ điện cho nhà máy, xưởng sản xuất , tòa nhà.</p>
                  <a href="/tu-van-thiet-ke_29.html/#bottom"><button style="margin: 20px" class="btn btn-success">Liên hệ chúng tôi ngay</button></a>
                </div>
              </div>
            </div>

            <div class="f-contact-form">
              <div class="">
                <div class="col-md-6">
                  <a href="/tu-van-thiet-ke_29.html/#bottom">
                    <img style="width: 100%; margin-bottom: 10px" src="upload/tuvan.jpg">
                  </a>
                </div>
                <div class="col-md-6">
                  <iframe width="100%" height="358" src="https://www.youtube.com/embed/9HfzcqeS2SU?loop=1&cc_load_policy=1rel=0&amp;showinfo=0&playlist=9HfzcqeS2SU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>




	<h2 style="text-align: center; color: #5e5f5f; margin-top: 80px">Lĩnh vực kinh doanh</h2>

      @foreach($data as $dt)

        <div class="col-md-4 col-sm-6 col-xs-6 full-xs item-option-bottom">
          <a href="loaisanpham/{{$dt->id}}/{{$dt->slug}}.html/#bottom" title="{{$dt->ten}}">
          <div class="bottom-dm">
            <div class="wp-img-dm-bt">
              <div class="ImageOverlayBe"><img src="upload/loaisanpham/{{$dt->image}}" class="img-responsive" alt="{{$dt->ten}}" /></div>
            </div>

            <div class="bottom-dm-title">
              <h4 class="title">{{$dt->ten}}</h4>

              <div class="info">
                <p>{{$dt->mota}}</p>
              </div>
            </div>
          </div></a>
        </div>

      @endforeach
      
    </div>
  </div>
</div>

@endsection