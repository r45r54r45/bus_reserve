$(window).on("load",function(){
  $("#top-con").css("padding-top",$("nav").height()+"px");
  var h=$(window).height();
  $(".height-300").css("height",h*0.6+"px");
  $(".t1").css("line-height",h*0.25+"px");
  $(".t2").css("line-height",h*0.25+"px");
  $(".t3").css("line-height",h*0.45+"px");
  for (var i = 0; i < background.length; i++) {
    $(".color_"+(i+1)).css("background","#"+background[i]);
  }
  $("#form").on("submit",function(event){
    event.preventDefault();
    console.log($(this).serialize());
  });
});
var background=["9B3FB5","5EA59C","E56B86","1A1B41"];
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
  strVar += "                  <option value='2'>07:50 ~ 08:50<\/option>";
  strVar += "                  <option value='3'>07:50 ~ 08:50<\/option>";
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
