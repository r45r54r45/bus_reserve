<style>
</style>
<script>
var type=1;
$(function(){

  songdo_shuttle();
  setInterval(function(){
    songdo_shuttle();
  },30000);
  $("#option1").on("click",function(){
    type=1;
    $("#to").text("해경 / haekyung");
    $("#from").text("해경");
    songdo_shuttle();
    // $("#option1").css();
  });
  $("#option2").on("click",function(){
    type=2;
    $("#to").text("동춘 / dongchun");
    $("#from").text("동춘");
    songdo_shuttle();
  });
  setCurrentBus();
  setInterval(function(){setCurrentBus();},20000);
});
// 셔틀 시간정보
var h_time_s=[0820,0900,0940,1020,1100,1140,1300,1340,1420,1500,1540,1620,1700,1730,1840,2020,2100,2140,2220];
var h_time_w=[];
for (var i = 0; i < h_time_s.length; i++) {
	h_time_w[i]=h_time_s[i]+15;
}
var d_time_s=[0810,0840,0920,1000,1040,1120,1300,1340,1420,1500,1540,1700,1740,1820,2000,2040,2120,2200,2240];
var d_time_w=[];
for (var i = 0; i < d_time_s.length; i++) {
	d_time_w[i]=d_time_s[i]+15;
}
function songdo_shuttle(){
		var now=new Date().format("HHmm");
    if(type==1){
    $("#to").text("해경 / haekyung");
    $("#from").text("해경");
		$("#h_s").text(time_format(findPos(h_time_s,parseInt(now))));
		$("#h_w").text(time_format(findPos(h_time_w,parseInt(now))));
  }else{
    $("#to").text("동춘 / dongchun");
    $("#from").text("동춘");
		$("#h_s").text(time_format(findPos(d_time_s,parseInt(now))));
		$("#h_w").text(time_format(findPos(d_time_w,parseInt(now))));
  }
}
function time_format(data){
	var h;
	var m;
	var k=data.toString();
	if(data==false)return "정보 없음";
	if(k.length==3){
		h=k.substring(0,1);
	 m=k.substring(1,3);
	}else{
	h=k.substring(0,2);
 m=k.substring(2,4);
 }
	if(h=="00")return m;
	return h+":"+m;
}
</script>
<div class="container-fluid">
  <div class="row center-align" id="home-top-button">
    <div id="home" class="btn-group" data-toggle="buttons">
      <label class="btn btn-primary active" style="border-bottom-left-radius: 16px;
      border-top-left-radius: 16px;" id="option1">
      <input type="radio" name="options"  autocomplete="off"> 해경
    </label>
    <label class="btn btn-primary" style="border-bottom-right-radius: 16px;
    border-top-right-radius: 16px;" id="option2">
    <input type="radio" name="options"  autocomplete="off"> 동춘
  </label>
</div>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="card_holder">
      <div class="card" style="height:100px;">
        <a onclick="$('#myModal').modal('show')">
        <div style="position: absolute;
        width: 40px;
        height: 40px;
        background: white;
        border: 1px solid #46292b;
        border-radius: 50%;
        z-index: 2;
        left: 50%;
        top: 50%;
        margin-left: -20px;
        margin-top: -20px;
        text-align: center;">
        <span style="display: block;
        font-size: 10px;
        margin-top: 6px;">전체</span>
        <span style="display: block; font-size: 10px;">보기</span>
      </div>
    </a>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:90%;margin:20px auto;">
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">전체 시간표</h4>
      </div> -->
      <div class="modal-body" style="padding:0;">
        <img  style="    width: 100%;" src="/src/img/shuttle_new.png" onclick="$('#myModal').modal('hide')">
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>
      <div class="row" style="height:100%;">
        <div class="col-xs-6" style="height:100%;">
          <div>
            <span style="font-size: 8px;margin-right: 4px;">TO</span>
            <span style="font-size: 13px;" id="to"></span>
          </div>
          <div style="position:absolute;bottom:0;width:100%;text-align:center;margin-left: -15px;">
            <span style="font-size: 25px; font-weight: 300;" id="h_s"></span>
          </div>
        </div>
        <div class="col-xs-6" style="border-left:1px solid #fcd90d; height:100%;">
          <div style="text-align:right;">
            <span style="font-size: 8px;margin-right: 4px;">FROM</span>
            <span style="font-size: 13px;" id="from"></span>
          </div>
          <div style="position:absolute;bottom:0;width:100%;text-align:center;margin-left: -15px;">
            <span style="font-size: 25px; font-weight: 300;" id="h_w"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="row" >
  <div class="col-xs-12" style="text-align:right">
    <span style="font-size:8px;">*공휴일에는 운행하지 않습니다</span>
  </div>
