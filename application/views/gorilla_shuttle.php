<div class="container-fluid" style="padding:0">
  <div class="row center-align" id="home-top-button">
    <div id="home" class="btn-group" data-toggle="buttons">
      <label class="btn btn-primary active" style="border-bottom-left-radius: 16px;
      border-top-left-radius: 16px;" id="option1">
      <input type="radio" name="options"  autocomplete="off"> 신촌
    </label>
    <label class="btn btn-primary" style="    border-bottom-right-radius: 16px;
    border-top-right-radius: 16px;" id="option2" >
    <input type="radio" name="options"  autocomplete="off"> 송도
  </label>
</div>
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
        <td id="<?="tr".$i."_1"?>"></td>
        <td id="<?="tr".$i."_2"?>"></td>
        <td id="<?="tr".$i."_3"?>"></td>
        <td id="<?="tr".$i."_4"?>"></td>
        <td id="<?="tr".$i."_5"?>"></td>
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
        <span style="font-size:10px;" id="message">반복일을 선택해주세요</span>
        <div style="margin-top:20px;">
          <div class="gorilla_circle_btn" id="btn1" style="color:#46292b;"><div class="gorilla_btn"><span>한 주</span></div></div>
          <div class="gorilla_circle_btn" id="btn2" style="background:#46292b; "><div class="gorilla_btn"><span style="color:white !important;">매 주</span></div></div>
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
  color:white;
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
  getCurrent();
  $("#option1").on("click",function(){
    locFlag="S";
  });
  $("#option2").on("click",function(){
    locFlag="I";
  });
  $("td").on("click", function(e){
    var cell=e.target.id;
    selectedCell=cell;
    if(cell!=""){
      var cellId=cell.substring(2);
      var cellArr=cellId.split("_");
      var shown_time=$("#shown_time"+cellArr[0]);
      var time=timeArr[cellArr[0]];
      var day=cellArr[1];
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
      $("#modal").modal('show');
    }
  });
  $("#x_button").on("click",function(){
    typeFlag=0;
    $("#modal").modal('hide');
  });
  $("#btn1").on("click",function(){
    if(typeFlag==1){
      reserve(Gtime, Gday, locFlag, 1);

      $("#modal").modal('hide');
    }else if(typeFlag==2){

    }
  });
  $("#btn2").on("click",function(){
    if(typeFlag==1){
      reserve(Gtime, Gday, locFlag, 2);
      $("#modal").modal('hide');
    }else if(typeFlag==2){

    }
  });
});
function cancel(cellId){
  var user=getCookie("final_userIdx");
  $("#"+cellId).text("").css("background","none");
  $.get("/data/deleteReserve/"+user+"/"+cellId,function(data){
    //TODO 제대로 지워졌는지 확인 response
    getCurrent();
  });

}
function getCurrent(){
  var user=getCookie("final_userIdx");
  $.get("/data/getPersonal/"+user,function(data){
    //data 로 이미 신청한 내역을 가져온다.
    //날짜로 저장된 것의 경우 현재 주의 범위에 해당되면 가져온다.
    //요일로 저장된 것의 경우 다 가져온다.
    //세로로는 0부터 13까지 가로는 1부터 5까지
    //화면에 채워준다
    var d=new Date();
    var json=JSON.parse(data);
    for(var i=0;i<json.length;i++){
      if(json[i]['r_date']!="null"&&json[i]['r_date']<(d.getFullYear()+""+pad((d.getMonth()+1))+""+pad(d.getDate()))){
        continue; //지난 일이면
      }
      var id=json[i]['r_cell'];
      if(locFlag==json[i]['r_loc']){
        if(json[i]['r_date']=="null"){ //요일로 반복
          $("#"+id).text("매 주");
        }else{
          $("#"+id).text("한 주");
        }
        $("#"+id).css("background","#fbd734");
        $("#"+id).append('<div class="x_btn" onclick="cancel(\''+id+'\')"><i style="color:white;" class="glyphicon glyphicon-remove"></i></div>');
      }
    }
  });
}
function reserve(time, day, loc, type){
  var user=getCookie("final_userIdx");
  var date="null";
  var week="null";
  var d=new Date();
  //type은 한주(1)인지 매주(2)인지 알려주는 인자로
  if(type==1){ //한주면 날짜를 넣는다.
    if(d.getDay()>day){ //이미 지낫을 경우에는 다음 주로 예약을 잡는다.
      d.setDate(d.getDate()+7-(d.getDay()-day));
      date=d.getFullYear()+""+pad(d.getMonth()+1)+""+pad(d.getDate());
    }else{ //아직 안지낫으면 이번 주로 예약을 잡는다.
      d.setDate(d.getDate()+(day-d.getDay()));
      date=d.getFullYear()+""+pad((d.getMonth()+1))+""+pad(d.getDate());
    }
  }else{ //매주면 요일을 넣는다.
    week=day;
  }
  $.get("/data/addReserve/"+user+"/"+date+"/"+week+"/"+time+"/"+loc+"/"+selectedCell,function(data){
    //파라미터로 예약할 시간 요일, 회원번호를 보낸다.
    //성공이면
    getCurrent();
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
