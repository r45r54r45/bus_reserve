<div class="container">
  <div class="row" style="margin-top:20px;">
    <div class="col-xs-12">
      <div style="width:30vw; height:30vw; height:100px; width:100px; margin:0 auto;">
        <img src="/src/img/profile.png" style="height:auto;" class="img img-responsive img-rounded">
      </div>
    </div>
    <div class="col-xs-12" style="margin-top:10px; text-align:center;">
      <span style="font-size:14px; font-weight:700;">이재하</span><br>
      <span style="font-size:11px;" id="user_level">원숭이</span>
      <span style="font-size:11px;"> 회원</span>
    </div>
  </div>
  <div class="row" style="margin-top:20px;">
    <div class="col-xs-4" style="text-align:center;">
      <span style="font-size:18px;font-weight: 700; color:#FBD734;">281</span><br>
      <span style="font-size:11px;">RANK</span>
    </div>
    <div class="col-xs-4" style="text-align:center;">
      <span style="font-size:18px;font-weight: 700; color:#FBD734;">3245</span><br>
      <span style="font-size:11px;">BANANA</span>
    </div>
    <div class="col-xs-4" style="text-align:center;">
      <span style="font-size:18px; font-weight: 700; color:#FBD734;">0</span><br>
      <span style="font-size:11px;">GORILLA</span>
    </div>
  </div>
  <div class="row" style="margin-top:20px; border-top:1px solid #D3D3D3;">
    <?
    $arr=array("김우현","김우현","김우현","4","5","6");
    // $arr=array(
      // {'name':'김우현','banana':23425},{'name':'김우현','banana':23425},{'name':'김우현','banana':23425},{'name':'김우현','banana':23425},{'name':'김우현','banana':23425},{'name':'김우현','banana':'23425'});
     ?>
    <? for($i=0; $i<6; $i++){ ?>
    <div class="col-xs-12 ranking_line">
      <div>
        <span><?=$i+1?></span>
      </div>
      <div>
        <span><?=$arr[$i]?></span>
      </div>
      <div>
        <img src="/src/img/banana.png" style="height:20px;">
        <span><?=$arr[$i]?></span>
      </div>
    </div>
    <? }?>
    <!-- TODO 내가 순위권에 포함 되어있을 때와 아닐때-->
  </div>
</div>
<style>
.ranking_line{
  height:40px; border-bottom: 1px solid #D3D3D3;
}
.ranking_line>div{
  display: inline-block;
}
.ranking_line>div>span{
  line-height:40px;
}
.ranking_line>div:nth-child(2){
  margin-left:20px;
}
.ranking_line>div:nth-child(3){
  float:right;
}
</style>
