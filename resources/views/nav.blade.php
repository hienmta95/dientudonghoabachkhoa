<div class="top-line">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-6">
        <a href="#"><i class="fa fa-facebook-f"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-google"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
      </div>
      <div class="col-md-2 col-sm-3 col-xs-6" style="text-align: right;">
        <i class="fa fa-phone"></i>
        0246.292.3969 
      </div>
      <div class="col-md-3 col-sm-5 col-xs-12" style="text-align: right;">
        <i class="fa fa-envelope"></i>
        eabachkhoa@gmail.com
      </div>
      <div class="col-md-3 col-sm-12 col-xs-12" style="text-align: right;">
        <i class="fa fa-calendar"></i>
        Monday - Saturday 9:00 - 18:00
      </div>
    </div>
  </div>  
</div>



<header class="header">
  <div class="headerbottom1">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 stylelogo">
          <div id="logo">
            <div>
              <a href="" title="Logo title" rel="nofollow" class="logo"><img src="upload/logo.png" width="136" height="37" class="img-responsive" alt="Logo" /></a>
            </div>
          </div>


          <div class="menu">
            <div class="f-menutop">
              <div class="wrapmenutop">
                <ul class="f-menutop-ul home" style="padding-top: 25px;">
                  <li class="first-top-menu-de clickme adc0">
                    <a class="f-bg-base firstlink" title="" style="cursor: pointer;"><span>Sản phẩm</span></a>

                    <div class="top-menu-sub subdiv" style="display: none;">
                      <ul class="no-margin no-padding">
                        @foreach($menu as $loai)
                        <li class="li-js li-js-dev">
                          <a class="a-js-dev" href="loaisanpham/{{$loai->id}}/{{$loai->slug}}.html" title=""><span>{{$loai->ten}}</span></a>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </li>

                  <li class="first-top-menu-de clickme adc0">
                    <a class="f-bg-base firstlink" title="" href="lienhe/#lienhe"><span>Liên hệ</span></a>
                  </li>
                  <!-- <li class="first-top-menu-de clickme adc0">
                    <a class="f-bg-base firstlink" title="" href="#tuvan"><span>Tư vấn thiết kế</span></a>
                  </li> -->

                  @foreach($trangcon as $trang)
                    @if($trang->vitri == "1")
                      <li class="first-top-menu-de clickme adc0">
                        <a class="f-bg-base firstlink" title="{{$trang->tieude}}" href="{{$trang->slug}}_{{$trang->id}}.html/#bottom"><span>{{$trang->tieude}}</span></a>
                      </li>
                    @endif
                  @endforeach
            

                </ul>
            <script type="text/javascript">
                $('.li-js').hover(function(){ var height1 = $(this).find('.sub-d-menu-d').height(); var height2 = $(this).parents().height(); console.log(height1); $('.sub-d-menu-d').removeClass('show-menu-c'); $(this).find('.sub-d-menu-d').addClass('show-menu-c'); if (height1 > height2) { $(this).parents('.top-menu-sub').css('height',height1); }; });
  
                </script> <script type="text/javascript">

                $('.li-js').hover(function(){ $('.li-js').css("background-color", "#f2f2f2"); $(this).css("background-color", "#e5e5e5"); });
       
                </script><style type="text/css">

                .show-menu-c{ display: block !important; } .active-this-d{ background: #f2f2f2; }
     
                </style><script type="text/javascript">
              </script> <script type="text/javascript">

                </script><style type="text/css">

                .active-this-d .top-menu-sub{ display: block !important; }
      
                </style>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 seach-d">
          <!-- <div class="cart miniv2-toolbar-name">
            <div class="wp-top-cat">
              <ul>
                @if(!(Auth::check()))
                  <li class="">
                    <a href="dangki" rel="nofollow">Đăng ký</a>
                  </li>

                  <li class="">
                    <a href="dangnhap" rel="nofollow">Đăng nhập</a>
                  </li>
                @else
                  <li class="">
                    <a href="dangnhap" rel="nofollow">{{Auth::user()->name}}</a>
                  </li>
                  <li class="">
                    <a href="nguoidung" rel="nofollow">Setting</a>
                  </li>
                  <li class="">
                    <a href="dangxuat" rel="nofollow">Đăng xuất</a>
                  </li>
                @endif
              </ul>
            </div>
          </div> -->

          

          <div id="search-box" style="right: 240px">
            <span class="nutremove">X</span>

            <div class="input-group-btn icon-search">
              <a href="javascript:void(0);" class="search-button"></a>
            </div>

            <div class="search search-area">
              <div class="input-group search-border control-group">
                <div class="input-group-btn search-basic">
                  
                </div>
                <form action="timkiem" method="post" style="display: flex;">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                  <input type="text" class="form-control search-field" name="tukhoa" placeholder="Nhập nội dung tìm kiếm..." name="BNC_txt_search" id="BNC_txt_search" value="" />
                  <button class="btn btn-secondary" type="submit" style="display: none;">abc</button>
                </form>
              </div>
            </div>
          </div>

          <div style="position: absolute;    top: 28px;   right: 15px;">
          	<a href="tel:0938850688"><span style="font-size: 21px;color: red; font-weight: 700;">Hotline: 093 885 0688</span></a>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="headerbottom1 mobile-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 stylelogo">
          <div id="logo">
            <div>
              <a href="" title="Logo title" rel="nofollow" class="logo"><img src="upload/logo.png" width="136" height="37" class="img-responsive" alt="Logo" /></a>
            </div>
          </div>

          <div class=" seach-d">
            <!-- <div class="cart miniv2-toolbar-name">
              <div class="wp-top-cat">
                <ul>
                  @if(!(Auth::check()))
                    <li class="regis">
                      <a href="dangki" rel="nofollow">Đăng ký</a>
                    </li>

                    <li class="login">
                      <a href="dangnhap" rel="nofollow">Đăng nhập</a>
                    </li>
                  @else
                    <li class="login">
                      <a href="dangnhap" rel="nofollow">{{Auth::user()->name}}</a>
                    </li>
                    <li class="login">
                      <a href="nguoidung" rel="nofollow">Setting</a>
                    </li>
                    <li class="login">
                      <a href="dangxuat" rel="nofollow">Đăng xuất</a>
                    </li>
                  @endif
                </ul>
              </div>
            </div> -->

            <div id="click-show-search"><img src="statics/imgs/icon-123.png" /></div>

            <div id="search-box" style="display: none;">
              <span class="nutremove">X</span>

              <div class="input-group-btn icon-search">
                <a href="javascript:void(0);" class="search-button"></a>
              </div>

              <div class="search search-area">
                <div class="input-group search-border control-group">
                  <div class="input-group-btn search-basic">
                    
                  </div>
                  <form action="timkiem" method="post" style="display: flex;">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <input type="text" class="form-control search-field" name="tukhoa" placeholder="Nhập nội dung tìm kiếm..." name="BNC_txt_search" id="BNC_txt_search" value="" />
                    <button class="btn btn-secondary" type="submit" style="display: none;">abc</button>
                  </form>
                </div>
              </div>
            </div><a id="click-d"><img src="statics/imgs/nav-icon.png" width="24px" /></a>
            <script type="text/javascript">

            $('#click-d').click(function(){ $('.menu-show-mobile').slideToggle(); $('#click-d').toggleClass('background-menu-click') });

            </script>
          </div><style type="text/css">

          .background-menu-click{ background: #f2f2f2; }

          </style>

          <div class="menu menu-show-pc">
            <div class="f-menutop">
              <div class="wrapmenutop">
                <ul class="f-menutop-ul home">
                  <li class="first-top-menu-de clickme adc0">
                    <a class="f-bg-base firstlink" title="" style="cursor: pointer;"><span>Sản phẩm</span></a>

                    <div class="top-menu-sub subdiv" style="display: none;">
                      <ul class="no-margin no-padding">
                        @foreach($menu as $loai)
                        <li class="li-js li-js-dev">
                          <a class="a-js-dev" href="loaisanpham/{{$loai->id}}/{{$loai->slug}}.html/#bottom" title=""><span>{{$loai->ten}}</span></a>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </li>


                  <li class="first-top-menu-de clickme adc0">
                    <a class="f-bg-base firstlink" title="" href="lienhe/#lienhe"><span>Liên hệ</span></a>
                  </li>
                  <!-- <li class="first-top-menu-de clickme adc0">
                    <a class="f-bg-base firstlink" title="" href="#tuvan"><span>Tư vấn thiết kế</span></a>
                  </li> -->


                  @foreach($trangcon as $trang)
                    @if($trang->vitri == "1")
                      <li class="first-top-menu-de clickme adc0">
                        <a class="f-bg-base firstlink" title="{{$trang->tieude}}" href="{{$trang->slug}}_{{$trang->id}}.html"><span>{{$trang->tieude}}</span></a>
                      </li>
                    @endif
                  @endforeach

                </ul>
      <script type="text/javascript">

                $('.li-js').hover(function(){ var height1 = $(this).find('.sub-d-menu-d').height(); var height2 = $(this).parents().height(); console.log(height1); $('.sub-d-menu-d').removeClass('show-menu-c'); $(this).find('.sub-d-menu-d').addClass('show-menu-c'); if (height1 > height2) { $(this).parents('.top-menu-sub').css('height',height1); }; });
                </script> <script type="text/javascript">
                $('.li-js').hover(function(){ $('.li-js').css("background-color", "#f2f2f2"); $(this).css("background-color", "#e5e5e5"); });
                </script><style type="text/css">
                .show-menu-c{ display: block !important; } .active-this-d{ background: #f2f2f2; }
                </style><script type="text/javascript">
</script> <script type="text/javascript">
                </script><style type="text/css">
                .active-this-d .top-menu-sub{ display: block !important; }
                </style>
              </div>
            </div>
          </div>

          <div class="menu menu-show-mobile">
            

            <div class="f-menutop">
              <div class="wrapmenutop">
                <ul class="f-menutop-ul home">
                  <li class="li-one">
                    <a class="f-bg-base firstlink click-show-sub" title="" style="cursor: pointer;"><span>Sản phẩm</span></a>

                    <div class="top-menu-sub top-menu-sub-one" style="display: none;">
                      <ul class="no-margin no-padding">
                        @foreach($menu as $loai)
                        <li class="li-js li-js-dev">
                          <a class="a-js-dev" href="loaisanpham/{{$loai->id}}/{{$loai->slug}}.html/#bottom" title=""><span>{{$loai->ten}}</span></a>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </li>


                  <li class="first-top-menu-de clickme adc0">
                    <a class="f-bg-base firstlink" title="" href="lienhe/#lienhe"><span>Liên hệ</span></a>
                  </li>
                  <!-- <li class="first-top-menu-de clickme adc0">
                    <a class="f-bg-base firstlink" title="" href="#tuvan"><span>Tư vấn thiết kế</span></a>
                  </li> -->

                  
                  @foreach($trangcon as $trang)
                    @if($trang->vitri == "1")
                      <li class="first-top-menu-de clickme adc0">
                        <a class="f-bg-base firstlink" title="{{$trang->tieude}}" href="{{$trang->slug}}_{{$trang->id}}.html"><span>{{$trang->tieude}}</span></a>
                      </li>
                    @endif
                  @endforeach
                  
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="show-menu-now" style="display: none;">
          <div class="search">
            <div class="input-group search-border">
              <div class="input-group-btn search-basic">
                
              </div>
                <form action="timkiem" method="post" style="display: flex;">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                  <input type="text" class="form-control search-field" name="tukhoa" placeholder="Nhập nội dung tìm kiếm..." name="BNC_txt_search" id="BNC_txt_search" value="" />
                  <button class="btn btn-secondary" type="submit" style="display: none;">abc</button>
                </form>

              <div class="input-group-btn">
                <a href="javascript:void(0);" class="btn btn-default" id="BNC_btn_search" style="margin-left: 12px"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><script type="text/javascript">
  $('#click-show-search').click(function(){ $('.show-menu-now').slideToggle(); $('#click-show-search').toggleClass('class-background-f2'); })
  </script><style type="text/css">
  .class-background-f2{ background: #f2f2f2; }
  </style>
</header>

<div class="container bg-color-2"></div>



<script type="text/javascript">
$(window).bind('scroll', function() { if ($(window).scrollTop() > 55) { $('.headerbottom1').addClass('fixed1'); } else { $('.headerbottom1').removeClass('fixed1'); } });
</script> <script type="text/javascript">
$(document).ready(function(){ $('.f-menutop-name').click(function(){ $(".f-menutop > .f-menutop-ul").toggleClass('pushleft'); $(".wrapper1").toggleClass('pushleft1'); }); }); $(".icon-search").click(function(){ $(".control-group").show(); $(".nutremove").show(); }); $(".nutremove").click(function(){ $(this).hide(); $(".control-group").hide(); }); $(function(){ $('html').click(function() { $('.first-top-menu-de').removeClass('active-this-d'); }); var cl=false; var act=0; $('.first-top-menu-de').click(function(event){ event.stopPropagation(); var ind=$(this).index(); if(ind==act){ $(this).toggleClass('active-this-d'); }else{ $('.first-top-menu-de').removeClass('active-this-d'); $(this).toggleClass('active-this-d'); } act=ind; }); })
</script> <script type="text/javascript">
var flag = false; $('.click-show-sub').click(function(){ if(flag==false){ $('.top-menu-sub-one').hide(); $(this).parent().find('.top-menu-sub-one').slideToggle(); flag = true; }else{ $('.top-menu-sub-one').hide(); $(this).parent().find('.top-menu-sub-one').hide(); flag = false; } }); $('.a-js-dev').click(function(){ $('.sub-two-d').hide(); $(this).parent().find('.sub-two-d').slideToggle(); })
</script>




 @include('slide')