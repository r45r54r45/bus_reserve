<div class="container-fluid" style="padding:0">
  <div class="row center-align" id="home-top-button">
    <div id="home" class="btn-group" data-toggle="buttons">
      <label class="btn btn-primary active" style="border-bottom-left-radius: 16px;
      border-top-left-radius: 16px;" id="option1">
      <input type="radio" name="options"  autocomplete="off"> 신촌발
    </label>
    <label class="btn btn-primary" style="    border-bottom-right-radius: 16px;
    border-top-right-radius: 16px;" id="option2" >
    <input type="radio" name="options"  autocomplete="off"> 송도발
  </label>
</div>
</div>
<div class="center-align">
  <span id="cur_time"></span>
</div>
<table>
  <thead>
    <tr>
      <th>시간</th>
      <th id="day1">월</th>
      <th id="day2">화</th>
      <th id="day3">수</th>
      <th id="day4">목</th>
      <th id="day5">금</th>
    </tr>
  </thead>
  <tbody>
    <?
    $time=array();
    $time[0]="7:20~<br>8:20";
    $time[1]="7:50~<br>8:50";
    $time[2]="9:30~<br>10:30";
    $time[3]="10:30~<br>11:30";
    $time[4]="11:30~<br>12:30";
    $time[5]="12:30~<br>13:30";
    $time[6]="14:30~<br>15:30";
    $time[7]="15:00~<br>16:00";
    $time[8]="16:30~<br>17:30";
    $time[9]="17:30~<br>18:30";
    $time[10]="18:30~<br>19:30";
    $time[11]="19:00~<br>20:00";
    $time[12]="20:00~<br>21:00";
    $time[13]="21:00~<br>22:00";
    for($i=0; $i<14; $i++){
      ?>
      <tr id="<?="tr".$i?>">
        <td class="shown_time" id="<?="shown_time".$i?>"><?=$time[$i]?></td>
        <td class="blank" id="<?="tr".$i."_1"?>"></td>
        <td class="blank" id="<?="tr".$i."_2"?>"></td>
        <td class="blank" id="<?="tr".$i."_3"?>"></td>
        <td class="blank" id="<?="tr".$i."_4"?>"></td>
        <td class="blank" id="<?="tr".$i."_5"?>"></td>
      </tr>
      <?}?>
    </tbody>
  </table>


  <div class="modal" id="modal" tabindex="-1" role="dialog" style="    margin-left: -120px;
  margin-top: -75px;
  height: 150px;
  width: 240px;
  top: 50%;
  left: 50%;">
  <div class="x_btn" id="x_button"><i class="glyphicon glyphicon-remove"></i></div>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body" style="text-align:center; padding: 10px;">
        <span style="font-size:10px;" id="selected"></span><br>
        <span style="font-size:10px;" id="message"></span><br>
        <div style="margin-top:10px;">
          <div class="gorilla_circle_btn" id="r_btn1" style="color:#46292b; display:none;"><div class="gorilla_btn"><span id="">예약</span></div></div>
          <div class="gorilla_circle_btn" id="r_btn2" style="background:#46292b; display:none;"><div class="gorilla_btn"><span style="color:white !important;">불가</span></div></div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div>
<style>
.gorilla_btn{
  display: table-cell;
  vertical-align: middle;
}
.x_btn{
  width: 15px;
  height: 15px;
  position: absolute;
  right: 15px;
  top: 15px;
  z-index: 9;
}
td>.x_btn{
  width: 10px;
  height: 10px;
  position: absolute;
  right: 2px;
  top: -2px;
  z-index: 9;
}
.gorilla_circle_btn{
  vertical-align: middle;
  display: inline-table;
  border-radius: 50%;
  width:50px;
  height:50px;
  border:1px solid #46292b;
}
table{
  width:100%;

}
tr,th{
  height:35px;
}
td:nth-child(1){
  color:black !important;
}
td,th{
  height:35px;
  width:16.6vw;
  border:1px solid black !important;
  text-align: center;
  position:relative;
  font-size:12px;
}
td{
  color:black;
}
.shown_time{
  font-size: 10px;
}

