<?
$user=$_GET['id'];
?>
<script>
Dropzone.autoDiscover = false;
$(function(){
  var myDropzone1 = new Dropzone("#upload", { url:'/prints/file?id=<?=$user?>' , paramName: "userfile",dictRemoveFile:"파일 삭제"});
  vault_refresh();
  setInterval(vault_refresh,3000);
});
function vault_refresh(){
  $.ajax({
    url: "http://freshman.yonsei.ac.kr/prints/vault_refresh?id=<?=$user?>",
    cache: false
  })
  .done(function( html ) {
    $( "#table_body" ).html( html );
  });
}
function delete1(data){
  $(".loading").css("display","");
  $.ajax({
    url: "http://freshman.yonsei.ac.kr/prints/delete1?num="+data,
    cache: false
  })
  .done(function( html ) {
    $("#row_"+data).remove();
    $(".loading").css("display","none");
  });
}
</script>
<body>
  <div class="container-fluid " style="margin-top:20px;">
    <div class="row ">
      <div class="col-xs-12 span-center">
        <span class="big-font">파일함<span> <span style="color: rgb(88, 68, 199); cursor:pointer" class="glyphicon glyphicon-refresh" onclick="vault_refresh()"></span>
      </div>
    </div>
    <div class="row" style="position:relative;z-index:1;">
      <div class="loading" style="display:none;">
        <img src="http://sierrafire.cr.usgs.gov/images/loading.gif" style="width:100%">
      </div>
      <div class="col-xs-12">
        <table class="table table-striped">
          <tbody id="table_body">

          </tbody>
        </table>
      </div>
    </div>
  </div>
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
                  <div class="dz-default dz-message"><span style="color:#D3D3D3;">Drag/Drop도 가능</span></div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-xs-12" role="alert">
            <span class="glyphicon glyphicon-info-sign" style="margin-left:10px;vertical-align: middle"></span>
            <span class="small-font" style="font-size:12px;">
              한 파일당 최대 10mb까지 업로드 가능합니다.
            </span>
          </div>
        </div>
      </div>
    </div>

  </body>
