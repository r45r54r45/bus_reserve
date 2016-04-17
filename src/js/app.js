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
  // $scope.bannerUrl=BA.selectedBannerUrl();
})
.controller("chicken",["$scope","Ref","$firebaseArray",function($scope,Ref,$firebaseArray){
  $scope.stores=$firebaseArray(Ref.child("store").orderByChild("type").equalTo("치킨"));
  $scope.stores.$loaded(function(){
    $scope.afterPaid=true;
  });
  $scope.moveToStore=function(store){
    parent.set_page_title(store);
    location.href='/main/store_page?store='+encodeURI(store);
  }
  $scope.openMenu=function(menu_img1,store){
    if(menu_img1===""){
      alert("본 업체는 메뉴 준비중입니다");
      return;
    }
    var data={"time":Firebase.ServerValue.TIMESTAMP};
    Ref.child("advertisement").child(store).child("menu").child("click").push(data);
    $scope.menuImg=menu_img1;
    $('#menuModal').modal('show');
  }

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
}]);
