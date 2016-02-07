<script>
function submit_form(){
  if($("input[name='id']").val()==''){
    alert("아이디를 입력해주세요");
    return;
  }
  $("#form6").submit();
}
</script>
<body>
  <div class="container-fluid alert alert-success" style="margin-top:20px;">
    <div class="row ">
      <div class="col-xs-12 span-center">
        <span class="big-font">로그인<span>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="col-xs-12 center side-padding-20 form-group" style="padding-top:10px;">
            <div class="full-width input-group">
              <form id="form6" action="/prints/login_func"  method="post">
              <input name="id" class="form-control" type="text" placeholder="아이디는 한글도 가능합니다"
              onkeydown="javascript: if (event.keyCode == 13) {submit_form();}" autofocus>
            </form>
            </div>
          </div>
          <div class="col-xs-12" role="alert">
            <span class="glyphicon glyphicon-info-sign" style="margin-left:10px;vertical-align: middle"></span>
            <span class="small-font" style="font-size:12px;">
              회원가입이 따로 없습니다. 각 아이디마다 파일함이 하나씩 배정됩니다.
            </span>
          </div>
          <div class="col-xs-12 side-padding-20">
            <a onclick="submit_form();">
              <!-- submitCheck() -->
              <div class=" submit_btn">
                <span>파일함으로 가기</span>
              </div>
            </div>
          </div>
        </div>
      </body>