</div>
<div class="row" style="margin-top:20px;">
  <div class="col-xs-12 center-align">
    <span style="font-size: 13px;
    margin-right: 5px;">일반 버스 실시간 정보</span><i class="glyphicon glyphicon-repeat" style="color:#46292b;" onclick="setCurrentBus()"></i>
  </div>
</div>
<div class="row" style="margin-top:20px;">
  <div class="col-xs-12">
    <div class="card_holder">

      <!-- 91번 버스 카드 -->
      <div class="card" style="height:50px; margin-bottom:6px; position:relative;">
        <div style="height: 100%;
    width: 4em; border-right:2px solid #fcd90d;">
          <div><span style="font-size: 20px;">91</span></div>
          <div style="margin-top: -5px;"><span style="font-size: 10px;">하모니 앞</span></div>
        </div>
        <div style="position: absolute;
        top: 4px;
    left: 0;
    width: 100%;
    height: 42px;
    padding-left: 4em;
    padding-right: 18px;">
          <div style="position: absolute;
    bottom: 2px;
    font-size: 10px;padding-left: 18px;">
            <span id="bus91before"></span><span> 정거장 전</span>
          </div>
          <div style="
    float: right;
    line-height: 40px;">
            <span style="font-size: 17px;" id="bus91time"></span>
            <span style="font-size: 10px;    vertical-align: bottom;"> min</span>
          </div>
        </div>
      </div>

      <!-- 6724번 버스 카드 -->
      <div class="card" style="height:50px; margin-bottom:6px; position:relative;">
        <div style="height: 100%;
    width: 4em; border-right:2px solid #fcd90d;">
          <div><span style="font-size: 20px;">6724</span></div>
          <div style="margin-top: -5px;"><span style="font-size: 10px;">1학사 앞</span></div>
        </div>
        <div style="position: absolute;
        top: 4px;
    left: 0;
    width: 100%;
    height: 42px;
    padding-left: 4em;
    padding-right: 18px;">
          <div style="position: absolute;
    bottom: 2px;
    font-size: 10px;padding-left: 18px;">
            <span id="bus6724before"></span><span> 정거장 전</span>
          </div>
          <div style="
    float: right;
    line-height: 40px;">
            <span style="font-size: 17px;" id="bus6724time"></span>
            <span style="font-size: 10px;    vertical-align: bottom;"> min</span>
          </div>
        </div>
      </div>

      <!-- 6405번 버스 카드 -->
      <div class="card" style="height:50px; margin-bottom:6px; position:relative;">
        <div style="height: 100%;
    width: 4em; border-right:2px solid #fcd90d;">
          <div><span style="font-size: 20px;">6405</span></div>
          <div  style="margin-top: -5px;"><span style="font-size: 10px;">성지아파트</span></div>
        </div>
        <div style="position: absolute;
        top: 4px;
    left: 0;
    width: 100%;
    height: 42px;
    padding-left: 4em;
    padding-right: 18px;">
          <div style="position: absolute;
    bottom: 2px;
    font-size: 10px;padding-left: 18px;">
            <span id="bus6405before"></span><span> 정거장 전</span>
          </div>
          <div style="
    float: right;
    line-height: 40px;">
            <span style="font-size: 17px;" id="bus6405time"></span>
            <span style="font-size: 10px;    vertical-align: bottom;"> min</span>
          </div>
        </div>
      </div>

      <!-- 9201번 버스 카드 -->
      <div class="card" style="height:50px; margin-bottom:6px; position:relative;">
        <div style="height: 100%;
    width: 4em; border-right:2px solid #fcd90d;">
          <div><span style="font-size: 20px;">9201</span></div>
          <div  style="margin-top: -5px;"><span style="font-size: 10px;">1학사 앞</span></div>
        </div>
        <div style="position: absolute;
        top: 4px;
    left: 0;
    width: 100%;
    height: 42px;
    padding-left: 4em;
    padding-right: 18px;">
          <div style="position: absolute;
    bottom: 2px;
    font-size: 10px;padding-left: 18px;">
            <span id="bus9201before"></span><span> 정거장 전</span>
          </div>
          <div style="
    float: right;
    line-height: 40px;">
            <span style="font-size: 17px;" id="bus9201time"></span>
            <span style="font-size: 10px;    vertical-align: bottom;"> min</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<div class="row" >
  <div class="col-xs-12" style="text-align:right">
    <span style="font-size:8px;">*공공데이터 포탈의 정보를 사용합니다</span>
  </div>
  <div style="height:100px;"></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="temp"></div>
