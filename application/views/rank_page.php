<div class="container">
  <div class="row" style="margin-top:20px;">
    <div class="col-xs-12">
      <div style="width:30vw; height:30vw; height:100px; width:100px; margin:0 auto;">
        <img src="/src/img/profile.png" style="height:auto;" class="img img-responsive img-rounded">
      </div>
    </div>
    <div class="col-xs-12" style="margin-top:10px; text-align:center;">
      <span style="font-size:14px; font-weight:700;" id="myName"></span><br>
      <span style="font-size:11px;" id="myLevel"></span>
      <span style="font-size:11px;"> 회원</span>
    </div>
  </div>
  <div class="row" style="margin-top:10px;">
    <div class="col-xs-4" style="text-align:center;">
      <span style="font-size:18px;font-weight: 700; color:#FBD734;" id="myRankTop"></span><br>
      <span style="font-size:10px;">RANK</span>
    </div>
    <div class="col-xs-4" style="text-align:center;">
      <span style="font-size:18px;font-weight: 700; color:#FBD734;" id="myBananaTop"></span><br>
      <span style="font-size:10px;">BANANA</span>
    </div>
    <div class="col-xs-4" style="text-align:center;">
      <span style="font-size:18px; font-weight: 700; color:#FBD734;">0</span><br>
      <span style="font-size:10px;">GORILLA</span>
    </div>
  </div>
  <div class="row center-align" id="home-top-button">
    <div id="home" class="btn-group" data-toggle="buttons">
      <label class="btn btn-primary active" style="border-bottom-left-radius: 16px;
      border-top-left-radius: 16px;" id="option1">
      <input type="radio" name="options"  autocomplete="off"> 전체
    </label>
    <label class="btn btn-primary"  style="border-bottom-right-radius: 16px;
    border-top-right-radius: 16px;" id="option2" >
    <input type="radio" name="options"  autocomplete="off"> 학과
  </label>
</div>
</div>
<div class="row" style="margin-top:20px; border-top:1px solid #D3D3D3;">
  <? for($i=0; $i<5; $i++){ ?>
    <div class="col-xs-12 ranking_line">
      <div>
        <span  style="font-size:9px;"><?=$i+1?></span>
      </div>
      <div>
        <span id="name_<?=$i?>"  style="font-size:10px;"></span>
      </div>
      <div>
        <img src="/src/img/banana.png" style="height:20px;">
        <span id="banana_<?=$i?>" style="font-size:9px;"></span>
      </div>
    </div>
    <? }?>
    <div class="col-xs-12 ranking_line" style="background-color: #fef6d1;">
      <div>
        <span style="font-size:9px;" id="myRank"></span>
      </div>
      <div>
        <span style="font-size:10px;">ME</span>
      </div>
      <div>
        <img src="/src/img/banana.png" style="height:20px;">
        <span id="myBanana" style="font-size:9px;"></span>
      </div>
    </div>
    <!-- TODO 내가 순위권에 포함 되어있을 때와 아닐때- 상관없이 일단 ㄱ-->
  </div>
</div>
<style>
.ranking_line{
  height:40px; border-bottom: 1px solid #D3D3D3;
  position: relative;
}
.ranking_line>div{
  display: inline-block;

}
.ranking_line>div>span{
  line-height:40px;
}
.ranking_line>div:nth-child(1){
  /*margin-left:20px;*/
  position: absolute;
  top:0px;
  left:15px;
}
.ranking_line>div:nth-child(2){
  /*margin-left:20px;*/
  position: absolute;
  top:0px;
  left:40px;
}
.ranking_line>div:nth-child(3){
  position: absolute;
  top:0px;
  right:15px;
}
</style>
<script>
//TODO name, level, rank, banana, gorilla
// 1~5 my level
// search everytime?
var user=getCookie("final_userIdx");
$(function(){
  $.get("/data/personalInformation/"+user,function(data){
    console.log(data);
    var json=JSON.parse(data);
    var rank=json['rank'];
    var name=json['name'];
    if(name=="")name="ME";
    var banana=json['banana'];
    var level=json['level'];
    $("#myRank").text(rank);
    $("#myName").text(name);
    $("#myBananaTop").text(banana);
    $("#myBanana").text(banana);
    $("#myLevel").text(level);
    $("#myRankTop").text(rank);
    $("#myNameTop").text(name);
  });
  $.get("/data/rank_page",function(data){
    var json=JSON.parse(data);
    for(var i=0; i<json.length; i++){
      // if(json[i]['name']!=""){
        // $("#name_"+i).text(json[i]['name']);
      // }else
      if(json[i]['id']!=null){
        $("#name_"+i).text(json[i]['id']);
      }else{
        $("#name_"+i).text("아기원숭이");
      }
      $("#banana_"+i).text(json[i]['banana']);
    }
  });
  $("#option1").on("click",function(){

  });
  $("#option2").on("click",function(){
    alert("준비중입니다!");
  });
});
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
