<script>

</script>
<style>
  .black_circle {
    background: black;
    border-radius: 50%;
    width: 30px;
    height: 30px;
  }
  .storeWrapper {
    padding: 10px 0 10px 15px;
    border-bottom: 1px solid #D3D3D3;
    height: 50px;
    position: relative;
  }
  .one-line {
    display: inline-block;
  }
  .store-name {
    margin-left: 1.5em;
    margin-top: 5px;
    position: absolute;
    font-size: 14px;
  }
  .click-button {
    position: absolute;
    width: 50px;
    height: 50px;
    padding: 10px;
    top: 0;
  }
  /*.phone {
    right: 0;
  }*/
  .order {
    right: 0px;
    border-right: 2px solid #fcd90d;
  }
  .menu {
    right: 50px;
    border-right: 2px solid #fcd90d;
  }
  .click-button>a>img {
    height: 30px;
  }
  .click-button>img {
    height: 30px;
  }

</style>
<div class="container-fluid" ng-controller="storeListPage" ng-init="afterPaid=false; page='/main/storeList?target='+'<?=$_GET['target']?>'">
  <div class="alert alert-info" ng-show="!afterPaid">로딩중</div>
  <div class="row storeWrapper" ng-repeat="store in stores">
    <div class="black_circle one-line"></div>
    <span class="store-name">{{store.store}}</span>
    <div class="one-line click-button menu"><img class="img" src="/src/img/menu.png" ng-click="openMenu(store.menu_img,store.store)"></div>
    <div class="one-line click-button order">
      <img class="img" src="/src/img/banana.png" ng-click="openPaidModal($index)">
    </div>
    <!-- <div class="one-line click-button phone">
      <a ng-click="phone(store.store);" href="tel:{{store.tel}}"><img class="img" src="/src/img/call.png"></a>
    </div> -->
    <div class="modal fade" id="orderPaidModal_{{$index}}" style="width: 90%;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="margin:50px auto">
          <div class="modal-body temp" style='padding:0'>
            <div class="row">
              <div class="col-xs-12 center">
                <div class="font-12"><b>원숭의민족</b></div>
                <div class="font-12 top-margin-10 li_g">원숭의민족은 전화할 필요없이 클릭 몇 번으로<br/>바로 주문하는 서비스 입니다. </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-6 center yel font-12" ng-click="moveToStore(store.store,page)">
                원숭이배달
              </div>
              <a ng-click="phone(store.store);" href="tel:{{store.tel}}">
              <div class="col-xs-6 center bla font-12">
                전화하기
              </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- modal for menu end -->
  </div>
  <!-- 앞으로 추가해야할 곳들 -->
  <div class="row storeWrapper" ng-show="afterPaid"  ng-repeat="store in moreStores">
    <div class="black_circle one-line"></div>
    <span class="store-name">{{store.store}}</span>
    <div class="one-line click-button menu"><img class="img" src="/src/img/menu.png" ng-click="openMenu(store.menu_img,'')"></div>
    <div class="one-line click-button order">
      <img class="img" src="/src/img/banana.png" ng-click="openUnpaidModal($index)">
    </div>
    <div class="modal fade" id="orderUnpaidModal_{{$index}}" style="width: 90%;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="margin:50px auto">
          <div class="modal-body temp" style='padding:0'>
            <div class="row">
              <div class="col-xs-12 center">
                <div class="font-12"><b>원숭의민족</b></div>
                <div class="font-12 top-margin-10 li_g">원숭의민족은 전화할 필요없이 클릭 몇 번으로<br/>바로 주문하는 서비스 입니다. </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-6 center yel font-12" onclick="alert('본 업체는 원숭의민족 계약 준비중입니다.'); ">
                원숭이배달
              </div>
              <a href="tel:{{store.tel}}">
              <div class="col-xs-6 center bla font-12">
                전화하기
              </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- modal for menu end -->
  </div>

  <!-- modal for menu -->
  <div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="width:90%;margin:20px auto">
        <div class="modal-body" style="padding:0;">
          <img style="width: 100%;" ng-src="{{menuImg}}" onclick="$('#menuModal').modal('hide')">
        </div>
      </div>
    </div>
  </div>
  <!-- modal for menu end -->
  <!-- modal for menu -->
  <div class="modal fade" id="orderModal" style="width: 90%;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="margin:50px auto">
        <div class="modal-body temp" style='padding:0'>
          <div class="row">
            <div class="col-xs-12 center">
              <div class="font-12"><b>원숭의민족</b></div>
              <div class="font-12 top-margin-10 li_g">원숭의민족은 전화할 필요없이 클릭 몇 번으로<br/>바로 주문하는 서비스 입니다. </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6 center yel font-12">
              원숭이배달
            </div>
            <div class="col-xs-6 center bla font-12">
              전화하기
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- modal for menu end -->

</div>
<style>
.center{
  text-align: center;
  padding:20px 0;
}
.temp{
  background: white;
  border:1px solid grey;
  border-radius: 5px;
  overflow: hidden;
}
.yel{
  color:white;
  background: #FCD90D;
}
.bla{
  color:white;
  background:#383535;
}
.font-12{
  font-size:12px;
}
.top-margin-10{
  margin-top: 10px;
}
.li_g{
  color:#6F6D6D;
}
</style>
