<script>
function submit_form(){
  if($("input[name='id']").val()==''){
    alert("아이디를 입력해주세요");
    return;
  }
  $("#form").submit();
}
</script>
<body>
  <div class="container-fluid alert alert-success" style="margin-top:20px;">
    <div class="row ">
      <div class="col-xs-12 span-center">
        <span class="big-font">업로드<span>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="col-xs-12 center side-padding-20 form-group" style="padding-top:10px;">
            <div class="full-width input-group">
              <form method="post" enctype="multipart/form-data">
              <input name="file" class="form-control" type="file" >
            </form>
            </div>
          </div>
          <div class="col-xs-12" role="alert">
            <span class="glyphicon glyphicon-info-sign" style="margin-left:10px;vertical-align: middle"></span>
            <span class="small-font" style="font-size:12px;">
              최대 15mb까지 업로드 가능합니다.
            </span>
          </div>
          <div class="col-xs-12 side-padding-20">
            <a onclick="alert('안된다니까')">
              <!-- submitCheck() -->
              <div class=" submit_btn">
                <span>업로드 하기</span>
              </div>
            </a>
            </div>
          </div>
        </div>
      </div>
        <div class="container-fluid " style="margin-top:20px;">
        <div class="row ">
          <div class="col-xs-12 span-center">
            <span class="big-font">파일함<span>
            </div>
          </div>
        <div class="row">
          <div class="col-xs-12">
            <table style="margin-top:-15px;" class="table">
              <thead>
                <tr>
                  <th class="table-1">파일명</th>
                  <th class="table-2">다운로드</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>파일명</td>
                  <td><a href="#"><span class="glyphicon glyphicon-download"></span></a></td>
                </tr>
              </tbody>
            </table>
            </div>
          </div>
      </body>
