<style>
.row>.hidden-xs{
  border-right: 1px solid #D3D3D3;
}

.table-wrapper{
  border:1px solid black;
  position: relative;
  z-index: 1;
  margin-top:40px;
  border-radius: 10px;
}
div[role="footer"]{
  position: fixed;
  bottom:0%;
  left:0;
  width: 100%;
  margin-bottom: 10px;
  color:#D3D3D3;
}
.page-desc{
  color:#D3D3D3;
  font-weight: 300;
  font-size:12px;
}
.table-title{
  position: absolute;
  top:0;
  left:50%;
  margin-top:-14px;
  margin-left: -100px;
  background: white;
  z-index: 2;
  width:200px;
  text-align: center;
}
.table{
  margin-top: 20px;

}
table{
  padding:0 20px;
}
.table-1{
  width:70%;
  padding-left: 20px !important;
}
.link-row{
  height:60px;
  background:#D3D3D3;
  padding: 10px;

}
.img{
  height:40px;
  margin: 0 auto;
}
.table-2{
  width:30%;
  padding-right: 20px !important;
  text-align: center;
}
.page-title{
  margin:20px 0px 10px;
}
td:nth-child(1){
  padding-left: 20px !important;
}
td:nth-child(2){
  text-align: center;
  padding-right: 20px !important;
}
iframe{
  width:100%;
  height:500px;
}
</style>
<script>
$(function(){
  recent_refresh();
  setInterval(recent_refresh,5000);
});
function search_func(){
    $.ajax({
      url: "http://freshman.yonsei.ac.kr/prints/search?word="+$("input[name='search']").val(),
      cache: false
    })
    .done(function( html ) {
      $( "#table_body" ).html( html );
    });
}
function recent_refresh(){
  $.ajax({
    url: "http://freshman.yonsei.ac.kr/prints/recent",
    cache: false
  })
  .done(function( html ) {
    $( "#recent_body" ).html( html );
  });
}
</script>
<body>

  <div class="container">

    <!-- 다른 사람들의 실시간 파일 정보 -->
    <div class="row">
      <div class="col-xs-12 span-center page-title">
        <p class="extra-font"><img src="http://newton.kias.re.kr/~kylee/public_html/yonsei.gif" style="height:40px;margin-right:10px;" ><a href="http://freshman.yonsei.ac.kr/prints">연세 프린트 허브</a></p>
        <p class="page-desc small-font">네이버 메일로 보내고 받고 할 필요없이 모바일이든 데스크탑이든 노트북이든 편하고 빠르게 파일을 보관, 인쇄하세요.</p>
      </div>
    </div>
  </div>
    <div class="container-fluid">
    <div class="link-row row hidden-xs">
      <div class="col-sm-6 span-center">
        <a href="http://naver.com" ><img class="img img-responsive" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/23/Naver_Logotype.svg/520px-Naver_Logotype.svg.png"></a>

      </div>
      <div class="col-sm-6 span-center">
        <a href="http://yscec.yonsei.ac.kr" ><img class="img img-responsive"  src="http://yscec.yonsei.ac.kr/theme/image.php/creativeband/theme/1454031738/login_logo"></a>
      </div>
    </div>
    <div class="row">
      <div style="margin-top:20px;" class="hidden-xs col-sm-6">
        <div class="span-center">
          <span class="big-font">다른 사람들은?</span>
        </div>
        <div class="table-wrapper">
          <div class="table-title">
            <span class="normal-font">실시간 파일 이용</span>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th class="table-1">파일명</th>
                <th class="table-2">다운로드</th>
              </tr>
            </thead>
            <tbody id="recent_body">

            </tbody>
          </table>
        </div>
        <div class="table-wrapper">
          <div class="table-title">
            <span class="normal-font">빠른 검색</span>
          </div>
          <div style="margin-top:30px;" class="center side-padding-20 form-group" style="padding-top:10px;">
            <div class="full-width input-group">
              <input name="search" class="form-control" type="text" placeholder="검색어" onkeydown=" " onkeyup="search_func()"  maxlength="100">
            </div>
          </div>
          <table style="margin-top:-15px;" class="table">
            <thead>
              <tr>
                <th class="table-1">파일명</th>
                <th class="table-2">다운로드</th>
              </tr>
            </thead>
            <tbody  id="table_body">

            </tbody>
          </table>
        </div>


      </div>
      <!-- 로그인창 -->
      <div class="col-xs-12 col-sm-6">
        <iframe src="/prints/login" frameborder="0">
        </iframe>
      </div>
    </div><!-- row -->
    <div class="row" role="footer">
      <div class="col-xs-12 span-center">
        <span class="small-font">made by cocoding</span>
      </div>
    </div>
  </div><!-- container -->

</body>
