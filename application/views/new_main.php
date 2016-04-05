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
    <div class="back_arrow"><img src="/src/img/backbtn.png" style="height: 18px;" ></div>
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

<div id="popup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">4월 6일 수요일 13시~15시 서비스 점검 안내</h4>
      </div>
      <div class="modal-body" style="font-size:11px;">
        <p>안녕하세요 바나나입니다<br>
  4월 5일 화요일 오후 2시경 서버에 장애가 발생했습니다.<br>
  이렇게 많은 분들이 동시에 접속할 줄은 꿈에도 몰라 소위 말해 서버가 터졌습니다ㅠ흑ㅠ<br>
  이에따라 앞으로 믿음직스럽고 원활한 서비스를 제공하기위해 4월 6일 수요일 1시부터 3시까지 2시간 동안, 즉 금요일 셔틀버스를 예약하는 날에 서비스 점검을 하고자 합니다. <b>금요일 셔틀을 예약하시는 분들은 수요일 하루만ㅠ 기존의 셔틀예약사이트를 이용해주시면 정말 감사하겠습니다.</b> </p>

  <p><i>이후 다음주 월요일과 화요일 셔틀을 예약하는 토요일과 일요일에는 서비스가 정상화될 예정이니</i> 앞으로도 많은 이용 부탁드리겠습니다.</p>

  <p>중간고사와 과제에 등골이 휘어지는 바나나 성애자 올림.</p>

  <p>p.s. 고릴라 로그인에 대해 물어보시는 분들이 많았는데요, 아직 개발중이고 테스트하고있는 서비스로 바나나를 열렬히 이용해주시는 우수 회원분들 중 관리자가 추첨을 통해 드리는 특별 서비스입니다!<br>
  </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="setCookie('popup_1','true');ga('send', 'event', 'popup', '다시보지않기', 'popup_1');">다시보지않기</button>
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
    if(getCookie("popup_1")!="true"){
    $("#popup").modal('show');
  }
  });
  </script>
</body>
</html>
