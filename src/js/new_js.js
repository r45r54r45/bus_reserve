//on page load
content_manager();
$(function(){
  statusGet();
  //nav-bottom-click
  $("#menu1").on("click",function(){
    $("#menu1>img").attr("src","/src/img/1home_o.png");
    $("#menu2>img").attr("src","/src/img/2shuttle.png");
    $("#menu3>img").attr("src","/src/img/3menu.png");
    $("#menu4>img").attr("src","/src/img/4link.png");
    $("#menu5>img").attr("src","/src/img/5more.png");
    location.href="#home";
    $("#makelong").scrollTop(0);
    content_manager();
  });
  $("#menu2").on("click",function(){
    $("#menu2>img").attr("src","/src/img/2shuttle_o.png");
    $("#menu1>img").attr("src","/src/img/1home.png");
    $("#menu3>img").attr("src","/src/img/3menu.png");
    $("#menu4>img").attr("src","/src/img/4link.png");
    $("#menu5>img").attr("src","/src/img/5more.png");
    location.replace("#shuttle");
    $("#makelong").scrollTop(0);
    content_manager();
  });
  $("#menu3").on("click",function(){
    $("#menu3>img").attr("src","/src/img/3menu_o.png");
    $("#menu1>img").attr("src","/src/img/1home.png");
    $("#menu2>img").attr("src","/src/img/2shuttle.png");
    $("#menu4>img").attr("src","/src/img/4link.png");
    $("#menu5>img").attr("src","/src/img/5more.png");
    location.replace("#menu");
    $("#makelong").scrollTop(0);
    content_manager();
  });
  $("#menu4").on("click",function(){
    $("#menu4>img").attr("src","/src/img/4link_o.png");
    $("#menu1>img").attr("src","/src/img/1home.png");
    $("#menu2>img").attr("src","/src/img/2shuttle.png");
    $("#menu3>img").attr("src","/src/img/3menu.png");
    $("#menu5>img").attr("src","/src/img/5more.png");
    location.replace("#link");
    $("#makelong").scrollTop(0);
    content_manager();
  });
  $("#menu5").on("click",function(){

    $("#menu5>img").attr("src","/src/img/5more_o.png");
    $("#menu1>img").attr("src","/src/img/1home.png");
    $("#menu2>img").attr("src","/src/img/2shuttle.png");
    $("#menu3>img").attr("src","/src/img/3menu.png");
    $("#menu4>img").attr("src","/src/img/4link.png");
    location.replace("#more");
    $("#makelong").scrollTop(0);
    content_manager();
  });
  $(".back_arrow").on("click",function(){
    location.replace("#more");
    document.getElementById("makelong").style.height="0px";
    content_manager();
  });
  $(".help_button").on("click",function(){
    location.replace("#help");
    document.getElementById("makelong").style.height="0px";
    content_manager();
  });
  $(".noti").on("click",function(){
    if(noti_flag==true){
    $("#noti_modal").modal({
      backdrop: false
    }).modal('show');
  }
  });
});
var noti_flag=false;
function moveto(path){
  if(path=='more_foodmap'){
  location.replace("/#more#foodmap");

  content_manager();
}else if(path=='more_printhub'){
  // alert("3월 10일 완료 예정입니다.");
  // window.open("http://freshman.yonsei.ac.kr/prints","_blank");
  // location.replace("/#more#printhub");
  // content_manager();
}else if(path=='more_phonebook'){
  location.replace("/#more#phonebook");
  content_manager();
}else if(path=='more_delivery'){
  location.replace("/#more#delivery");
  document.getElementById("makelong").style.height = "100%";
  content_manager();
}
}
window.onpopstate=function(e){
  // content_manager();
}

