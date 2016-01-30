<body id="page-top" class="index">

  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#page-top">Fast & Easy Yonsei Shuttle</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="hidden">
            <a href="#page-top"></a>
          </li>
          <li class="page-scroll">
            <a href="/main/about">FEYS는?</a>
          </li>
          <li class="page-scroll">
            <a href="/main/start">시작하기</a>
          </li>
          <li class="page-scroll">
            <a href="/main/myinfo">내정보</a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>
  <!-- Header -->
  <form action="#" method="post" id="form">
  <div class="container-fluid" id="top-con">
    <div class="row" >
      <!-- <div class="col-xs-12 center top-down-padding  black">
        <span class="t2">귀찮았던 셔틀 예약</span><br>
        <span class="t1">이젠 편해집니다!</span>
      </div> -->
      <div class="col-xs-12 center top-down-padding sky-blue">
        <span class="t2"><b>[누구보다 빠르게]</b></span>
      </div>
      <div class="col-xs-12 center side-padding-20 form-group" style="padding-top:10px;">
        <div class="full-width input-group">
          <input id="sid" name="id" class="form-control" type="text" placeholder="학번" onkeydown=" input_range(event)" onkeyup="len_ch(10,'sid','idgl')"  maxlength="10">
          <span id="idgl" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" style="display:none;"></span>
        </div>
      </div>
      <div class="col-xs-12 center  side-padding-20 form-group">
        <div class="input-group">
          <div id="pwg" class="input-group-addon">SHA-3 암호화 적용중</div>
          <input id="spw" name="pw" class="full-width form-control" type="password" onkeydown=" input_range(event)" onkeyup="len_ch(7,'spw','pwgl');"  placeholder="연세포털 비밀번호" maxlength="7">
          <span id="pwgl" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" style="display:none;"></span>
        </div>
      </div>
      <div class="col-xs-12 center side-padding-20 form-group" style="">
        <div class="full-width input-group">
          <input id="phone" name="phone" class="form-control" type="text" placeholder="핸드폰" onkeydown=" input_range(event)" onkeyup="len_ch(11,'phone','phonegl')"  maxlength="11">
          <span id="phonegl" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" style="display:none;"></span>
        </div>
      </div>
      <div class="col-xs-12 side-padding-20 ">
        <div class="btn-group btn-group-justified " role="group">
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#sinchon" aria-expanded="false" aria-controls="collapse">신촌 > 송도</button>
          </div>
        </div>
      </div>
      <div class="col-xs-12 side-padding-20 ">
        <div class="collapse back-well margin-bottom-10" id="sinchon" >
          <div class="well" id="sinchonWell">
            <!-- 옵션이 추가되는 부분 -->
          </div>
          <div class="btn-group btn-group-justified " role="group">
            <div class="btn-group" role="group">
              <button onclick="addRow('sinchon')" class="btn btn-info more" type="button">
                추가하기
              </button>
            </div>
            <div class="btn-group" role="group">
              <button onclick="deleteRow('sinchon')" class="btn btn-info more" type="button">
                삭제하기
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 side-padding-20 ">
        <div class="btn-group btn-group-justified " role="group">
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#songdo" aria-expanded="false" aria-controls="collapse">송도 > 신촌</button>
          </div>
        </div>
      </div>
      <div class="col-xs-12 side-padding-20 ">
        <div class="collapse back-well" id="songdo">
          <div class="well" id="songdoWell">
            <!-- 옵션이 추가되는 부분 -->
          </div>
          <div class="btn-group btn-group-justified " role="group">
            <div class="btn-group" role="group">
              <button onclick="addRow('songdo')" class="btn btn-info more" type="button">
                추가하기
              </button>
            </div>
            <div class="btn-group" role="group">
              <button onclick="deleteRow('songdo')" class="btn btn-info more" type="button">
                삭제하기
              </button>
            </div>
          </div>
        </div>
      </div>
        <div class="col-xs-12 side-padding-20">
          <a onclick="submitCheck()">
          <div class=" submit_btn">
          <span>자동 예약 신청하기</span>
        </div>
      </a>
        </div>
    </div>
    <div class="row">
      <div class="col-xs-12" style="margin-top:20px; background:#EF99A7; height:200px; text-align:center;display:table;">
        <span style=" display:table-cell;vertical-align:middle;font-size:20px; color:white">지금은 베타 버전...<br>하지만 작동은 문제없다!</span>
      </div>
    </div>
  </div>
</form>
  </body>
