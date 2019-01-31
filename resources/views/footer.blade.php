<!-- bottom -->
<div class="main1">
  <div class="adv-bottom row">




  <div style="margin-top: 50px">
    <div class="container">
      <div class="col-md-12">
        <section class="customer-logos slider">
          <div class="slide"><img src="logos/images/logo1.png"></div>
          <div class="slide"><img src="logos/images/logo2.png"></div>
          <div class="slide"><img src="logos/images/logo3.png"></div>
          <div class="slide"><img src="logos/images/logo4.png"></div>
          <div class="slide"><img src="logos/images/logo5.png"></div>
          <div class="slide"><img src="logos/images/logo6.jpg"></div>
          <div class="slide"><img src="logos/images/logo7.png"></div>
          <div class="slide"><img src="logos/images/logo8.png"></div>
          <div class="slide"><img src="logos/images/logo9.png"></div>
          <div class="slide"><img src="logos/images/logo10.png"></div>
          <div class="slide"><img src="logos/images/logo11.png"></div>
          
        </section>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
          pauseOnHover: false,
          responsive: [{
          breakpoint: 768,
          settings: {
            slidesToShow: 4
          }
        }, {
          breakpoint: 520,
          settings: {
            slidesToShow: 3
          }
        }]
      });
    });
  </script>

    <script type="text/javascript">
        jQuery(function($) {
            $('body').append('<a style="display:none;" class="callus" href="tel:0938850688">093 88 506 88</a>');
            var lastScrollTop = 0;
            $(window).scroll(function(event){
                var st = $(this).scrollTop();
                if (st > lastScrollTop){
                    // downscroll code
                    $('a.callus').removeClass('display');
                } else {
                    $('a.callus').addClass('display');
                }
                lastScrollTop = st;
            });
        });
    </script>

    <style type="text/css" media="screen and (max-width:767px)">
      a.callus {
        display: block !important;
        position: fixed;
        z-index: 9999;
        bottom: 20px;
        left: 20px;
        background: #0089d0 url(http://statics.vietmoz.info/img/ico/glyphicons/earphone-white.png) no-repeat;
        background-position: 10px center;
        background-size: 20px;
        border-radius: 1000px;
        padding: 5px 10px 5px 40px;
        font-weight: 700;
        font-size: 18px;
        line-height: 30px;
        color: #fff;
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -ms-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
        -moz-transform: scale(0);
        -webkit-transform: scale(0);
        -o-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
      }
      a.display.callus {
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -ms-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
        -moz-transform: scale(1);
        -webkit-transform: scale(1);
        -o-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
      }
    </style>


<!-- 
    <div class="col-md-12 pc-adv-bottom">
      <a class="adv-left" href="#" title="QC"><img src="upload/sanpham/baner.jpg" width='100%' alt= "QC" /></a>
    </div>

    <div class="col-md-12 mobile-adv-bottom">
      <a class="adv-left" href="#" title=""><img src="upload/sanpham/baner.jpg" width='100%' alt=  "" /></a>
    </div> -->


    <div class="boxsocial">
      <div class="container">
        <ul class="">
          <li>
            <a href="#"><img src="statics/imgs/social/youtube.png" /></a>
          </li>

          <li>
            <a href="#"><img src="statics/imgs/social/fb.png" /></a>
          </li>

          <li>
            <a href="#"><img src="statics/imgs/social/tw.png" /></a>
          </li>

          <li>
            <a href="#"><img src="statics/imgs/social/g.png" /></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>