function content_manager(){
    $("#noti_modal").modal('hide');
    var url=window.location.href;
    var path=url.split('#')[1];
    var path2;
    if(path=="home"){
      $("#menu1>img").attr("src","/src/img/1home_o.png");
      $("#menu2>img").attr("src","/src/img/2shuttle.png");
      $("#menu3>img").attr("src","/src/img/3menu.png");
      $("#menu4>img").attr("src","/src/img/4link.png");
      $("#menu5>img").attr("src","/src/img/5more.png");
    }
    if(!path)
    {
      location.replace("/#home");
      content_manager();
      return;
    }
    if(path2=url.split('#')[2]){
      $("#page_title").text(path2.toUpperCase());
      $("#makelong").css("height",$(window).height()-114+"px");
      $("iframe#contents").attr("src","/new_ver/"+path2);
      $(".back_arrow").css("display","");


    }else{
      $("#page_title").text(path.toUpperCase());
      $("#makelong").css("height",$(window).height()-114+"px");
      $("iframe#contents").attr("src","/new_ver/"+path);
      $(".back_arrow").css("display","none");
    }
    statusGet();
}
var UserData;
function statusGet(){
  //1. 현재 접속자의 쿠키확인 -
  // sid 쿠키가 있는지 확인후 있다면 로그인한 적이 있다는 거니깐, 계정을 합쳐줄 필요가 있음.-TODO

  // -> db에 쿠키가 없다면 추가함. - 쿠키는 랜덤 생성
  //2. 안읽은게 있는지 확인 + 알람 개수 확인- db
  //3. 안읽은게 있다면 띄워줌. - 알람 숫자
 //1
  if((user=getCookie("user"))!=""){
    $.get("/data/getCookieUser/"+user,function(data){
      //유저의 정보를 가져옴
      statusUpdate(data);

    });
  }else{
    setCookie("user",generateId(20),1000);
    var user=getCookie("user");
    $.get("/data/getCookieUser/"+user,function(data){
      //유저의 정보를 가져옴
      statusUpdate(data);
    });
  }
}
function statusUpdate(data){
  var json=JSON.parse(data);
  var userIdx=json['idx'];
  $.get("/data/getUnreadNoti/"+userIdx,function(data){
    console.log(data);
    var re=JSON.parse(data);
    if(data=""){
      $("#noti_img").attr("src","/src/img/noti_off.png");
      $("#noti_num").text("0");
      $("#noti_body").append("알림 없음.");
      noti_flag=false;
    }else{
      $("#noti_img").attr("src","/src/img/noti_on.png");
      $("#noti_num").text(re.length);
      $("#noti_body").text("");
      for(var i=0; i<re.length; i++){
        var strVar="";
strVar += "<div class=\"card_holder\">";
strVar += "          <!-- phonebook card-->";
strVar += "          <div id=\"more_phonebook\"  class=\"card pointer\" style=\"height:50px; margin-bottom:10px; position:relative; padding:5px 10px;\">";
strVar += "            <div style=\"border-right:2px solid #fcd90d;height:100%;width:100%;padding-right:5px;\">";
strVar += "              <div style=\"text-align:right;\">";
strVar += "                <span style=\"font-size: 15px;\" name=\"noti_title\">"+re[i]['title'];
strVar += "<\/span>              <\/div>";
strVar += "              <div style=\"text-align:right; margin-top:-5px;\">";
strVar += "                <span style=\"font-size: 10px;\"    name=\"noti_content\">"+re[i]['content'];
strVar += " <\/span>             <\/div>";
strVar += "            <\/div>";
strVar += "          <\/div>";
strVar += "        <\/div>";

        $("#noti_body").append(strVar);
      }
      noti_flag=true;
    }
  });


}
// str byteToHex(uint8 byte)
//   converts a single byte to a hex string
function byteToHex(byte) {
  return ('0' + byte.toString(16)).slice(-2);
}

// str generateId(int len);
//   len - must be an even number (default: 40)
function generateId(len) {
  var arr = new Uint8Array((len || 40) / 2);
  window.crypto.getRandomValues(arr);
  return [].map.call(arr, byteToHex).join("");
}
function setCookie(cName, cValue, cDay){
       var expire = new Date();
       expire.setDate(expire.getDate() + cDay);
       cookies = cName + '=' + escape(cValue) + '; path=/ '; // 한글 깨짐을 막기위해 escape(cValue)를 합니다.
       if(typeof cDay != 'undefined') cookies += ';expires=' + expire.toGMTString() + ';';
       document.cookie = cookies;
   }

   // 쿠키 가져오기
   function getCookie(cName) {
       cName = cName + '=';
       var cookieData = document.cookie;
       var start = cookieData.indexOf(cName);
       var cValue = '';
       if(start != -1){
           start += cName.length;
           var end = cookieData.indexOf(';', start);
           if(end == -1)end = cookieData.length;
           cValue = cookieData.substring(start, end);
       }
       return unescape(cValue);
   }
