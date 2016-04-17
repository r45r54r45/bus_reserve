var ref = new Firebase("https://sizzling-inferno-3457.firebaseio.com/");
// order class
var Order=function(companyName){
  if(!companyName)throw new Error("plz fill in company name");
  this.companyName=companyName;
  this.order=[];
  this.dest;
  Order.prototype.makeOrder= function(menuName,option,price){
    var menuData={name:menuName,option:option,price:price};
    this.order.push(menuData);
  }
  Order.prototype.setDest= function(dest){
    this.dest=dest;
  }
  Order.prototype.setPay= function(pay){
    this.pay=pay;
  }
  Order.prototype.setSender= function(sender){
    this.sender=sender;
  }
  Order.prototype.sendOrder = function (){
    var totalPrice=0;
    for(var i in this.order){
      totalPrice+=this.order[i].price;
    }
    var data=$.extend($.extend($.extend($.extend($.extend(this.order,{"totalPrice":totalPrice}),{"time":Firebase.ServerValue.TIMESTAMP}),{dest:this.dest}),{sender:this.sender}),{pay:this.pay});
    ref.child("advertisement").child(this.companyName).child("order").push(data);
    ref.child("user/company").orderByChild("store").equalTo(this.companyName).once("value",function(snapshot){
      snapshot.forEach(function(snap){
        var to=snap.val().phone;
        var body="";
        console.log(this.order.order);
        (this.order.order).forEach(function(element, index, array){
          body+=element.name+" ("+element.option+")%0d";
        });
        body+="장소: "+this.order.order.dest+"%0d";
        body+="총 금액: "+totalPrice+"원%0d";
        body+="결제: "+this.order.order.pay+"%0d";
        body+="주문자: "+this.order.order.sender;
        $.get("http://api.coolsms.co.kr/sendmsg?user=r45r54r45&password=e34e43e34&type=LMS&from=01071097327&to="+to+"&text="+body);
      });
    });
  }
}
var Banner=function(companyName){
  if(!companyName)throw new Error("plz fill in company name");
  this.companyName=companyName;
  //seen plus
  var seen_time={"time":Firebase.ServerValue.TIMESTAMP};
  ref.child("advertisement").child(this.companyName).child("banner").child("seen").push(seen_time);
  $(".banner").bind("click",{company: this.companyName},function(event){
    var data={"time":Firebase.ServerValue.TIMESTAMP};
    ref.child("advertisement").child(event.data.company).child("banner").child("click").push(data);
  });
}
var Menu=function(companyName){
  if(!companyName)throw new Error("plz fill in company name");
  this.companyName=companyName;
  //seen plus
  $(".menu").bind("click",{company: this.companyName},function(event){
    var data={"time":Firebase.ServerValue.TIMESTAMP};
    ref.child("advertisement").child(event.data.company).child("menu").child("click").push(data);
  });
}

var BannerAdmin=function(){
  this.selectedBanner;
  this.selectedBannerKey;
  ref.child("banner").orderByChild("time").startAt(new Date().getTime()).once("value",function(snapshot){
    var i = 0;
    var rand = Math.floor(Math.random() * snapshot.numChildren());
    snapshot.forEach(function(snap){
      if (i == rand) {
        this.selectedBanner=snap.val();
        this.selectedBannerKey=snap.key();
      }
      i++;
    });
    new Banner(this.selectedBannerKey);
    // scope_banner.url=this.selectedBanner.url;
  });
  BannerAdmin.prototype.selectedBannerUrl=function(){
    console.log(this.selectedBanner);
    while(this.selectedBanner.url in window == false){

    }
    return this.selectedBanner.url;
  }
}
