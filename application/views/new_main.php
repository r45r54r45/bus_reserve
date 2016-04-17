<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>banana</title>
  <!-- Bootstrap core CSS
  <link rel="apple-touch-startup-image" href="/src/img/splash2.png" > -->
    <!-- iPhone 6 startup image -->
    <link href="/src/img/splash2.png"
          media="(device-width: 375px) and (device-height: 667px)
                 and (-webkit-device-pixel-ratio: 2)"
          rel="apple-touch-startup-image">


  <link rel="apple-touch-icon" href="/src/img/main_logo.png" />
  <link rel="apple-touch-icon-precomposed" href="/src/img/main_logo.png" />

  <link rel="stylesheet" type="text/css" href="/src/css/addtohomescreen.css">
  <script src="/src/js/addtohomescreen.js"></script>
  <script>
    addToHomescreen();

  </script>

  <link href="/src/css/bootstrap.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <!-- Custom styles for this template -->
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
  <link href="/src/css/common.css" rel="stylesheet" type="text/css">
  <style>
html {
	height: 100%;
}
body {
	height: 100%;
}
</style>
</head>
<body style="font-family: 'Open Sans','Nanum Gothic', sans-serif;">
  <div data-role="header" class="container-fluid bam-background center-align" id="nav-top" style="padding:0;">
    <div id="back_arrow" class="back_arrow"><img src="/src/img/backbtn.png" style="height: 18px;" ></div>
    <!-- <div id="back_arrow2" class="back_arrow"><img src="/src/img/backbtn.png" style="height: 18px;" ></div> -->
    <!-- <div class="setting more_page_btn" style="display:none"><img src="/src/img/setting_btn.png" style="height: 25px;" ></div> -->
    <div class="notice more_page_btn" onclick="moveto('more_notice')" style="display:none"><img src="/src/img/notice_btn.png" style="height: 25px;" ></div>

    <div class="noti notification" style=""><img id="noti_img" src="/src/img/noti_off.png" style="height: 26px;" >

    <span class="notification" id="noti_num" style="position: absolute;
    top: 6px;
    text-shadow: none;
    font-size: 11px;
    font-weight: 100;
    left: 10px;
    color: white;"></span>
  </div>
    <div class="help_button"><img src="/src/img/help_btn.png" style="height: 18px;" ></div>
    <div class="banana_button" style=""><img src="/src/img/banana.png" style="height: 18px;" ><span id="banana_count"></span></div>
    <span class="nav-font-color nav-font-valign" id="page_title" style="font-family:'Montserrat'; color:white;text-shadow: 0 0px 0 #eee !important; font-weight:100"></span>
  </div>
  <!-- notification -->

  <div class="modal fade" id="noti_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="bottom: 50px; margin-top: 53px;margin-left:0">
  <div class="noti_tri"></div>
  <div class="modal-dialog" style="width: 96vw;margin: 11px 2vw;" role="document">
    <div class="modal-content" style="border-top: none; text-align:center;">
      <div id="noti_header" class="modal-header" style="border-bottom:none; padding: 5px 15px 5px;"></div>
      <div id="noti_body" class="modal-body" style="overflow-y: scroll;
    width: 100%;
    max-height: 80vw; padding: 0px 0px 15px; ">


      </div>

    </div>
  </div>
</div>

<div id="popup" class="modal fade" role="dialog" style="    margin-top: 50px;">
  <div class="modal-dialog" style="padding-top:12px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal" style="background-color:#ffffff;border:0px;">&times;</button>-->
        <h4 class="modal-title" style="text-align:center;font-size:14px;">4월 13일 수요일 서버 업그레이드로 인한 전체 서비스 중단 안내</h4>
      </div>
      <div class="modal-body" style="font-size:11px;padding-bottom:5px;">
        <p>
          4월 13일 수요일 (내일) 서버 업그레이드로 인하여 바나나 전체 서비스를 잠시 중단하며<br>
          4월 13일은 수요일은 <b>바나나가 아닌 학교 사이트</b>를 통해 <b>셔틀 예약</b>을 해주시기 바랍니다.<br>
          착오 없으시기 바랍니다.<br>
          <i>모두들 중간고사 대박 나시길~!</i>
        </p>
      </div>
      <div class="modal-footer" style="border:0px; padding-top:0px; padding-bottom:20px;">
        <button style="font-size:11px;border: 0px; padding:0px;box-shadow: 0px 0px 0px; background-color:#ffffff;" type="button" class="btn btn-default" data-dismiss="modal" onclick="setCookie('popup_3','true',100);ga('send', 'event', 'popup', '다시보지않기', 'popup_3');"><a href="#"> 다시보지않기</a></button>
      </div>
    </div>

  </div>
</div>




<div id="makelong" style="background-color:#ffffff;overflow:auto;-webkit-overflow-scrolling:touch;width:100%;position:absolute;top:64px;">

  <iframe id="contents" frameBorder="0" height="100%">

  </iframe>

</div>

  <div data-role="footer" class="container-fluid" style="padding:0;" id="nav-bottom">
    <ul class="nav nav-pills">
      <li id="menu1" class="center-align nav-bottom-border nav-bottom-5">
        <img class="img img-responsive" src="/src/img/1home_o.png"/>
      </li>
      <li id="menu2" class="center-align nav-bottom-border nav-bottom-5">  <img class="img img-responsive" src="/src/img/2shuttle.png" /></li>
      <li id="menu3" class="center-align nav-bottom-border nav-bottom-5">  <img class="img img-responsive" src="/src/img/3menu.png" /></li>
      <li id="menu4" class="center-align nav-bottom-border nav-bottom-5">  <img class="img img-responsive" src="/src/img/4link.png" /></li>
      <li id="menu5" class="center-align nav-bottom-border nav-bottom-5" style="border:none" >  <img class="img img-responsive" src="/src/img/5more.png"/></li>
    </ul>
  </div>

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="/src/js/jquery.js"></script>
  <script src="/src/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
  <script src="/src/js/new_js.js"></script>
  <script src="/src/js/jquery.timeago.js" type="text/javascript"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-73228564-1', 'auto');
  ga('set', 'userId', getCookie("id"));

  $(window).on("load",function(){
    if(getCookie("popup_3")!="true"){
    $("#popup").modal('show');
  }
  });
  </script>
</body>
</html>
