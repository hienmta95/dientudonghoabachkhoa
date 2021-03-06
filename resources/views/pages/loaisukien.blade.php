@extends('master')
@section('content')


<div id="bottom" class="productbreadcrumb" style="height: 50px; margin-bottom: 50px">
  <div class="container">
    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12"></div>

    <ol class="breadcrumb col-lg-9 col-md-9 col-sm-12 col-xs-12" style="display:block; border-bottom: 0px;     padding: 14px 5px;
    line-height: 20px;">
      <li>
        <a href="" style="font-size: 16px;">Trang chủ </a>
      </li>
      <li>
        <a href="loaisanpham/{{$loaisukien->id}}/{{$loaisukien->slug}}.html/#bottom" style="font-size: 16px;">/ {{$loaisukien->ten}}</a>
      </li>
    </ol>
  </div>
</div>

<div class="main1">
  <div class="container">
    <div class="row">
      
      
      
      @include('menuloaisukien', ['loai_id' => "$loaisukien->id", 'nhom_id' => "0"])

      <div class="center-main col-lg-9 col-md-9 col-sm-9 col-xs-12">

        <div class="v2-tabhome">
          <div class="v2-tabhome-title">
            <div class="v2-home-catepr-left-mn">
              <a href="{{$loaisukien->slug}}-{{$loaisukien->id}}.html/#bottom"><span>{{$loaisukien->ten}}</span></a>
            </div>
          </div>

          <div class="f-center-body">

            <div class="tab-content">
              <div id="f-pr-tab0" class="tab-pane active v2-tabhome-product">
                <div style="border-bottom: 1px solid #e3e4e8; margin-bottom: 20px; padding-bottom: 10px;">
                  {!! $loaisukien->noidung !!}
                </div>
                
                
                {!! $loaisukien->mota !!}
              </div>
            </div>
          </div>
          
          
        </div>      
      </div>

      <!-- <div class="center-main col-lg-9 col-md-9 col-sm-9 col-xs-12">

        <div class="v2-tabhome">
          <div class="v2-tabhome-title">
            <div class="v2-home-catepr-left-mn">
              <a href="#"><span>Sản phẩm thuộc {{$loaisukien->ten}}</span></a>
            </div>
          </div>

          <div class="f-center-body">

            <div class="tab-content">
              <div id="f-pr-tab0" class="tab-pane active v2-tabhome-product">

                <ul class="owl-carousel-new row">

                @foreach($sukien as $sk)

                  <li class=" col-md-4 col-sm-4 col-xs-6 full-xs paddingclear4" id="like-product-item-313470">
                    <div class="v2-pr-item">
                      <a href="sanpham/{{$sk->id}}/{{$sk->slug}}.html">
                      <div class="divhover">
                        <div class="price1 price-d-top-ps">
                          <p class="v2-pr-item-price">Liên hệ</p><a href="lienhe/#lienhe" class="BNC-add-cart v2-home-pr-item-action-buy" data-price-float="126000.00.00" data-name="{{$sk->ten}}" data-type="tab-home" data-price="Array" data-product="313470" data-quantity="1"
                          data-total-quantity="100">Liên hệ</a>
                        </div>

                        <div class="title2">
                          <a href="sanpham/{{$sk->id}}/{{$sk->slug}}.html" title="{{$sk->ten}}">{{$sk->ten}}</a>
                        </div>

                        

                        <p class="codepr-d">
                          @if($sk->model)
                            <span>Model:</span> {{$sk->model}}   
                          @else
                            <span>Sản phẩm chất lượng cao</span>
                          @endif
                        </p>
                        @if($sk->congsuat)
                          <p class="key-d-cat">Công suất:<span class="value"> {{$sk->congsuat}}</span></p>
                        @endif
                        
                        @if($sk->dienap)
                          <p class="key-d-cat">Điện áp:<span class="value"> {{$sk->dienap}}</span></p>
                        @endif

                        @if($sk->dosang)
                          <p class="key-d-cat">Độ sáng:<span class="value"> {{$sk->dosang}}</span></p>
                        @endif

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
                          

                            <div class="title2">
                              <a style="width: 100%" href="sanpham/{{$sk->id}}/{{$sk->slug}}.html" title="{{$sk->ten}}">{{$sk->ten}}</a>
                            </div>

                            @if($sk->congsuat)
                              <p class="orther_info_d">Công suất:<span class="value"> {{$sk->congsuat}}</span></p>
                            @else
                              <p>-</p>
                            @endif
                            @if($sk->model)
                              <p class="codepr"><span>Model</span> {{$sk->model}}</p>
                            @else
                              <p>-</p>
                            @endif

                            <a href="lienhe/#lienhe" class="BNC-add-cart v2-home-pr-item-action-buy" data-price-float="126000.00.00" data-name="{{$sk->ten}}" data-type="tab-home" data-price="Array" data-product="313470" data-quantity="1" data-total-quantity="100">Liên hệ ngay</a>
                          </div>
                        </div>
                      </div></a>
                    </div>
                  </li>

                @endforeach
                </ul>

              </div>
            </div>
          </div>
          
          <div style="display: block; margin: 0 auto; text-align: right;">
            {{$sukien->links()}}
          </div>
          
        </div>      
      </div>  -->
    </div>
  </div>
</div>


@endsection