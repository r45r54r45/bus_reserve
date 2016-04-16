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
  Order.prototype.sendOrder = function (){
    var totalPrice=0;
    for(var i in this.order){
      totalPrice+=this.order[i].price;
    }
    var data=$.extend($.extend($.extend(this.order,{"totalPrice":totalPrice}),{"time":Firebase.ServerValue.TIMESTAMP}),{dest:this.dest});
    ref.child("advertisement").child(this.companyName).child("order").push(data);
    ref.child("user/company").orderByChild("store").equalTo(this.companyName).once("value",function(snapshot){
      snapshot.forEach(function(snap){
        var to="01071097327";
        // snap.val().phone;
        var body="";
        this.order.forEach(function(element, index, array){
          body+=element.name+" ("+element.option+")%0d";
        });
        body+="장소: "+this.dest+"%0d";
        body+="총 금액: "+totalPrice+"원";
        $.get("http://api.coolsms.co.kr/sendmsg?user=r45r54r45&password=e34e43e34&to="+to+"&text="+body);
      });
    });
    // TODO 문자 보내는거
    // company 전화번호를 받아와야함
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
