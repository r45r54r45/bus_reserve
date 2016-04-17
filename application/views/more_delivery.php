
<div class="container-fluid" ng-controller="deliveryMain">
  <div class="row" style="margin-top:20px;">
    <div class="col-xs-4">
      <div class="deli_circle" onclick="parent.set_page_title('CHICKEN');location.href='/main/more_delivery_chicken';">
        <img src="/src/img/food-4.svg" class="img img-responsive">
        <span>치킨</span>
      </div>
    </div>
    <div class="col-xs-4">
      <div class="deli_circle">
        <img src="/src/img/food-2.svg" class="img img-responsive">
        <span>패스트푸드</span>
      </div>
    </div>
    <div class="col-xs-4">
      <div class="deli_circle">
        <img src="/src/img/food-3.svg" class="img img-responsive">
        <span>족발</span>
      </div>
    </div>
  </div>
  <div class="row" style="margin-top:20px;">
    <div class="col-xs-4">
      <div class="deli_circle">
        <img src="/src/img/food-1.svg" class="img img-responsive">
        <span>피자</span>
      </div>
    </div>
    <div class="col-xs-4">
      <div class="deli_circle">
        <img src="/src/img/food.svg" class="img img-responsive">
        <span>중국집</span>
      </div>
    </div>
    <div class="col-xs-4">
      <div class="deli_circle">
        <img src="/src/img/animal.svg" class="img img-responsive">
        <span>오리</span>
      </div>
    </div>
  </div>
  <div class="row" style="margin-top:20px; height:300px; background:#D3D3D3; padding:10px;">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">

      <img class="banner">
    </div>
  </div>

  <!-- Left and right controls -->
  <!-- <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a> -->
</div>
  </div>
</div>
<style>
.deli_circle{
  width:80px;
  height:80px;
  border-radius: 50%;
  border:1px solid #46292B;
  margin:0 auto;
  text-align: center;
}
.img{
  margin-top: 18px;
  height: 30px;
}
span{
  font-size:11px;
  color:#46292B;
}
.item{
  /*max-height:280px;*/
}
.item>img{
  width:100%;
}
</style>
