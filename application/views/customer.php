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
        <a class="navbar-brand" href="#page-top">Easy Yonsei Shuttle</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="hidden">
            <a href="#page-top"></a>
          </li>
          <li class="page-scroll">
            <a href="#portfolio">Portfolio</a>
          </li>
          <li class="page-scroll">
            <a href="#about">About</a>
          </li>
          <li class="page-scroll">
            <a href="#contact">Contact</a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>
  <!-- Header -->
  <div class="container ">
    <div class="row" id="top-row">
      <div class="col-xs-12 center top-down-padding  black">
        <span class="t2">귀찮았던 셔틀 예약</span><br>
        <span class="t1">이젠 편해집니다!</span>
      </div>
      <div class="col-xs-12 center top-down-padding sky-blue">
        <span class="t2">지금 바로 예약해보세요</span><br>
      </div>
      <div class="col-xs-12 center side-padding-20 form-group" style="padding-top:10px;">
        <div class="full-width input-group">
          <input id="sid" class="form-control" type="text" placeholder="학번" onkeydown=" input_range(event)" onkeyup="len_ch(10,'sid','idgl')"  maxlength="10">
          <span id="idgl" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" style="display:none;"></span>
        </div>
      </div>
      <div class="col-xs-12 center  side-padding-20 form-group">
        <div class="input-group">
          <div id="pwg" class="input-group-addon">SHA-3 암호화 적용중</div>
          <input id="spw" class="full-width form-control" type="password" onkeydown=" input_range(event)" onkeyup="len_ch(7,'spw','pwgl');"  placeholder="비밀번호" maxlength="7">
          <span id="pwgl" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" style="display:none;"></span>
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
          <div class="well" >
            <div class="btn-group btn-group-justified " role="group">
              <div id="pp" class="btn no-side-padding" >
                <select class="selectpicker show-tick" title="요일">
                  <option>월</option>
                  <option>화</option>
                  <option>수</option>
                  <option>목</option>
                  <option>금</option>
                </select>
              </div>
              <div class="btn no-side-padding" >
                <select class="selectpicker show-tick" title="시간">
                  <option>07:50 ~ 08:50</option>
                  <option>07:50 ~ 08:50</option>
                  <option>07:50 ~ 08:50</option>
                </select>
              </div>
            </div>

          </div>
          <div class="btn-group btn-group-justified " role="group">
              <div class="btn-group" role="group">
        <button class="btn more" >
          추가하기
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
        <div class="collapse" id="songdo">
          <div class="well">
            ff
          </div>
        </div>
      </div>
    </div>
  </body>
