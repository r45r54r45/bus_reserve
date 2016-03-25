<div class="container-fluid" style="height: 100%;">
  <div class="row" style="height: 100%;">
    <div class="col-xs-12" style="height: 100%;text-align:center;">
      <div id="shuttle_top" style="line-height: 90%;">
        <div id="cookie_check_btn" style="position: absolute;
        right: 10px;
        height: 40px;
        width: 40px;">
      </div>
      <img src="/src/img/yonsei.png" style="margin:20px auto 20px; width:80px; height:80px;" class="img img-responsive">
      <!-- <span style="font-size:12px;">
      셔틀버스 자동예약이란?<br>
      2시에 자동으로 정해놓은 시간에<br>
      셔틀버스를 예약해주는 서비스입니다.<br>
      <br>
      셔틀버스 자동예약은 바나나 고릴라 회원<br>
      전용회원입니다.<br>
    </span><br> -->
    <!-- <span style="font-size:10px;">바나나 고릴라 서비스 더 알아보기</span> -->
    <div class="col-xs-12 center form-group" style="padding-top:10px;">
      <div class="alert alert-success" role="alert">
      <a onclick="parent.moveto('more_notice')" class="alert-link">셔틀 예약 리뉴얼 안내</a>
    </div>
      <div class="full-width input-group">
        <input style="border-radius: 3px;background-color: white;font-size:12px;border: 1px solid rgba(70, 41, 43, .5); box-shadow: 0 1px 1px 1px rgba(0,0,0,0.2);" id="sid" name="id" class="full-width form-control" type="text" placeholder="학번" onkeydown=" input_range(event)" onkeyup="len_ch(10,'sid','idgl');"  maxlength="10">
        <span id="idgl" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" style="display:none;"></span>
      </div>
    </div>
    <div class="col-xs-12 center form-group">
      <div class="full-width input-group">
        <!-- <div id="pwg" class="input-group-addon" style="color: darkgray">SHA-3 암호화 적용중</div> -->

        <input style="border-radius: 3px;background-color: white;font-size:12px;border: 1px solid rgba(70, 41, 43, .5); box-shadow: 0 1px 1px 1px rgba(0,0,0,0.2);" id="spw" name="pw" class="full-width form-control" type="password"  placeholder="연세포털 비밀번호" >

        <span id="pwgl" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" style="display:none;"></span>
      </div>
    </div>
    <div class="col-xs-12 center form-group" id="gorilla_input" style="display:none;">
      <div class="full-width input-group">
        <input style="border-radius: 3px; background-color: white;font-size:12px;border: 1px solid rgba(70, 41, 43, .5); box-shadow: 0 1px 1px 1px rgba(0,0,0,0.2);"  class="full-width form-control" type="text" id="gorilla_pw" placeholder="고릴라 회원 승인번호" >
      </div>

    </div>

    <div class="col-xs-12" style="">

      <div id="gorilla_login_btn" style="inline-block; width:40px; height:40px; border-radius:50%; border:1px solid #46292b; float:right;  background:#46292b; line-height:80%;    display: table;">
        <span style="color:white; display: table-cell;
        vertical-align: middle;font-size:10px;">고릴라<br>Login</span>
      </div>
      <!-- id="normal_login_btn" -->
      <!-- onclick="alert('공사중 입니다. 혹시 월요일 셔틀을 예약하신 분은 예약이 된 것이 아니니 토요일에 다시 예약해주세요.')" -->
      <div id="normal_login_btn" style="inline-block; width:40px; height:40px; border-radius:50%; border:1px solid #46292b; float:right; margin-right:10px;display: table;">
        <span style="color:#46292b; display: table-cell;
        vertical-align: middle; font-size:10px;">일반<br>Login</span>
      </div>

    </div>

  </div>


  <iframe id="normal_shuttle" style="width:100%; height:100%; display:none" src="" frameBorder="0"></iframe>
</div>

