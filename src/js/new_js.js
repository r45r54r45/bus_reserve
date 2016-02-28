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
    location.replace("#more");
    content_manager();
  });
  $(".back_arrow").on("click",function(){
    location.replace("#more");
    content_manager();
  });

  $("#contents").on("load",function(){
    $("#contents").contents().find("#more_phonebook").on("click",function(){
      location.replace("/#more#phonebook");
      content_manager();
      return;
    });
    $("#contents").contents().find("#more_foodmap").on("click",function(){
      location.replace("/#more#foodmap");
      content_manager();
      return;
    });
    $("#contents").contents().find("#more_printhub").on("click",function(){
      location.replace("/#more#printhub");
      content_manager();
      return;
    });
  });


});

window.onpopstate=function(e){
  // content_manager();
}

function content_manager(){

    var url=window.location.href;
    var path=url.split('#')[1];
    var path2;
    if(!path)
    {
      location.replace("/#home");
      content_manager();
      return;
    }
    if(path2=url.split('#')[2]){
      $("#page_title").text(path2.toUpperCase());
      $("iframe#contents").css("height",$(window).height()-100+"px").attr("src","/new_ver/"+path2);
      $(".back_arrow").css("display","");

    }else{
      $("#page_title").text(path.toUpperCase());
      $("iframe#contents").css("height",$(window).height()-100+"px").attr("src","/new_ver/"+path);
      $(".back_arrow").css("display","none");
    }

}
