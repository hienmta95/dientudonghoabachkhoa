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
        <a href="{{$page->slug}}_{{$page->id}}.html/#bottom" style="font-size: 16px;">/ {{$page->tieude}}</a>
      </li>
    </ol>
  </div>
</div>

<div class="main1">
  <div class="container">
    <div class="row">
      
      
      @include('menuloaisukien', ['loai_id' => "0", 'nhom_id' => "0"])



      <div class="center-main col-lg-9 col-md-9 col-sm-9 col-xs-12">

        <div class="v2-tabhome">
          <div class="v2-tabhome-title">
            <div class="v2-home-catepr-left-mn">
              <a href="{{$page->slug}}_{{$page->id}}.html/#bottom"><span>{{$page->tieude}}</span></a>
            </div>
          </div>

          <div class="f-center-body">

            <div class="tab-content">
              <div id="f-pr-tab0" class="tab-pane active v2-tabhome-product">
                <div style="border-bottom: 1px solid #e3e4e8; margin-bottom: 20px; padding-bottom: 10px;">
                  {!! $page->noidung !!}
                </div>
                
                
                {!! $page->mota !!}
              </div>
            </div>
          </div>
          
          
        </div>      
      </div>
    </div>
  </div>
</div>


@endsection