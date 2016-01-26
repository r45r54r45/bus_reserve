<div style="height:300px;"></div>
<button onclick="login()">로그인</button>
<button onclick="logout()">로그아웃</button>
<button onclick="reserve()">예약</button>
<button onclick="nonstop()">걍바로예약해</button>
<span id="time"></span>

<script>
var nonstop_flag=false;
var login_count=0;
var reserve_count=0;
var cancel_count=0;
var time_start;
var time_end;
// ---
var date="20160127";


$(function(){
  setInterval(function(){
      $("#time").text(new Date());
  },1000);
});

function nonstop(){
  time_start = new Date().getTime();
  nonstop_flag=true;
  login();
}
function login(){
  login_count=0;
  var data="<iframe style='display:none' id='login' src='/work/login'>";
  $("body").append(data);
  $("#login").on("load",function(){
    login_count++;
    if(login_count==1)$("#login").contents().find("#form2").submit();
    if(login_count==2){
      $("#login").remove();
      if(nonstop_flag)reserve();
    }
    });
}
function reserve(){
  reserve_count=0;
  var d="?date="+date;
  var f="<iframe style='display:none' id='reserve' src='/work/reserve"+d+"'>";
  $("body").append(f);
  $("#reserve").on("load",function(event){
      reserve_count++;
      if(reserve_count==1)$("#reserve").contents().find("#reserve").submit();
      if(reserve_count==2){
        $("#reserve").remove();
        if(nonstop_flag)cancel();
      }
  });
}
function cancel(){
  var data="<iframe id='cancel' src='/work/cancel' style='display:none'></iframe>";
  $("body").append(data);
  $("#cancel").on("load",function(){
    cancel_count++;
    if(cancel_count==1)$("#cancel").contents().find("#cancel").submit();
    if(cancel_count==2){
      $("#cancel").remove();
      if(nonstop_flag)logout();
    }
  });
}
function logout(){
  var data="<iframe id='logout' src='http://ysweb.yonsei.ac.kr/busTest/logout.jsp' style='display:none'></iframe>";
  $("body").append(data);
  $("#logout").on("load",function(){
    $("#logout").remove();
    time_end=new Date().getTime();
    console.log(time_end-time_start+"second");
  });
}

</script>