<!-- footer -->
<div class="f-footer" id="Footer">
  <div class="f-footer-content">
    <div class="main-footer container">
      <div class="content-footer">
        <ul class="f-footer-nav row">
          <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 class-124506">
            <a href="trang-product.html">Sản phẩm</a>

            <ul>
              @foreach($menu as $loai)
                <li>
                  <a class="f-bg-base" href="loaisanpham/{{$loai->id}}/{{$loai->slug}}.html/#bottom" title="{{$loai->ten}}">{{$loai->ten}}</a>
                </li>
              @endforeach
            </ul>
          </li>

          <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 class-124507">
            <a href="">Giải pháp</a>

            <ul>
              @foreach($trangcon as $trang)
                @if($trang->vitri == "2")
                  <li>
                    <a class="f-bg-base" href="{{$trang->slug}}_{{$trang->id}}.html/#bottom" title="{{$trang->tieude}}">{{$trang->tieude}}</a>
                  </li>
                @endif
              @endforeach
            </ul>
          </li>

          <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 class-124508">
            <a href="">Hỗ trợ</a>

            <ul>
              @foreach($trangcon as $trang)
                @if($trang->vitri == "3")
                  <li>
                    <a class="f-bg-base" href="{{$trang->slug}}_{{$trang->id}}.html/#bottom" title="{{$trang->tieude}}">{{$trang->tieude}}</a>
                  </li>
                @endif
              @endforeach
            </ul>
          </li>

          <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 class-124509">
            <a href="">Giới thiệu</a>

            <ul>
              @foreach($trangcon as $trang)
                @if($trang->vitri == "4")
                  <li>
                    <a class="f-bg-base" href="{{$trang->slug}}_{{$trang->id}}.html/#bottom" title="{{$trang->tieude}}">{{$trang->tieude}}</a>
                  </li>
                @endif
              @endforeach
            </ul>
          </li>
        </ul>
      </div>

      <div class="logo-bottom col-md-3 col-sm-3">
        <div id="logo">
          <div>
            <a href="" title="Logo title" rel="nofollow" class="logo"><img src="upload/logo.png" width="136" height="37" class="img-responsive" alt="Logo" /></a>
          </div>
        </div>
      </div>

      <div class="block_footer col-md-9 col-sm-9" style="height: 220px">
        <div class="">
          <div class="f-footer-info">
            <p>
              <a href="#" /></a>
            </p>

            <p style="text-align:right">
              <span style="color:rgb(105, 105, 105); font-size:13px">CÔNG TY CP XÂY DỰNG & KỸ THUẬT ĐIỆN - TỰ ĐỘNG HÓA BÁCH KHOA
              </span>
            </p>
            <p style="text-align:right">
              <span style="color:rgb(105, 105, 105); font-size:13px">Địa chỉ: P832 CT12A, KĐT Kim Văn, Kim Lũ, P. Đại Kim, Q.Hoàng Mai, Hà Nội.
              </span>
            </p>
            <p style="text-align:right">
              <span style="color:rgb(105, 105, 105); font-size:13px">E-mail: eabachkhoa@gmail.com
              </span>
            </p>
            <p style="text-align:right">
              <span style="color:rgb(105, 105, 105); font-size:13px">MST: <b>0108141359</b>
              </span>
            </p>
           
            <p style="text-align:right">
              <span style="color:rgb(105, 105, 105); font-size:13px">SĐT:  - Mr Hưng – <b>0167 453 8883</b></span>
            </p>
            <p style="text-align:right">
              <span style="color:rgb(105, 105, 105); font-size:13px">-  Mr Thành – <b>0976 683 693</b></span>
            </p>
            <p style="text-align:right">
              <span style="color:rgb(105, 105, 105); font-size:13px">- Mr Trung – <b>093 88 506 88</b></span>
            </p>
            <p style="text-align:right">
              <span style="color:rgb(105, 105, 105); font-size:13px">- SĐT bàn – <b>0246 292 3969</b></span>
            </p>

            
          </div>
        </div>
      </div>

      <div class="copyright-d">
        <a class="link-copyright">Copyright 2018 Bach Khoa A&E Constech JSC</a>

        <div class="option-right-bt">
          <ul class="list-option-right">
            <li class="item-list-right">
              <a href="lienhe">Liên hệ với chúng tôi</a>
            </li>

            <li class="item-list-right">
              <a href="lienhe" title="Điều khoản về quyền riếng tư">Điều
              khoản về quyền riếng tư</a>
            </li>

            <li class="item-list-right">
              <a href="lienhe" title="Điều khoản sử dụng">Điều khoản sử dụng</a>
            </li>

            <li class="item-list-right">
              <a href="lienhe" title="Nhãn hiệu">Nhãn hiệu</a>
            </li>
          </ul>
        </div>

        <!-- end footer -->

      </div>
    </div>

  </div>
</div>
