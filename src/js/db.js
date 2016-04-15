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
    var data=$.extend(
      $.extend(
        $.extend(this.order,{"totalPrice":totalPrice})
        ,{"time":Firebase.ServerValue.TIMESTAMP}),{dest:this.dest});
    ref.child("advertisement").child(this.companyName).child("order").push(data);
  }
}
var Banner=function(companyName){
  if(!companyName)throw new Error("plz fill in company name");
  this.companyName=companyName;
  //seen plus
  var seen_time={"time":Firebase.ServerValue.TIMESTAMP};
  ref.child("advertisement").child(this.companyName).child("banner").child("seen").push(seen_time);
  Banner.prototype.click=function(){
    var data={"time":Firebase.ServerValue.TIMESTAMP};
    ref.child("advertisement").child(this.companyName).child("banner").child("click").push(data);
  }
}
