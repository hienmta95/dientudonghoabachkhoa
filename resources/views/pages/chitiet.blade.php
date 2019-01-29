@extends('master')
@section('content')


<div id="bottom" class="productbreadcrumb" style="height: 50px; margin-bottom: 50px">
  <div class="container">
    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12"></div>

    <ol class="breadcrumb col-lg-9 col-md-9 col-sm-12 col-xs-12" style="display:block; border-bottom: 0px;     padding: 14px 5px;
    line-height: 20px;">
      <li>
        <a href="" style="font-size: 16px;">Trang chủ</a>
      </li>
      <li>
        <a href="loaisanpham/{{$loaisukien->id}}/{{$loaisukien->slug}}.html/#bottom" style="font-size: 16px;"> / {{$loaisukien->ten}}</a>
      </li>
      <li>
        <a href="sanpham/{{$sukien->id}}/{{$sukien->slug}}.html/#bottom" style="font-size: 16px;"> / {{$sukien->ten}}</a>
      </li>
    </ol>
  </div>
</div>


<div class="main1">
  <div class="container">
    <div class="row">

@include('menuloaisukien', ['loai_id' => "0", 'nhom_id' => "0"])

<div class="center-main col-lg-9 col-md-9 col-sm-9 col-xs-12">
    <div class="f-module-page-body">
      <div class="f-product-view">
        <style type="text/css">
          #carousel-example-generic{display: none;}
          #carousel-example-generic-mobile{display: none;}
        </style>
        <style type="text/css">
          .danhmuc-top { position: relative;}
        </style>

        <div class="f-product-view-info">
          <div class="col-md-12 name-product-view">
            <h1 class="name-pro-info"><span>{{$sukien->ten}}</span></h1>
          </div>

          <div class="f-product-view-info-image col-md-4 col-sm-4">
            <style>
              #f-pr-image-zoom-gallery .active img{opacity: 1 !important;}
            </style>

            <img src="upload/sanpham/{{$sukien->image}}" alt="{{$sukien->ten}}" class="img-responsive" />

           
          </div>

          <div class="f-product-view-info-detail col-md-8 col-sm-8">
            <div class="code-product-info">
              @if($sukien->model)
                Model: <span class="code">{{$sukien->model}}</span>
              @else
                <h1 class="name-pro-info"><span>Sản phẩm chất lượng cao</span></h1>
              @endif
            </div>

            <div class="">
              <p>Tình trạng: 
                @if($sukien->tinhtrang)
                  <span style="color: #f48c3f;">Còn hàng</span>
                @else
                  <span style="color: #ccc;">Hết hàng</span>
                @endif
              </p>
              <p>Liên hệ để được giá tốt nhất: <span style="color: #f48c3f;">0462.292.3969</span> (7h30 - 22h)</p>

              <h5 style="border-top: 1px solid #eee; padding: 25px 10px 5px 0px;font-size: 16px;">Thông số kĩ thuật:</h5>
              <table class="table table-striped thongso">
                <tbody>
                  @if($sukien->congsuat)
                    <tr>
                      <td>Công suất</td>
                      <td>{{$sukien->congsuat}}</td>
                    </tr>
                  @endif
                  @if($sukien->dienap)
                    <tr>
                      <td>Điện áp</td>
                      <td>{{$sukien->dienap}}</td>
                    </tr>
                  @endif
                  @if($sukien->mausac)
                    <tr>
                      <td>Màu sắc</td>
                      <td>{{$sukien->mausac}}</td>
                    </tr>
                  @endif
                  @if($sukien->kichthuoc)
                    <tr>
                      <td>Kích thước</td>
                      <td>{{$sukien->kichthuoc}}</td>
                    </tr>
                  @endif
                  @if($sukien->dosang)
                    <tr>
                      <td>Độ sáng</td>
                      <td>{{$sukien->dosang}}</td>
                    </tr>
                  @endif
                  @if($sukien->xuatxu)
                    <tr>
                      <td>Xuất xứ</td>
                      <td>{{$sukien->xuatxu}}</td>
                    </tr>
                  @endif
                  @if($sukien->baohanh)
                    <tr>
                      <td>Bảo hành</td>
                      <td>{{$sukien->baohanh}}</td>
                    </tr>
                  @endif
                  @if($sukien->ungdung)
                    <tr>
                      <td>Ứng dụng</td>
                      <td>{{$sukien->ungdung}}</td>
                    </tr>
                  @endif
                  @if($sukien->tomtat)
                    <tr>
                      <td>Tóm tắt</td>
                      <td>{!!$sukien->tomtat!!}</td>
                    </tr>
                  @endif
                </tbody>
              </table>
              
              <!-- <div class="price-d-info">
                <p>Giá bán: <span>262.000 đ</span></p>

                <p class="old-pr-new-add"><span>Tiết kiệm:</span></p>

                <p class="old-pr-new-add"><span>Giá trước đây:</span></p>
              </div> -->
            </div>
            <a style="" href="lienhe/#lienhe" class="btnRed" id="add-cart">
            	<button style="height: 50px;" class="add-cart button-small-d quick-buy-custom" data-product="199536">Liên hệ ngay</button>
            </a>
            @if($sukien->catalogues)
              <a style="" href="upload/catalogues/{{$sukien->catalogues}}" class="btnRed" id="add-cart">
                <button style="height: 50px;background: #5ccbee;padding: 3px 20px;" class="add-cart button-small-d quick-buy-custom" data-product="199536">Báo giá</button>
              </a>
            @endif

            <!-- Liên hệ ngay -->

            <div class="clearfix"></div>

          </div>


          

          <div class="clearfix"></div>
        </div>
        <div class="col-md-12 name-product-view" style="margin-top: 50px; margin-bottom: 20px">
          <h1 class="name-pro-info"><span style="font-size: 15px;">Nội dung</span></h1>
        </div>
        <div class="col-md-12">
          @if($sukien->noidung)
            {!! $sukien->noidung !!}
          @endif
        </div>
        
      </div>
    </div>

	<div class="tab-pro-d col-md-12">
	  
    @if($sukien->catalogues)
      <div class="f-product-view-tags" style="margin-top: 20px;">
        <span>Catalogues(download):  <a href="upload/catalogues/{{$sukien->catalogues}}" title="" target="_blank"> {{$sukien->catalogues}}</a></span>
      </div>
    @endif


	  <div class="f-product-view-tags" style="margin-top: 20px;">
	    <span>Tags: <a href="loaisanpham/{{$sukien->loaisukien->id}}/{{$sukien->loaisukien->slug}}.html/#bottom" title="" target="_blank">{{$sukien->loaisukien->ten}}</a></span>
	  </div>



