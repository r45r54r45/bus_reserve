<script>
function submit_form(){
  if($("input[name='id']").val()==''){
    alert("아이디를 입력해주세요");
    return;
  }
  $("#form").submit();
}
Dropzone.autoDiscover = false;
$(function(){
  var myDropzone1 = new Dropzone("#upload", { url:'/prints/file' , paramName: "userfile",addRemoveLinks:true,dictRemoveFile:"파일 삭제"});
});
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
              <form id="form3" method="post" action="/prints/file" enctype="multipart/form-data">
              <div id="upload" class="dropzone">
                  <div class="dz-default dz-message"><span>프로필 사진은 한 개만 업로드 할 수 있습니다<br>( 클릭 또는 파일을 드래그 해주세요! )</span></div>
                </div>
            </form>
            </div>
          </div>
          <div class="col-xs-12" role="alert">
            <span class="glyphicon glyphicon-info-sign" style="margin-left:10px;vertical-align: middle"></span>
            <span class="small-font" style="font-size:12px;">
              한 파일당 최대 15mb까지 업로드 가능합니다.
            </span>
          </div>
          <div class="col-xs-12 side-padding-20">
            <a onclick="$('#form3').submit()">
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
