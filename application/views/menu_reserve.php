<div class="container-fluid">
  <div class="row center-align" id="home-top-button">
    <div id="home" class="btn-group" data-toggle="buttons">
      <label class="btn btn-primary active" style="border-bottom-left-radius: 16px;
      border-top-left-radius: 16px;" id="option1">
      <input type="radio" name="options"  autocomplete="off"> 세미나실
    </label>
    <label class="btn btn-primary" style="border-bottom-right-radius: 16px;
    border-top-right-radius: 16px;" id="option2">
      <input type="radio" name="options"  autocomplete="off"> 열람실
    </label>

</div>
</div>
</div>
<iframe id="frame" style="  margin:50px 0px 0px;
  bottom: 0;
  top: 0;
  left:0;
  position: absolute;
  width: 400px;" src="https://yicdorm.yonsei.ac.kr/room.asp" frameBorder="0">
</iframe>

<script>
$(function(){
  $("#frame").css("height",$(window).height()-50+"px");
  $("#option1").on("click",function(){
    $("#frame").attr("src","https://yicdorm.yonsei.ac.kr/room.asp");
  });
  $("#option2").on("click",function(){
    $("#frame").attr("src","https://yicdorm.yonsei.ac.kr/study.asp");
  });
});
</script>