<!-- social -->
    <div class="socials-share">
      <a class="bg-facebook" href="https://www.facebook.com/sharer/sharer.php?u=http://dientudonghoabachkhoa.com.vn/sanpham/{{$sukien->id}}/{{$sukien->slug}}.html/" target="_blank">
        <span class="fa fa-facebook"></span> Share
      </a>
      <a class="bg-twitter" href="https://twitter.com/share?text=dienmay&url=http://dientudonghoabachkhoa.com.vn/sanpham/{{$sukien->id}}/{{$sukien->slug}}.html/" target="_blank">
        <span class="fa fa-twitter"></span> Tweet
      </a>
      <a class="bg-google-plus" href="https://plus.google.com/share?url=http://dientudonghoabachkhoa.com.vn/sanpham/{{$sukien->id}}/{{$sukien->slug}}.html/" target="_blank">
        <span class="fa fa-google-plus"></span> Plus
      </a>
      <a class="bg-pinterest" href="https://www.pinterest.com/pin/create/button/?url=http://dientudonghoabachkhoa.com.vn/sanpham/{{$sukien->id}}/{{$sukien->slug}}.html/&media=http://dientudonghoabachkhoa.com.vn/upload/sanpham/{{$sukien->image}}&description={{$sukien->slug}}" target="_blank">
        <span class="fa fa-pinterest"></span> Pin
      </a>

      <a class="bg-email" href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to&su={{$sukien->slug}}&body={{$sukien->slug}}" target="_blank">
        <span class="fa fa-envelope"></span> Gmail
      </a>
  </div>