</style>
<script>
var selectedCell;
var typeFlag=0; //0:nothing 1:reserve 2:cancel
var locFlag="S"; //S: sinchon, I: songdo
var Gtime;
var Gday;
var timeArr=['0720','0750','0930','1030','1130','1230','1430','1500','1630','1730','1830','1900','2000','2100'];
$(function(){
  setInterval(
    function(){
      notAvail();
    },2000);
    notAvail();
    $("#option1").on("click",function(){
      locFlag="S";
      $(".blank").css("background","none").text("");
      $("#shown_time1").html("7:50~<br>8:50");
      $("#shown_time7").html("15:00~<br>16:00");
      $("#shown_time9").html("17:30~<br>18:30");
      $("#shown_time10").html("18:30~<br>19:30");
      $("#shown_time11").html("19:00~<br>20:00");
      $("#shown_time12").html("20:00~<br>21:00");
      $("#shown_time13").html("21:00~<br>22:00");
      timeArr[1]='0750';
      timeArr[7]='1500';
      timeArr[9]='1730';
      timeArr[10]='1830';
      timeArr[11]='1900';
      timeArr[12]='2000';
      timeArr[13]='2100';
    });
    $("#option2").on("click",function(){
      locFlag="I";
      $(".blank").css("background","none").text("");
      $("#shown_time1").html("7:40~<br>8:50");
      $("#shown_time7").html("15:30~<br>16:30");
      $("#shown_time9").html("17:00~<br>18:00");
      $("#shown_time10").html("17:30~<br>18:30");
      $("#shown_time11").html("18:00~<br>19:00");
      $("#shown_time12").html("18:30~<br>19:30");
      $("#shown_time13").html("19:30~<br>20:30");
      timeArr[1]='0740';
      timeArr[7]='1530';
      timeArr[9]='1700';
      timeArr[10]='1730';
      timeArr[11]='1800';
      timeArr[12]='1830';
      timeArr[13]='1930';
    });
    $("td").on("click", function(e){
      var cell=e.target.id;
      selectedCell=cell;

      if(cell.split("_")[0]!="shown"&&$("#"+cell).attr("avail")=='true'){
        var cellId=cell.substring(2);
        var cellArr=cellId.split("_");
        var shown_time=$("#shown_time"+cellArr[0]);
        var time=timeArr[cellArr[0]];
        var day=cellArr[1];
        remaining(day,cellArr[0]);
        Gtime=time;
        Gday=day;
        for(var i=0; i<14;i++){
          if($("#tr"+i+"_"+day).text()!=""){
            alert("같은 방향으로는 하루에 한건만 예약가능합니다.");
            return;
          }
        }
        $("#selected").text(shown_time.text()+" "+$("#day"+cellArr[1]).text());
        typeFlag=1;
        $("#message").text("빈자리를 확인중입니다");
        $(".gorilla_circle_btn").css("display","none");
        $("#modal").modal('show');
      }
    });
    $("#x_button").on("click",function(){
      typeFlag=0;
      $("#modal").modal('hide');
    });
    $("#r_btn1").on("click",function(){
      if(typeFlag==1){
        reserve(Gtime, Gday, locFlag, 1);
        $("#modal").modal('hide');
      }else if(typeFlag==2){

      }
    });
    $("#r_btn2").on("click",function(){
      if(typeFlag==1){
        $("#modal").modal('hide');
      }else if(typeFlag==2){

      }
    });
  });
  var s=new Date();
  s.setHours(14);
  s.setMinutes(0);
  s.setSeconds(2);
  function notAvail(){
    myInfo();
    var d=new Date();
    var day=d.getDay();
    var hour=d.getHours();
    var minute=d.getMinutes();
    var target;
    if(d>s){ //2시 보다 크면
      if(day=="4"){
        target=[4,5];
      }else if(day=="5"){
        target=[5];
      }else if(day=="6"){
        target=[1];
      }else if(day=="0"){
        target=[1,2];
      }else{
        target=[day,day+1,day+2];
      }
    }else{ //2시가 안됫으면
      if(day=="4"){
        target=[4,5];
      }else if(day=="5"){
        target=[5];
      }else if(day=="6"){
        target=[];
      }else if(day=="0"){
        target=[1];
      }else{
        target=[day,day+1];
      }
    }
    for(var j=0; j<target.length; j++){
      for(var i=0; i<14; i++){
        if(target[j]==day&&(pad(hour)+""+pad(minute))>timeArr[i]){
          continue;
        }
        // if(remainStatus[locFlag][target[j]][i]=="0")continue;
        $("#tr"+i+"_"+target[j]).css("background","#FBD80D");
        $("#tr"+i+"_"+target[j]).attr("avail","true");
      }
      // var start_date=d.getDate()-d.getDay()+1;
      // d.setDate(parseInt(start_date)+parseInt(target[j])-1);
      // var date=d.getFullYear()+""+pad((d.getMonth()+1))+""+pad(d.getDate());
      // $.get("/api/remaining?loc="+locFlag+"&date="+date+"&day="+target[j],function(data){
      //   var day=data['day'];
      //   var remain=data['remaining'];
      //     remainStatus[locFlag][day]=remain;
      // });
    }
  }
  var remainStatus=[{'S':[1,2,3,4,5]},'I'];
  function myInfo(){
    $.get("/api/status_all?id="+getCookie("id")+"&pw="+getCookie("pw"),function(data){
      for(var i=0; i<data.length; i++){
        var t=data[i];
        if(t['loc']==locFlag){
          var date=t['date'];
          var kk=new Date(date.substring(0,4)+"/"+date.substring(4,6)+"/"+date.substring(6,8));
          var day=kk.getDay();
          var time=timeArr.indexOf(t['time']);
          $("#tr"+time+"_"+day).text(t['seatNum']+"번");
        }
      }
    });
  }
  function remaining(r_day,r_time){
    var d=new Date();
    var start_date;
    var date;
    if(d.getDay()==6||d.getDay()==0){ //오늘이 토요일이거나 일요일일경우
      start_date=d.getDate()-d.getDay()+1; //월요일 날짜 구하기
      d.setDate(parseInt(start_date)+parseInt(r_day)-1);
      date=d.getFullYear()+""+pad((d.getMonth()+1))+""+pad(d.getDate());
    }else{ //일반적인 날짜일경우
      start_date=d.getDate()-d.getDay()+1; //월요일 날짜 구하기
      d.setDate(parseInt(start_date)+parseInt(r_day)-1);
      date=d.getFullYear()+""+pad((d.getMonth()+1))+""+pad(d.getDate());
    }
    console.log("/api/remaining?loc="+locFlag+"&date="+date);
    $.get("/api/remaining?loc="+locFlag+"&date="+date,function(data){
      console.log(data);
      $("#message").text(data['remaining'][r_time]+"석 남음");
      if(data['remaining'][r_time]!="0"){
        $("#r_btn1").css("display","");
        $("#r_btn2").css("display","none");
      }else{
        $("#r_btn1").css("display","none");
        $("#r_btn2").css("display","");
      }

    });
  }
  var query="";
  function reserve(time, day, loc, type){
    var user=getCookie("final_userIdx");
    var d=new Date();
    var date;
    if(d.getDay()==6||d.getDay()==0){
      d.setDate(d.getDate()+(day-d.getDay()));
      date=d.getFullYear()+""+pad((d.getMonth()+1))+""+pad(d.getDate());
    }else{
      d.setDate(d.getDate()+(day-d.getDay()));
      date=d.getFullYear()+""+pad((d.getMonth()+1))+""+pad(d.getDate());
    }
    console.log(date);
    query="id="+getCookie("id")+"&pw="+getCookie("pw")+"&loc="+loc+"&date="+date+"&time="+time;
    $.get("/api/reserve?"+query,function(data){

    });
  }
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
  function pad(n){return n<10 ? '0'+n : n}
  </script>