</div>
</div>
<style>
html {
  height: 100%;
}
body {
  height: 100%;
}
</style>
<script>
var gorilla_flag=false;
$(function(){
  $("#sid").val(getCookie("sid"));
  $("#spw").val(getCookie("spw"));
  $("#cookie_check_btn").on("click",function(){
    $("#gorilla_input").toggle();
    gorilla_flag=!gorilla_flag;
  });
  $("#gorilla_login_btn").on("click",function(){
    var id=$("#sid").val();
    var pw=$("#spw").val();
    if(id==""||pw==""){
      alert("입력을 확인해주세요");
      return;
    }
    var final_userIdx=getCookie("final_userIdx");
    //먼저 아이디 비번 로그인 체크부터
    $.get("/api/login?id="+id+"&pw="+pw,function(data){
      if(data['result']){
        if(!gorilla_flag){
          $.get("http://ybanana.yonsei.ac.kr/data/gorilla_login/"+id+"/"+pw+"/"+final_userIdx, function(data){
            var json=JSON.parse(data);
            var result=json['result'];
            if(result){
              location.href="http://ybanana.yonsei.ac.kr/new_ver/gorilla_shuttle";
              //TODO 보안 문제 체크, 토큰주고 양방향으로 체크하는 것
            }else{
              alert("고릴라 회원이 아닙니다!");
            }
          });
        }else{
          var gorilla_pw=$("#gorilla_pw").val();
          $.get("http://ybanana.yonsei.ac.kr/data/gorilla_join/"+id+"/"+pw+"/"+final_userIdx+"/"+gorilla_pw, function(data){
            var json=JSON.parse(data);
            if(!json['result']){
              alert("고릴라 승인번호가 옳지 않습니다.");
            }else{
              location.href="http://ybanana.yonsei.ac.kr/new_ver/gorilla_shuttle";
              //TODO 보안 문제 체크, 토큰주고 양방향으로 체크하는 것
            }
          });
        }
      }else{
        alert('포탈 로그인에 실패했습니다.');
      }
    });
  });
  $("#normal_login_btn").on("click",function(){
    var id=$("#sid").val();
    var pw=$("#spw").val();
    if(id==""||pw==""){
      alert("입력을 확인해주세요");
      return;
    }
    //먼저 아이디 비번 로그인 체크부터
    var final_userIdx=getCookie("final_userIdx");
    $.get("/api/login?id="+id+"&pw="+pw,function(data){
      if(data['result']){
    setCookie("sid",$("#sid").val(),100);
    setCookie("spw",$("#spw").val(),100);
    $.get("/data/get_auth/"+final_userIdx,function(data){
      var json=JSON.parse(data);
      var auth=json['auth'];
      if(auth=="0"){
        $.get("/data/normal_join/"+id+"/"+pw+"/"+final_userIdx,function(data){
          location.href="http://ybanana.yonsei.ac.kr/new_ver/normal_shuttle";
        });
      }else{
        location.href="http://ybanana.yonsei.ac.kr/new_ver/normal_shuttle";
      }
    });

  }else{
    alert('포탈 로그인에 실패했습니다.');
  }
});
  });

  // $("#shuttle_top")
})


function input_range(event){
  var n=event.keyCode;
  if((n>47&&n<58)||n==8||n==37||n==39){}
  else event.preventDefault();
}
function len_ch(n,m,t){
  if($("#"+m).val().length==n){
    $("#"+t).css("display","");
  }else{
    $("#"+t).css("display","none");
  }
}

function setCookie(cName, cValue, cDay){
  var expire = new Date();
  expire.setDate(expire.getDate() + cDay);
  cookies = cName + '=' + escape(cValue) + '; path=/ '; // 한글 깨짐을 막기위해 escape(cValue)를 합니다.
  if(typeof cDay != 'undefined') cookies += ';expires=' + expire.toGMTString() + ';';
  document.cookie = cookies;
}

// 쿠키 가져오기
function getCookie(cName) {
  cName = cName + '=';
  var cookieData = document.cookie;
  var start = cookieData.indexOf(cName);
  var cValue = '';
  if(start != -1){
    start += cName.length;
    var end = cookieData.indexOf(';', start);
    if(end == -1)end = cookieData.length;
    cValue = cookieData.substring(start, end);
  }
  return unescape(cValue);
}
</script>
