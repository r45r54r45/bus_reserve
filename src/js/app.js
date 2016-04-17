"use strict"
var app=angular.module("app",["firebase"]);
app.factory("Ref",
function() {
  var ref = new Firebase("https://sizzling-inferno-3457.firebaseio.com");
  return ref;
}).filter('toArray', function () {
  return function (obj, addKey) {
    if (!(obj instanceof Object)) {
      return obj;
    }

    if ( addKey === false ) {
      return Object.values(obj);
    } else {
      return Object.keys(obj).map(function (key) {
        return Object.defineProperty(obj[key], '$key', { enumerable: false, value: key});
      });
    }
  };
});
app
.controller("deliveryMain",function($scope){
  var BA=new BannerAdmin();
})
.controller("storeListPage",["$scope","Ref","$firebaseArray",function($scope,Ref,$firebaseArray){
  var target="";
  switch (location.search.split('target=')[1]) {
    case "chicken":
    target="치킨";
    //아직 계약해야할 업체들
    $scope.moreStores=[
      {"store":"멕시카나","menu_img":"",
      "tel":"0328319266"},
      {"store":"강호동치킨","menu_img":"",
      "tel":"0328146780"},
      {"store":"호식이두마리치킨","menu_img":"",
      "tel":"0328582332"},
      {"store":"교촌치킨","menu_img":"/src/img/KCmenu.jpeg",
      "tel":"0328580060"},
      {"store":"깻잎치킨","menu_img":"",
      "tel":"0328345466"},
      {"store":"BBQ치킨","menu_img":"/src/img/BBQmenu.png",
      "tel":"0328589200"},
      {"store":"맛있는 파닭","menu_img":"",
      "tel":"0328357441"},
      {"store":"디디치킨","menu_img":"/src/img/DDChicken.png",
      "tel":"0328588105"},
      {"store":"굽네치킨","menu_img":"",
      "tel":"0328338294"}
    ];
    break;
    case "fastfood":
    target="패스트푸드";
    $scope.moreStores=[
      {"store":"버거킹","menu_img":"",
      "tel":"15990505"},
      {"store":"롯데리아","menu_img":"",
      "tel":"0328581777"}
    ];
    break;
    case "jokbal":
    target="족발";
    $scope.moreStores=[
      {"store":"원조압구정보쌈족발","menu_img":"",
      "tel":"0328125858"},
      {"store":"원할머니보쌈","menu_img":"",
      "tel":"0328580030"},
      {"store":"장충동보쌈","menu_img":"",
      "tel":"0328347521"},
      {"store":"할매보쌈","menu_img":"",
      "tel":"0328130003"}
    ];
    break;
    case "pizza":
    target="피자";
    $scope.moreStores=[
      {"store":"원조압구정보쌈족발","menu_img":"",
      "tel":"0328125858"},
      {"store":"원할머니보쌈","menu_img":"",
      "tel":"0328580030"},
      {"store":"장충동보쌈","menu_img":"",
      "tel":"0328347521"},
      {"store":"할매보쌈","menu_img":"",
      "tel":"0328130003"}
    ];
    break;
    case "chinese":
    target="중국집";
    break;
    case "korean":
    target="한식";
    break;
  }
  $scope.stores=$firebaseArray(Ref.child("store").orderByChild("type").equalTo(target));
  $scope.stores.$loaded(function(){
    $scope.afterPaid=true;
  });
  $scope.moveToStore=function(store,backPage){
    parent.set_page_title(store);
    location.href='/main/store_page?store='+encodeURI(store)+'&backPage='+encodeURI(backPage);
  }
  $scope.openMenu=function(menu_img1,store){
    if(menu_img1===""){
      alert("본 업체는 메뉴 준비중입니다");
      return;
    }
    if(store!==""){
      var data={"time":Firebase.ServerValue.TIMESTAMP};
      Ref.child("advertisement").child(store).child("menu").child("click").push(data);
    }
    $scope.menuImg=menu_img1;
    $('#menuModal').modal('show');
  }
  $scope.phone=function(store){
    var data={"time":Firebase.ServerValue.TIMESTAMP};
    Ref.child("advertisement").child(store).child("phone").push(data);
  }

}]);