<!-- <script src="/src/js/crossdomain.js"></script> -->
<script>
 //  function setCurrentBus(){
 //    // http://openapi.tago.go.kr/openapi/service/ArvlInfoInqireService/getSttnAcctoSpcifyRouteBusArvlPrearngeInfoList?ServiceKey=JwH8P3QCOaTv%2FYttZkCDASHiJZblEJAk8X2i6nICtptOT8O55JvqRPG7nluVp6QEVQu7sy51aHk%2FUgm2b0Ncyg%3D%3D&cityCode=23&routeId=ICB165000381&nodeId=ICB165000725
 //    $.ajax({
 //       url: 'http://freshman.yonsei.ac.kr', //<- xml 위치
 //       dataType: "xml", // xml 형식
 //       cache: false,
 //       type: 'GET',
 //     success: function(res) {
 //       console.log(res.responseText);
 // // console.log(JSONConvertedXML);
 //
 //    }
 //  });
 //  }

function setCurrentBus(){
    $("#bus6724time").css("font-size","10px").text("loading...");
    $("#bus91time").css("font-size","10px").text("loading...");
    $("#bus6405time").css("font-size","10px").text("loading...");
    $("#bus9201time").css("font-size","10px").text("loading...");
  $.ajax({
        url: '/main/test2', //<- xml 위치
        type: 'GET',
        // dataType:'json',
      success: function(res) {
        var json=JSON.parse(res);
        $("#bus6724before").text(json['6724']['count']);
        $("#bus6724time").css("font-size","17px").text(toMin(json['6724']['time']));
        $("#bus91before").text(json['91']['count']);
        $("#bus91time").css("font-size","17px").text(toMin(json['91']['time']));
        $("#bus6405before").text(json['6405']['count']);
        $("#bus6405time").css("font-size","17px").text(toMin(json['6405']['time']));
        $("#bus9201before").text(json['9201']['count']);
        $("#bus9201time").css("font-size","17px").text(toMin(json['9201']['time']));
     }
   });
 }
function toMin(sec){

  if(sec==""){
    return "정보 없음";
  }else if(sec.toString()[1]=="�"){
    return sec.toString()[0];
  }else
  return sec;
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
function findPos(arr,data){
	for (var i = 0; i < arr.length; i++) {
		if(arr[i]>data){
			return arr[i];
		}
	}
	return false;
}
</script>
