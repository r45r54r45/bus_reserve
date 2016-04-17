var app=angular.module("app",[]);
app.controller("deliveryMain",function($scope){
  var BA=new BannerAdmin();
  $scope.bannerUrl=BA.selectedBannerUrl();
});
