<form action="#" method="post" id="form">
<div class="container-fluid" id="top-con">
  <div class="row" >
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
        <div id="pwg" class="input-group-addon" style="color: darkgray">SHA-3 암호화 적용중</div>
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
        <a onclick="alert('안된다니까')">
          <!-- submitCheck() -->
        <div class=" submit_btn">
        <span>아직 안해 돌아가</span>
      </div>
    </a>
      </div>
  </div>
  <div class="row">
    <div class="col-xs-12" style="margin-top:20px; background:#EF99A7; height:200px; text-align:center;display:table;">
      <span style=" display:table-cell;vertical-align:middle;font-size:20px; color:white">지금은 베타 버전...<br>하지만 작동은 문제없다!</span>
    </div>
    <div class="col-xs-12" style=" background:#EAC488; height:200px; text-align:center;display:table;">
      <span style=" display:table-cell;vertical-align:middle;font-size:20px; color:white">예약내역은 <b>내정보</b>에서<br>확인/수정이 가능하지 훗.</span>
    </div>
  </div>
</div>
</form>
<script>
var sinchon_row=0;
var songdo_row=0;
function addRow(t){
  var num;
  if(t=="sinchon"&&sinchon_row==5){
    alert("일주일에 다섯번, 하루에 한건 예약 가능합니다.");
    return;
  }else if(t=="songdo"&&songdo_row==5){
    alert("일주일에 다섯번, 하루에 한건 예약 가능합니다.");
    return;
  }else if(t=="sinchon"){
    num=++sinchon_row;
  }else if(t=="songdo"){
    num=++songdo_row;
  }
  var strVar="";
  strVar += "<div style='display:none;' id='"+t+"_"+num+"' class=\"btn-group btn-group-justified \" role=\"group\">";
  strVar += "              <div id=\"pp\" class=\"btn no-side-padding\" >";
  strVar += "                <select id='s_r_"+t+"_"+num+"_1' class=\"selectpicker show-tick\" title=\"요일\" name='day_"+t+"_"+num+"'>";
  strVar += "                  <option value='mon'>월<\/option>";
  strVar += "                  <option value='tue'>화<\/option>";
  strVar += "                  <option  value='wed'>수<\/option>";
  strVar += "                  <option  value='thu'>목<\/option>";
  strVar += "                  <option  value='fri'>금<\/option>";
  strVar += "                <\/select>";
  strVar += "              <\/div>";
  strVar += "              <div class=\"btn no-side-padding\" >";
  strVar += "                <select id='s_r_"+t+"_"+num+"_2' class=\"selectpicker show-tick\" title=\"시간\" name='time_"+t+"_"+num+"'>";
  strVar += "                  <option value='1'>07:50 ~ 08:50<\/option>";
  strVar += "                  <option value='2'>13:30 ~ 14:30<\/option>";
  strVar += "                  <option value='3'>18:00 ~ 19:00<\/option>";
  strVar += "                <\/select>";
  strVar += "              <\/div>";
  strVar += "            <\/div>";
  $(strVar).appendTo($("#"+t+"Well")).fadeIn('normal');
  $("#s_r_"+t+"_"+num+"_1").selectpicker();
  $("#s_r_"+t+"_"+num+"_2").selectpicker();
}
function deleteRow(t){
  var num;
  if(t=="sinchon"&&sinchon_row==0){
    alert("더이상 삭제할 수 없습니다.");
    return;
  }else if(t=="songdo"&&songdo_row==0){
    alert("더이상 삭제할 수 없습니다.");
    return;
  }else if(t=="sinchon"){
    num=sinchon_row;
    $("#"+t+"_"+num).remove();
    sinchon_row--;
  }else if(t=="songdo"){
    num=songdo_row;
    $("#"+t+"_"+num).remove();
    songdo_row--;
  }
}
function submitCheck(){
  if($("#sid").val().length!=10){
    alert("학번을 올바르게 입력해주세요");
    return;
  }
  if($("#spw").val().length!=7){
    alert("비밀번호를 올바르게 입력해주세요");
    return;
  }
  if($("#phone").val().length!=11){
    alert("핸드폰 번호를 올바르게 입력해주세요");
    return;
  }
  var a=$("body").find(".selectpicker");
  if(a.length==0){
    alert("예약할 요일과 시간을 선택해주세요");
    return;
  }
  var sinchon_picker=sinchon_row*2;
  for (var i = 0; i < a.length; i++) {
    if(i%2==0){
      if(a[i].value==""){
        alert("요일을 입력해주세요")
        return;
      }
    }else{
      if(a[i].value==""){
        alert("시간을 입력해주세요")
        return;
      }
    }
  }
  // 요일, 시간 확인 끝
  // 겹치는 요일 있는지 확인 시작
  var arr=[];
  for (var i = 0; i < sinchon_picker; i+=2) {
    arr.push(a[i].value);
  }
  var u_arr=uniq(arr);
  if(u_arr.length!=arr.length){
    alert("같은 방향의 셔틀은 하루에 한대만 예약 가능합니다.");
    return;
  }
  var arr=[];
  for (var i = sinchon_picker; i < a.length; i+=2) {
    arr.push(a[i].value);
  }
  var u_arr=uniq(arr);
  if(u_arr.length!=arr.length){
    alert("같은 방향의 셔틀은 하루에 한대만 예약 가능합니다.");
    return;
  }
  $("#form").submit();
}
// 중복되는 원소를 제거한 배열을 리턴하는 함수
function uniq(a) {
    var seen = {};
    return a.filter(function(item) {
        return seen.hasOwnProperty(item) ? false : (seen[item] = true);
    });
}
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
</script>
