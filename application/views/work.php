<div class="container-fluid grey">
  <div class="row ">
    <div class="col-xs-12 center">
      <h1 class="">셔틀예약</h1>
    </div>
  </div>
</div>
<div class="container-fluid white">
  <div class="row ">
    <div class="col-xs-12 center">
      <h1 class="">노동자 1호</h1>
    </div>
  </div>
</div>
<div class="container-fluid grey">
  <div class="row ">
    <div class="col-xs-6 center">
      <h1 class="">현재 시각</h1>
    </div>
    <div class="col-xs-6 center">
      <h3 id="time"></h3>
    </div>
  </div>
</div>
<div class="container-fluid white">
  <div class="row ">
    <div class="col-xs-6 center">
      <h1 class="">노동자 상황</h1>
    </div>
    <div class="col-xs-6 center">
      <h3 id="status">대기중</h3>
    </div>
  </div>
</div>
<div class="container-fluid grey">
  <div class="row ">
    <div class="col-xs-12 center" style="margin: 20px auto;">
      <p><label for="id">학번 </label><input id="id" type="text" placeholder="학번"></p>
      <p><label for="pw">비밀번호 </label><input id="pw" type="password" placeholder="비밀번호"></p>
      <p><label for="date">날짜 </label><input id="date" type="text" placeholder="20160127"></p>
      <p><label for="loc">출발장소 </label><input id="loc" type="text" placeholder="S"></p>
      <p><label for="time">출발시간 </label><input id="dtime" type="text" placeholder="0750"></p>
    </div>
    <div class="col-xs-12 center" style="margin: 20px auto;">
      <button onclick="nonstop()" style="margin: 20px auto;">예약</button>
    </div>

  </div>
</div>
<div class="container-fluid white">
  <div class="row ">
    <div class="col-xs-12 center">
      <h3>로그</h3>
      <span id="log"></span>
    </div>
  </div>
</div>

<style>
.grey{
  background: #B3B3B3;
}
.white{
  background: white;
}
.center{
  text-align: center;
}
</style>



<script>
var login_count=0;
var reserve_count=0;
var cancel_count=0;
var time_start;
var time_end;
var log=$("#log");
// -- 쿼리 정보 시작 --
var id;
var pw;
var date;
var loc;
var time;
// -- 쿼리 정보 끝 --

$(function(){
  setInterval(function(){
      $("#time").text(new Date().format("yyyy년 MM월 dd일 hh시 mm분 ss초"));
  },1000);
});
function scheduler(){
  //임시
  id=$("#id").val();
  pw=$("#pw").val();
  date=$("#date").val();
  loc=$("#loc").val();
  time=$("#dtime").val();
  console.log(time);
}
function setStatus(s){
  if(s!="스케쥴러 호출"){
    $("#status").text(id+" "+s);
    log.prepend("<p>"+id+" "+s+"</p>");
  }else{
    $("#status").text(s);
    log.prepend("<p>"+s+"</p>");
  }
}
function nonstop(){
  time_start = new Date().getTime();
  setStatus("스케쥴러 호출");
  scheduler();
  login();
}
function login(){
  setStatus("로그인 시작");
  login_count=0;
  var d="?id="+id+"&pw="+pw;
  var f="<iframe style='display:none' id='login' src='/work/login"+d+"'>";
  $("body").append(f);
  $("#login").on("load",function(){
    login_count++;
    if(login_count==1)$("#login").contents().find("#form2").submit();
    if(login_count==2){
      $("#login").remove();
      setStatus("로그인 끝");
      reserve();
    }
    });
}
function reserve(){
  setStatus("예약 시작");
  reserve_count=0;
  var d="?date="+date+"&loc="+loc+"&time="+time;
  var f="<iframe style='display:none' id='reserve' src='/work/reserve"+d+"'>";
  $("body").append(f);
  $("#reserve").on("load",function(event){
      reserve_count++;
      if(reserve_count==1)$("#reserve").contents().find("#reserve").submit();
      if(reserve_count==2){
        $("#reserve").remove();
          setStatus("예약 끝");
          logout();
      }
  });
}
// function cancel(){
//   var data="<iframe id='cancel' src='/work/cancel' style='display:none'></iframe>";
//   $("body").append(data);
//   $("#cancel").on("load",function(){
//     cancel_count++;
//     if(cancel_count==1)$("#cancel").contents().find("#cancel").submit();
//     if(cancel_count==2){
//       $("#cancel").remove();
//       logout();
//     }
//   });
// }
function logout(){
  setStatus("로그아웃 시작");
  var data="<iframe id='logout' src='http://ysweb.yonsei.ac.kr/busTest/logout.jsp' style='display:none'></iframe>";
  $("body").append(data);
  $("#logout").on("load",function(){
    $("#logout").remove();
    setStatus("로그아웃 끝");
    setStatus("종료: "+(new Date().getTime()-time_start)/1000+" sec");
    scheduler();
    setStatus("스케쥴러 호출");
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
