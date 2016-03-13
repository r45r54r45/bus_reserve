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
  <!-- Bootstrap core CSS -->
  <link rel="apple-touch-startup-image" href="/src/img/splash2.png" >
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
    <div class="setting more_page_btn" style="display:none"><img src="/src/img/notice_btn.png" style="height: 30px;" ></div>
    <div class="notice more_page_btn" style="display:none"><img src="/src/img/setting_btn.png" style="height: 30px;" ></div>

    <div class="noti notification" style=""><img id="noti_img" src="/src/img/noti_on.png" style="height: 30px;" >

    <span class="notification" id="noti_num" style="position: absolute;
    top: 6px;
    text-shadow: none;
    font-size: 13px;
    font-weight: 100;
    left: 11px;
    color: white;"></span>
  </div>
    <div class="help_button"><img src="/src/img/help_btn.png" style="height: 18px;" ></div>
    <div class="banana_button" style="display:none;"><img src="/src/img/banana.png" style="height: 18px;" ><span id="banana_count"></span></div>
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
    max-height: 130px; padding: 0px 0px 15px; ">


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

</body>
</html>
