<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Countdown landing page Bootstrap template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap and Font Awesome css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Pacifico">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,700">
    <!-- Theme stylesheet-->
    <link rel="stylesheet" href="/src/hockey/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/src/hockey/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="javascripts/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="/src/hockey/js/jquery.cookie.js"></script>
        <script src="/src/hockey/js/jquery.countdown.min.js"></script>
        <script src="/src/hockey/js/front.js"></script>
          <script src="/src/js/common.js"></script>

  </head>
  <body>
    <script>
    $(function(){
      setInterval(function(){
        var date1=new Date(2016, 11, 12, 9, 0);
        var date2= new Date();
        var diff=new Date((date1-date2)*1000));
        $("#countdown-days").text(diff.format("dd"));
        $("#countdown-hours").text(diff.format("hh"));
        $("#countdown-minutes").text(diff.format("mm"));
        $("#countdown-seconds").text(diff.format("ss"));
      },1000);
    });
    </script>
    <div style="background-image: url('/src/hockey/img/beach.jpg')" class="main">
      <div class="overlay"></div>
      <div class="container">

        <div class="row">
          <div class="col-sm-12">
            <h1 class="cursive">HockeyMom</h1>
            <h2 class="sub">We connect moms with other moms</h2>
          </div>
        </div>
        <!-- countdown-->
        <div id="countdown" class="countdown">
          <div class="row">
            <div class="countdown-item col-sm-3 col-xs-6">
              <div id="countdown-days" class="countdown-number">&nbsp;</div>
              <div class="countdown-label">days</div>
            </div>
            <div class="countdown-item col-sm-3 col-xs-6">
              <div id="countdown-hours" class="countdown-number">&nbsp;</div>
              <div class="countdown-label">hours</div>
            </div>
            <div class="countdown-item col-sm-3 col-xs-6">
              <div id="countdown-minutes" class="countdown-number">&nbsp;</div>
                <div class="countdown-label">days</div>
            </div>
            <div class="countdown-item col-sm-3 col-xs-6">
              <div id="countdown-seconds" class="countdown-number">&nbsp;</div>
              <div class="countdown-label">seconds</div>
            </div>
          </div>
        </div>
        <!-- /.countdown-->
        <div class="mailing-list">
          <h3 class="mailing-list-heading">Join our mailing list and we will keep you updated!</h3>
          <div class="row">
            <form class="form-inline">
              <div class="form-group">
                <label for="email" class="sr-only"></label>
                <input type="email" placeholder="jane.doe@example.com" id="email" class="form-control transparent">
              </div>
              <button class="btn btn-danger">subscribe</button>
            </form>
          </div>
        </div>
      </div>
      <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <p>&copy;2016 HockeyMom Korea</p>
            </div>
            <div class="col-md-6">
              <p class="credit">Made by Jinwoo Cheon, Younji Lee, Pierre Jipagan, Woohyun Kim</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- JAVASCRIPT FILES -->

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->

  </body>
</html>
<!-- <html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
  <title>입시 컨설팅 플랫폼</title>

  <link rel="stylesheet"  href="/src/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" crossorigin="anonymous" ></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.4/js/bootstrap-select.min.js"></script>
      <script src="/src/js/common.js"></script>
      <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
  <style>
  .body{
    font-family: 'Montserrat', sans-serif;
  }
    .countdown{
      display: inline-block;
      text-align: center;
    }
    .time{
      font-size:60px;
      font-weight: 400;
    }
    .desc{

    }
    .center{
      text-align:center;
    }
  </style>
  <script>
  $(function(){
    setInterval(function(){
      new Date().format("");
    },1000);
  });
  </script>
  <div class="container-fluid" style="position:relative;">
    <div style="position:absolute; left:0; top:0;">
    <img src="http://www.muaac.org/front/data/cheditor4/1403/4e5d18ded39d245db7912b8f0fe84861_1393901932.jpg" class="img img-responsive">
  </div>
  <div class="row" style="">
    <div class="col-xs-12 center" style="margin-top:5%;">
      <span style="font-weight:600; font-size:40px; color:white;">HockeyMom</span>
    </div>
    <div class="col-xs-12 center" style="margin-top:3%">
      <span style="font-weight:500; font-size:30px;color:white;">We Connect Moms with Other Moms</span>
    </div>
  </div>
    <div class="row" style="">
      <div class="countdown" style="width:10%">
      </div>
      <div class="countdown" style="width:20%">
        <div class="time" id="day">
        </div>
        <div class="desc">
        </div>
      </div>
      <div class="countdown" style="width:20%">
        <div class="time" id="hour">
        </div>
        <div class="desc">
        </div>
      </div>
      <div class="countdown" style="width:20%">
        <div class="time" id="minute">
        </div>
        <div class="desc">
        </div>
      </div>
      <div class="countdown" style="width:20%">
        <div class="time" id="seconds">
        </div>
        <div class="desc">
        </div>
      </div>
      <div class="countdown" style="width:10%">
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12" style="text-align:center;">
      <span style="font-weight:400; font-size:20px;">소식을 들으시려면 해주셈</span>
    </div>
    </div>
    <div class="row">
        <div class="col-xs-12" style="text-align:center;">
      <span style="font-weight:400; font-size:20px;">소식을 들으시려면 해주셈</span>
    </div>
    <div class="col-xs-12" style="text-align:center;">
      <input>
    </div>
    </div>
    <div class="row">
      <div
    </div>

  </div>
</body>
</html> -->
