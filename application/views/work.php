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
      $("#time").text(new Date().format("yyyy년 MM월 dd일 hh시 mm분 ss초"));
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
        if(nonstop_flag)logout();
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

Date.prototype.format = function(f) {
    if (!this.valueOf()) return " ";

    var weekName = ["일요일", "월요일", "화요일", "수요일", "목요일", "금요일", "토요일"];
    var d = this;

    return f.replace(/(yyyy|yy|MM|dd|E|hh|mm|ss|a\/p)/gi, function($1) {
        switch ($1) {
            case "yyyy": return d.getFullYear();
            case "yy": return (d.getFullYear() % 1000).zf(2);
            case "MM": return (d.getMonth() + 1).zf(2);
            case "dd": return d.getDate().zf(2);
            case "E": return weekName[d.getDay()];
            case "HH": return d.getHours().zf(2);
            case "hh": return ((h = d.getHours() % 12) ? h : 12).zf(2);
            case "mm": return d.getMinutes().zf(2);
            case "ss": return d.getSeconds().zf(2);
            case "a/p": return d.getHours() < 12 ? "오전" : "오후";
            default: return $1;
        }
    });
};

String.prototype.string = function(len){var s = '', i = 0; while (i++ < len) { s += this; } return s;};
String.prototype.zf = function(len){return "0".string(len - this.length) + this;};
Number.prototype.zf = function(len){return this.toString().zf(len);};


</script>
