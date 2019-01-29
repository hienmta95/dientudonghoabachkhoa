<?php $loai_id = intval($loai_id);?>
<?php $nhom_id = intval($nhom_id);?>

<div class="slide-bar-left col-lg-3 col-md-3 col-sm-3 col-xs-12">
  <div class="f-block danhmucblock" style="overflow: hidden;">
    <div class="f-block-title" style="margin-bottom: 0px;">
      <h2><span><a style="color:#fff;" href="">Danh mục sản phẩm</a></span></h2>
    </div>

      <ul class="nav navbar-nav" id="sidenav01">
        <?php $i =1; ?>
        @foreach($menu as $loai)
        
          <li
            <?php 
              if ($loai_id && $loai_id == $loai->id) {
            ?>
                class="active"
            <?php
              }
            ?>
          >
            <a class="title" href="loaisanpham/{{$loai->id}}/{{$loai->slug}}.html/#bottom">{{$loai->ten}}</a>

            @if(count($loai->nhomsanpham) > 0)
              <a data-toggle="collapse" data-target="#toggle<?php echo $i; ?>" data-parent="#sidenav01" class="collapsed button">
                <i class="caret pull-right"></i>
              </a>
              <div class="collapse" id="toggle<?php echo $i; ?>" style="height: 0px;">
                <ul class="nav nav-list">
                  @foreach($loai->nhomsanpham as $nhom)
                    <li

	                    <?php 
			              if ($nhom_id && $nhom_id == $nhom->id) {
			            ?>
			                class="active"
			            <?php
			              }
			            ?>

                    >
	                    <a href="nhomsanpham/{{$nhom->id}}/{{$nhom->slug}}.html/#bottom">{{$nhom->ten}}</a>
	                </li>
                  @endforeach
                </ul>
              </div>
            @endif

          </li>

        <?php $i++; ?>
        @endforeach
      </ul>
   <!--  <ul class="sidenav01 f-block-news-menu no-margin no-padding nav navbar-nav" id="cssmenu">
	    @foreach($menu as $loai)
	      <li>
	        <a href="loaisanpham/{{$loai->id}}/{{$loai->slug}}.html" title="{{$loai->ten}}">{{$loai->ten}}</a>
	      </li>
	    @endforeach
       
   </ul> -->
   <!--  -->
</div>

	<div class="f-block block-support">
    <h3 class='title-sp-tt'>Hỗ trợ trực tuyến</h3>

    <div class="f-block-body block-support">
      <div class="imgs-avr-support">
        <img src="upload/hot-line.png" />
      </div>

      <div class="content-support">
        <ul>
          <li class="item-hot-1">
            <h3>Tư vấn bán hàng</h3>

            <div class="text-support">
              <div class="tt-sp">
                <div>
                  <span>Mr. Thành:</span> 0976.683.693 
                </div>

                <div>
                  <span>Homephone:</span> 024.62.92.3969
                </div>

                <div>
                  <span>Email:</span> eabachkhoa@gmail.com
                </div>
              </div>

              
            </div>
          </li>
        </ul>
      </div>

      <div class="content-support">
        <ul>
          <li class="item-hot-1">
            <h3>Hỗ trợ tư vấn kỹ thuật</h3>

            <div class="text-support">
              <div class="tt-sp">
                <div>
                  <span>Mr. Hưng:</span> 0167.453.8883 
                </div>
                <div>
                  <span>Mr. Trung:</span> 0938.850.688
                </div>
                <div>
                  <span>Email:</span> eabachkhoa@gmail.com
                </div>
              </div>

              
            </div>
          </li>
        </ul>
      </div>

      <div class="tt-cty">
        <h3>CÔNG TY CP XÂY DỰNG & KỸ THUẬT ĐIỆN - TỰ ĐỘNG HÓA BÁCH KHOA</h3>

        <p>Văn phòng Hà Nội</p>

        <p>Địa chỉ: P832 CT12A, KĐT Kim Văn, Kim Lũ</p>

        <p>P. Đại Kim, Q.Hoàng Mai, Hà Nội</p>

        <p><span>Tel:</span>  0246 292 3969</p>

        <p><span>Email:</span>eabachkhoa@gmail.com</p>
      </div>

    </div>
  </div>
</div>
