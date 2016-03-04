//on page load
content_manager();
$(function(){
  //nav-bottom-click
  $("#menu1").on("click",function(){
    $("#menu1>img").attr("src","/src/img/1home_o.png");
    $("#menu2>img").attr("src","/src/img/2shuttle.png");
    $("#menu3>img").attr("src","/src/img/3menu.png");
    $("#menu4>img").attr("src","/src/img/4link.png");
    $("#menu5>img").attr("src","/src/img/5more.png");
    document.getElementById("makelong").style.height = "100%";
    location.href="#home";
    content_manager();
  });
  $("#menu2").on("click",function(){
    $("#menu2>img").attr("src","/src/img/2shuttle_o.png");
    $("#menu1>img").attr("src","/src/img/1home.png");
    $("#menu3>img").attr("src","/src/img/3menu.png");
    $("#menu4>img").attr("src","/src/img/4link.png");
    $("#menu5>img").attr("src","/src/img/5more.png");
    document.getElementById("makelong").style.height = "100%";
    location.replace("#shuttle");
    content_manager();
  });
  $("#menu3").on("click",function(){
    $("#menu3>img").attr("src","/src/img/3menu_o.png");
    $("#menu1>img").attr("src","/src/img/1home.png");
    $("#menu2>img").attr("src","/src/img/2shuttle.png");
    $("#menu4>img").attr("src","/src/img/4link.png");
    $("#menu5>img").attr("src","/src/img/5more.png");
    document.getElementById("makelong").style.height = "100%";
    location.replace("#menu");
    content_manager();
  });
  $("#menu4").on("click",function(){
    $("#menu4>img").attr("src","/src/img/4link_o.png");
    $("#menu1>img").attr("src","/src/img/1home.png");
    $("#menu2>img").attr("src","/src/img/2shuttle.png");
    $("#menu3>img").attr("src","/src/img/3menu.png");
    $("#menu5>img").attr("src","/src/img/5more.png");
    document.getElementById("makelong").style.height = "100%";
    location.replace("#link");
    content_manager();
  });
  $("#menu5").on("click",function(){

    $("#menu5>img").attr("src","/src/img/5more_o.png");
    $("#menu1>img").attr("src","/src/img/1home.png");
    $("#menu2>img").attr("src","/src/img/2shuttle.png");
    $("#menu3>img").attr("src","/src/img/3menu.png");
    $("#menu4>img").attr("src","/src/img/4link.png");
    location.replace("#more");
    document.getElementById("makelong").style.height="0px";
    document.getElementById("makelong").style.height = "2200px";
    content_manager();
  });
  $(".back_arrow").on("click",function(){
    location.replace("#more");
    document.getElementById("makelong").style.height="0px";
    content_manager();
  });






});

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
  content_manager();
}
}
window.onpopstate=function(e){
  // content_manager();
}

function content_manager(){
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
      $("iframe#contents").css("height",$(window).height()-114+"px").attr("src","/new_ver/"+path2);
      $(".back_arrow").css("display","");


    }else{
      $("#page_title").text(path.toUpperCase());
      $("iframe#contents").css("height",$(window).height()-100+"px").attr("src","/new_ver/"+path);
      $(".back_arrow").css("display","none");
    }

}
