//on page load
content_manager();
$(function(){
  //nav-bottom-click
  $("#menu1").on("click",function(){
    location.href="#home";
    content_manager();
  });
  $("#menu2").on("click",function(){
    location.replace("#shuttle");
    content_manager();
  });
  $("#menu3").on("click",function(){
    location.replace("#menu");
    content_manager();
  });
  $("#menu4").on("click",function(){
    location.replace("#reserve");
    content_manager();
  });
  $("#menu5").on("click",function(){
    location.replace("#call");
    content_manager();
  });


});
window.onpopstate=function(e){
  // content_manager();
}

function content_manager(){
    var url=window.location.href;
    var path=url.split('#')[1];
    if(!path)
    {
      location.replace("/#home");
      return;
    }
    $("#page_title").text(path.toUpperCase());
    $("iframe#contents").css("height",$(window).height()-100+"px").attr("src","http://localhost:8000/new_ver/"+path);
}
