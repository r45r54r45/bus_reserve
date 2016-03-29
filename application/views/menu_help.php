<div class="container-fluid">
  <div class="row center-align" id="home-top-button">
    <div id="home" class="btn-group" data-toggle="buttons">
      <label class="btn btn-primary active" style="border-bottom-left-radius: 16px;
      border-top-left-radius: 16px;" id="option1">
      <input type="radio" name="options"  autocomplete="off"> 문제 제보
    </label>
    <label class="btn btn-primary" style="border-bottom-right-radius: 16px;
    border-top-right-radius: 16px;" id="option2">
    <input type="radio" name="options"  autocomplete="off" ><span >문의<span>
  </label>
</div>
</div>

<div class="row" style="margin-top:15px;">
  <div class="col-xs-12">
    <textarea style="height:100px; width:100%; font-size:12px; resize:none;border: 1px solid rgba(70, 41, 43, .5);
    box-shadow: 0 1px 1px 1px rgba(0,0,0,0.2);
    border-radius: 3px;background-color: white; " placeholder="문제 제보 (핸드폰 번호를 써주셔야 추첨이 가능합니다.  그리고 연락처를 알려주셔야 도와드릴 수가 있어요 ㅠㅠㅠ 이메일도 됩니당~)"
     id="help_textarea" maxlength="1000"></textarea>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <span style="font-size:10px;" id="help_desc">* 문제 발견 시 제보 해주시면 추첨을 통해 기프트콘을 보내드립니다</span>
  </div>
</div>
<div class="row" style="margin-top: 30px;">
  <div class="col-xs-12">
    <img src="/src/img/send_btn.png" class="img-circle img img-responsive" style="    width: 80px;
    height: 80px; margin:0 auto; background: #46292b; " id="help_send_btn" onclick="send()">
  </div>
</div>

</div>
<script>
$(function(){
  $("#option1").on("click",function(){
    $("#option1").removeClass('active');
    $("#option2").addClass('active');
    $("#help_desc").text("* 문제 발견 시 제보 해주시면 추첨을 통해 기프트콘을 보내드립니다");
    $("textarea").attr("placeholder","문제 제보 (핸드폰 번호를 써주셔야 추첨이 가능합니다. 그리고 연락처를 알려주셔야 도와드릴 수가 있어요 ㅠㅠㅠ 이메일도 됩니당~)");

  });
  $("#option2").on("click",function(){
    $("#option2").removeClass('active');
    $("#option1").addClass('active');
    $("#help_desc").text("* 원하시는 추가 기능 및 서비스를 제보해주시면 추첨을 통해 기프트콘을 보내드립니다");
    $("textarea").attr("placeholder","문의 (핸드폰 번호를 써주셔야 추첨이 가능합니다.)");
  });
});
function send(){
var data=$("#help_textarea").val();
if(data==""){
  alert("내용을 입력해주세요");
  return;
}
$.get("/data/help?data="+data);
$("#help_textarea").val("");
alert("감사합니다.");
}
</script>
