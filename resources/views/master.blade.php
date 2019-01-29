<html>
<head>
  <meta name="generator" content=""/>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <base s_name="allypark" idw="1376" extention=".html" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <title>Thiết bị điện chính hãng</title>
  <base href="{{asset('')}}">

  <meta name="description" content="Điện máy" />
  <meta name="keywords" content="Điện máy" />
  <meta name="robots" content="INDEX, FOLLOW" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta property="og:title" content="Điện máy" />
  <meta property="og:description" content="Điện máy" />
  <meta property="og:site_name" content="Điện máy" />

  <link rel="shortcut icon" href="upload/logo.png">
  <link href="statics/css/reset.css" rel="stylesheet" media="screen" />
  <link rel="stylesheet" href="statics/plugins/bootstrap/css/bootstrape5bf.css" />
  <link href="statics/css/hien.css" rel="stylesheet" media="screen" />
  <link href="statics/css/main65e3.css" rel="stylesheet" media="screen" />
  <link href="statics/css/responsive7799.css" rel="stylesheet" media="screen" />
  <link href="statics/css/less-style.less" rel="stylesheet/less" media="screen" />
  <link href="statics/css/responsive4f8b.css" rel="stylesheet" media="screen" />
  <link href="statics/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" media="screen" />
  <link href="statics/plugins/owl-carousel/owl.theme.css" rel="stylesheet" media="screen" />
  <link href="statics/plugins/slider-range/jquery.nouislider.min.css" rel="stylesheet" />
  <link href="statics/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />

  <script type="text/javascript" src="statics/scripts/jquery.min.js"></script>
  <script src="statics/plugins/owl-carousel/owl.carousel.js"></script>
  <script src="statics/plugins/slider-range/jquery.nouislider.all.min.js"></script>


  <link rel="stylesheet" type="text/css" href="logos/carousel.css" rel="stylesheet" type="text/css" >
  <script src="logos/slick.js" type="text/javascript" charset="utf-8"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116483848-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-116483848-1');
</script>

</head>

<body class="home">


    <!-- Navigation -->
    @include('nav')


    <!-- /.container -->
    @yield('content')

    <!-- Footer -->
    @include('footer')

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="statics/plugins/bootstrap/js/less.js"></script>
    <script src="statics/plugins/bootstrap/js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="js/jssor.slider.min.js"></script>

    
    @yield('script')


</body>

</html>