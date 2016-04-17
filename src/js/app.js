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
.controller("chicken",["$scope","Ref",function($scope,Ref){
  Ref.child("store").orderByChild("type").equalTo("치킨").once("value",function(snapshot){
    $scope.st=[];
    snapshot.forEach(function(snap){
      $scope.st.push(snap.val());
    });
    console.log($scope.st);
  });
}]);
