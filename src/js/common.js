$(window).on("load",function(){
  $("#top-con").css("padding-top",$("nav").height()+"px");
  var h=$(window).height();
  $(".height-300").css("height",h*0.6+"px");
  $(".height-200").css("height",h*0.4+"px");
  $(".height-100").css("height",h*0.2+"px");
  $(".t1").css("line-height",h*0.25+"px");
  $(".t2").css("line-height",h*0.25+"px");
  $(".t3").css("line-height",h*0.45+"px");
  for (var i = 0; i < background.length; i++) {
    $(".color_"+(i+1)).css("background","#"+background[i]);
  }
  var color=$("body").find(".color");
  for (var i = 0; i < color.length; i++) {
    var col='#'+Math.floor(Math.random()*16777215).toString(16);
    if(col!="#ffffff"&&col.length==7)$(color[i]).css("background",col);
    else{ $(color[i]).css("background","#000000");
  }
  }

  // $("#form").on("submit",function(event){
  //   event.preventDefault();
  //   console.log($(this).serialize());
  // });
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

function mbus(){
  var arr=["0500","0520","0545","0605","0620","0635","0655","0710","0725","0750","0810","0840","0910","0940","1010","1040","1110","1135","1200","1220","1240","1300","1320","1340","1405","1430","1455","1520","1550","1610","1625","1640","1700","1720","1740","1800","1825","1855","1920","1945","2015","2040","2100","2120","2140","2200","2215","2230","2250","2310"];
  return arr;
}
function timeadd(a,b){
  var bm=parseInt(b);
  var arr=[];
  for (var i = 0; i < a.length; i++) {
    var ah=parseInt(a[i].substring(0,2));
    var am=parseInt(a[i].substring(2,4));
    if(am+bm<60)arr.push( (ah).toString()+(am+bm).toString());
    else arr.push((ah+1).toString()+(am+bm-60).toString());
  }
  console.log();
  return arr;

}

function timediff(a,b){
  var ah=parseInt(a.toString().substring(0,2));
  var am=parseInt(a.toString().substring(2,4));
  var bh=parseInt(b.toString().substring(0,2));
  var bm=parseInt(b.toString().substring(2,4));
  if(am-bm>0){
    if(ah-bh-1<10)return '0'+(ah-bh).toString()+(am-bm).toString();
    else return (ah-bh).toString()+(am-bm).toString();
  }
  else{
    if(ah-bh-1<10)return '0'+(ah-bh-1).toString()+(am+60-bm).toString();
    else return (ah-bh-1).toString()+(am+60-bm).toString();
    }
  }

  function searchBusTime(bstopid,routeid,Dir,pathseq){
    var frm = document.pform;
    frm.routeid.value = routeid;
    frm.bstopid.value = bstopid;
    frm.pathseq.value = pathseq;


    if(Dir == 0){
    frm.action = "http://bus.incheon.go.kr/iw/pda/01/retrievePdaOfferBusSystem2892273231.laf";
    } else if(Dir == 1){
    frm.action = "http://bus.incheon.go.kr/iw/pda/01/retrievePdaOfferBusSystem2892273232.laf";
    }else if(Dir == 2){
    frm.action = "http://bus.incheon.go.kr/iw/pda/01/retrievePdaOfferBusSystem2892273233.laf";
    }
    frm.submit();
}
