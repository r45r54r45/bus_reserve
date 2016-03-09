<div class="container-fluid" style="height: 100%;">
  <div class="row" style="height: 100%;">
    <div class="col-xs-12" style="height: 100%;text-align:center;">
      <div id="shuttle_top" style="line-height: 90%;">
        <img src="/src/img/yonsei.png" style="margin:20px auto 20px; width:80px; height:80px;" class="img img-responsive">
        <!-- <span style="font-size:12px;">
          셔틀버스 자동예약이란?<br>
          2시에 자동으로 정해놓은 시간에<br>
          셔틀버스를 예약해주는 서비스입니다.<br>
          <br>
          셔틀버스 자동예약은 바나나 고릴라 회원<br>
          전용회원입니다.<br>
        </span><br> -->
        <span style="font-size:10px;">바나나 고릴라 서비스 더 알아보기</span>
        <div class="col-xs-12 center form-group" style="padding-top:10px;">
          <div class="full-width input-group">
            <input id="sid" name="id" class="form-control" type="text" placeholder="학번" onkeydown=" input_range(event)" onkeyup="len_ch(10,'sid','idgl');"  maxlength="10">
            <span id="idgl" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" style="display:none;"></span>
          </div>
        </div>
        <div class="col-xs-12 center form-group">
          <div class="full-width input-group">
            <!-- <div id="pwg" class="input-group-addon" style="color: darkgray">SHA-3 암호화 적용중</div> -->
            <input id="spw" name="pw" class="full-width form-control" type="password" onkeydown=" input_range(event)" onkeyup="len_ch(7,'spw','pwgl');"  placeholder="연세포털 비밀번호" maxlength="7">
            <span id="pwgl" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" style="display:none;"></span>
          </div>
        </div>

        <div class="col-xs-12" style="">
          <!-- <div style="inline-block; width:40px; height:40px; border-radius:50%; border:1px solid #46292b; float:right;  background:#46292b; line-height:80%;    display: table;">
            <span style="color:white; display: table-cell;
    vertical-align: middle;font-size:10px;">고릴라<br>Login</span>
          </div> -->
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
$(function(){
  $("#sid").val(getCookie("sid"));
  $("#spw").val(getCookie("spw"));
  $("#normal_login_btn").on("click",function(){
    var id=$("#sid").val();
    var pw=$("#spw").val();
    if(id==""||pw==""){
      alert("입력을 확인해주세요");
      return;
    }
    $("#shuttle_top").css("display","none");
    var url="/new_ver/normal_shuttle?id="+id+"&pw="+pw;
    $("#normal_shuttle").attr("src",url).on("load",function(){
      $("#normal_shuttle").contents().find("#form").submit();
      $("#normal_shuttle").css("display","");
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
    setCookie(m,$("#"+m).val(),100);
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
