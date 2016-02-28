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
<div class="col-xs-6" style="max-height:92px;"><span id="morning1"></span></div>
<div class="col-xs-6" style="max-height:92px;"><span id="morning2"></span></div>
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
<div class="col-xs-6" style="max-height:92px;"><span id="morning1"></span></div>
<div class="col-xs-6" style="max-height:92px;"><span id="morning2"></span></div>
</div>
</div>
</div>

</div>
</div>
</div>
<!-- end of container -->
</div>
<script>
var type=0;
$(function(){
  getFood();
});
function getFood(){
	$.get("/data/food", function( data ) {
		  var one=data[type]; //1학사
      $("#morning1").text(one[0][0]);
      $("#morning2").text(one[0][1]);
      $("#lunch1").text(one[1][0]);
      $("#lunch2").text(one[1][1]);
      $("#dinner1").text(one[2][0]);
      $("#dinner1").text(one[2][1]);
	}, "json" );
}
</script>
