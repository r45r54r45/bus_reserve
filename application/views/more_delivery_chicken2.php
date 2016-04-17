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
  .phone {
    right: 0;
  }
  .order {
    right: 50px;
    border-right: 2px solid #fcd90d;
  }
  .menu {
    right: 100px;
    border-right: 2px solid #fcd90d;
  }
  .click-button>a>img {
    height: 30px;
  }
  .click-button>img {
    height: 30px;
  }

</style>
<div class="container-fluid" ng-controller="chicken" ng-init="afterPaid=false">
  <div class="row storeWrapper" ng-repeat="store in stores">
    <div class="black_circle one-line"></div>
    <span class="store-name">{{store.store}}</span>
    <div class="one-line click-button menu"><img class="img" src="/src/img/menu.png" ng-click="openMenu(store.menu_img)"></div>
    <div class="one-line click-button order">
      <img class="img" src="/src/img/banana.png" ng-click="moveToStore('{{store.store}}')">
    </div>
    <div class="one-line click-button phone">
      <a href="tel:{{store.tel}}"><img class="img" src="/src/img/call.png"></a>
    </div>
  </div>
  <!-- 앞으로 추가해야할 곳들 -->
  <div class="row storeWrapper" ng-show="afterPaid"  ng-repeat="store in moreStores">
    <div class="black_circle one-line"></div>
    <span class="store-name">{{store.store}}</span>
    <div class="one-line click-button menu"><img class="img" src="/src/img/menu.png" ng-click="openMenu(store.menu_img)"></div>
    <div class="one-line click-button order">
      <img class="img" src="/src/img/banana.png" onclick="alert('본 업체는 바나나퀵 계약 준비중입니다.')">
    </div>
    <div class="one-line click-button phone">
      <a href="tel:{{store.tel}}"><img class="img" src="/src/img/call.png"></a>
    </div>
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
</div>
