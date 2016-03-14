<div class="container-fluid">
  <div class="row center-align" id="home-top-button">
    <div id="home" class="btn-group" data-toggle="buttons">
      <label class="btn btn-primary active" style="border-bottom-left-radius: 16px;
      border-top-left-radius: 16px;" id="option1">
      <input type="radio" name="options"  autocomplete="off"> 1학사
    </label>
    <label class="btn btn-primary" style="" id="option2">
      <input type="radio" name="options"  autocomplete="off"> 2학사
    </label>
    <label class="btn btn-primary" style="border-bottom-right-radius: 16px;
    border-top-right-radius: 16px;" id="option3">
    <input type="radio" name="options"  autocomplete="off"> 언기도
  </label>
</div>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="card_holder">

      <!-- morning card-->
      <div class="card" style="height:100px; margin-bottom:10px; position:relative">
        <div style="height: 100%;
        width: 4em; border-right:2px solid #fcd90d; text-align:right;padding-right:5px;">
        <div><span style="font-size: 15px;">아침</span></div>
        <div style="margin-top: -5px;"><span style="font-size: 10px;">breakfast</span></div>
      </div>
      <div style="position: absolute;
      top: 4px;
      left: 0;
      width: 100%;
      height: 92px;
      padding-left: 4em;
      margin-left:10px;
      padding-right: 18px;">
    <div class="row" style="margin:0;">
      <div class="col-xs-6" style="max-height:92px;"><span id="morning1"></span></div>
      <div class="col-xs-6" style="max-height:92px;"><span id="morning2"></span></div>
    </div>
</div>
</div>

<!-- lunch card-->
<div class="card" style="height:100px; margin-bottom:10px; position:relative">
  <div style="height: 100%;
  width: 4em; border-right:2px solid #fcd90d; text-align:right;padding-right:5px;">
  <div><span style="font-size: 15px;">점심</span></div>
  <div style="margin-top: -5px;"><span style="font-size: 10px;">lunch</span></div>
</div>
<div style="position: absolute;
top: 4px;
left: 0;
width: 100%;
height: 92px;
padding-left: 4em;
margin-left:10px;
padding-right: 18px;">
<div class="row" style="margin:0;">
<div class="col-xs-6" style="max-height:92px;"><span id="lunch1"></span></div>
<div class="col-xs-6" style="max-height:92px;"><span id="lunch2"></span></div>
</div>
</div>
</div>

<!-- dinner card-->
<div class="card" style="height:100px; position:relative">
  <div style="height: 100%;
  width: 4em; border-right:2px solid #fcd90d; text-align:right;padding-right:5px;">
  <div><span style="font-size: 15px;">저녁</span></div>
  <div style="margin-top: -5px;"><span style="font-size: 10px;">dinner</span></div>
</div>
<div style="position: absolute;
top: 4px;
left: 0;
width: 100%;
height: 92px;
padding-left: 4em;
margin-left:10px;
padding-right: 18px;">
<div class="row" style="margin:0;">
<div class="col-xs-6" style="max-height:92px;"><span id="dinner1"></span></div>
<div class="col-xs-6" style="max-height:92px;"><span id="dinner2"></span></div>
</div>
</div>
</div>
<div class="col-xs-12" style="text-align:right">
  <span style="font-size:8px;">*바나나는 월요일 새벽에 주간 메뉴를 받기 때문에 월요일 메뉴 업데이트가 조금 늦어질 수 있습니다. 메뉴 업데이트가 안 돼 있으면 여기서 확인해주세요. <a href="https://coop.yonsei.ac.kr:5013/Menu/Kukje.asp" target='_blank'>메뉴 확인</a></span>
</div>
<div style="height:200px;"></div>


</div>
</div>
</div>
<!-- end of container -->
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content" style="width:90%;margin:20px auto;">
  <!-- <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">전체 시간표</h4>
  </div> -->
  <div class="modal-body" style="padding:0">
    <img  style="    width: 100%;" src="/src/img/yplaza314.png" onclick="$('#myModal').modal('hide')">
  </div>
  <!-- <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div> -->
</div>
</div>
</div>
<script>

var type=0;
$(function(){
  getFood();
  $("#option1").on("click",function(){
    type=0;
    getFood();
  });
  $("#option2").on("click",function(){
    type=1;
    getFood();
  });
  $("#option3").on("click",function(){
    $('#myModal').modal('show');
    // type=2;
    // getFood();
  });
});
function getFood(){
	$.get("/data/food", function( data ) {
		  var one=data[type]; //1학사
      try{
      $("#morning1").text(one[0][0]);
      $("#morning2").text(one[0][1]);
      $("#lunch1").text(one[1][0]);
      $("#lunch2").text(one[1][1]);
      $("#dinner1").text(one[2][0]);
      $("#dinner2").text(one[2][1]);
    }catch(err){
      $("#morning1").text("");
      $("#morning2").text("");
      $("#lunch1").text("");
      $("#lunch2").text("");
      $("#dinner1").text("");
      $("#dinner2").text("");
      alert("서버로부터 문제가 발생했습니다.");
    }
	}, "json" );
}
</script>