<!-- end -->

	  <div class="f-page-split">
	    <div class="f-page-split-title" style="padding-top: 70px">
	      <span>Sản phẩm cùng danh mục</span>

	      <div class="box-nav-slide-pro">
	        <p class="prev-prelated">
	          <i class="fa fa-caret-left"></i>
	        </p>
	        <p class="next-prelated"><i class="fa fa-caret-right"></i>
	        </p>
	      </div>
	    </div>

	    <div class="f-page-split-body">
	      <div class="f-product-view-other">
	        <ul id="pro-view-d-related" class="f-product-viewid f-product owl-carousel-sale owl-theme">

	        @foreach($tinlienquan as $sk)
	          <li class=" paddingclear4" id="like-product-item-199556">
	            <div class="v2-pr-item">
	              <a href="sanpham/{{$sk->id}}/{{$sk->slug}}.html/#bottom">
                  <div class="divhover">
                    <div class="price1 price-d-top-ps">
                      <!-- <p class="v2-pr-item-price">Liên hệ</p> --><a href="lienhe/#lienhe" class="BNC-add-cart v2-home-pr-item-action-buy" data-price-float="126000.00.00" data-name="{{$sk->ten}}" data-type="tab-home" data-price="Array" data-product="313470" data-quantity="1"
                      data-total-quantity="100">Liên hệ</a>
                    </div>

                    <div class="title2">
                      <a href="sanpham/{{$sk->id}}/{{$sk->slug}}.html/#bottom" title="{{$sk->ten}}">{{$sk->ten}}</a>
                    </div>

                    <p class="codepr-d">
                      @if($sk->model)
                        <span>Model:</span> {{$sk->model}}   
                      @else
                        <span>Sản phẩm chất lượng cao</span>
                      @endif
                    </p>

                   <!--  @if($sk->congsuat)
                      <p class="key-d-cat">Công suất:<span class="value"> {{$sk->congsuat}}</span></p>
                    @endif
                     -->
                    @if($sk->dienap)
                      <p class="key-d-cat">Điện áp:<span class="value"> {{$sk->dienap}}</span></p>
                    @endif

                    <!-- @if($sk->dosang)
                      <p class="key-d-cat">Độ sáng:<span class="value"> {{$sk->dosang}}</span></p>
                    @endif -->

                    @if($sk->mausac)
                      <p class="key-d-cat">Màu sắc:<span class="value"> {{$sk->mausac}}</span></p>
                    @endif

                    @if($sk->kichthuoc)
                      <p class="key-d-cat">Kích thước:<span class="value"> {{$sk->kichthuoc}}</span></p>
                    @endif
                    
                  </div>

                  <div class="item-product-cat">
                    <div class="">
                      <div class="image-pro-cat">
                        <a href="sanpham/{{$sk->id}}/{{$sk->slug}}.html" title="{{$sk->ten}}">
                          <img alt="{{$sk->ten}}" src="upload/sanpham/{{$sk->image}}" id="f-pr-image-zoom-id-313470" class="img-responsive BNC-image-add-cart-313470" />
                        </a>
                      </div>
                    </div>

                    <div class="content-sp-cat">
                      <div class="detailtext" style="float: right; max-width: 140px; padding-right: 0px">
                            <!-- <p class="v2-pr-item-price-d">126.000 đ</p> -->

                            <div class="title2">
                              <a style="width: 100%" href="sanpham/{{$sk->id}}/{{$sk->slug}}.html/#bottom" title="{{$sk->ten}}">{{$sk->ten}}</a>
                            </div>
                        @if($sk->congsuat)
                          <p class="orther_info_d">Công suất:<span class="value"> {{$sk->congsuat}}</span></p>
                       
                        @endif
                        @if($sk->model)
                          <p class="codepr"><span style="font-size: 12px; font-weight: 400;color: #808285">Model:</span> {{$sk->model}}</p>
                        @else
                          <p style="color: transparent;">-</p>
                        @endif
                        <a href="lienhe/#lienhe" class="BNC-add-cart v2-home-pr-item-action-buy" data-price-float="126000.00.00" data-name="{{$sk->ten}}" data-type="tab-home" data-price="Array" data-product="313470" data-quantity="1"
                        data-total-quantity="100">Liên hệ ngay</a>
                      </div>
                    </div>
                  </div></a>
	            </div>
	          </li>
	        @endforeach

	        </ul>
	        <script type="text/javascript">
	          $(document).ready(function() { var owl = $("#pro-view-d-related"); owl.owlCarousel({ items : 3, itemsDesktop : [1000,3], itemsDesktopSmall : [900,3], itemsTablet: [600,1], itemsMobile : false }); $(".next-prelated").click(function(){ owl.trigger('owl.next'); }); $(".prev-prelated").click(function(){ owl.trigger('owl.prev'); }); $(".play").click(function(){ owl.trigger('owl.play',1000); }); $(".stop").click(function(){ owl.trigger('owl.stop'); }); });
	        </script>

	        <div class="clearfix"></div>
	      </div>
	    </div>
	  </div>

	 <!--  <div class="f-product-view-comment">
	    <div class="f-product-comment-tab-header" style="margin-bottom:10px">
	      <ul id="f-pr-page-view-tabcomentid" class="no-margin no-padding nav-tabs row">
	        <li class="active">
	          <a href="#f-pr-cm-view-01" data-toggle="tab">Bình luận bằng tài khoản Facebook</a>
	        </li>

	        <li class="">
	          <a href="#f-pr-cm-view-02" data-toggle="tab">Bình luận bằng tài khoản Google+</a>
	        </li>
	      </ul>
	    </div>

	    <div class="clearfix"></div>
	  </div> -->
	</div>
</div>
</div>
</div>
</div>

@endsection
