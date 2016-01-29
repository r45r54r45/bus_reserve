$(window).on("load",function(){
  $("#top-con").css("padding-top",$("nav").height()+"px");
  $("#pp").on("change",function(event){
    console.log(event);
  });
});
function input_range(event){
  var n=event.keyCode;
  if((n>47&&n<58)||n==8||n==37||n==39){}
  else event.preventDefault();
}
function len_ch(n,m,t){
  if($("#"+m).val().length==n){
    $("#"+t).css("display","");
  }else{
    $("#"+t).css("display","none");
  }
}
var sinchon_row=1;
function addRow(t){
  if(sinchon_row==5){
    alert("일주일에 다섯번, 하루에 한건 예약 가능합니다.");
    return;
  }
  sinchon_row++;
  var strVar="";
  strVar += "<div id=\"\" class=\"btn-group btn-group-justified \" role=\"group\">";
  strVar += "              <div id=\"pp\" class=\"btn no-side-padding\" >";
  strVar += "                <select id='s_r_"+sinchon_row+"_1' class=\"selectpicker show-tick\" title=\"요일\">";
  strVar += "                  <option>월<\/option>";
  strVar += "                  <option>화<\/option>";
  strVar += "                  <option>수<\/option>";
  strVar += "                  <option>목<\/option>";
  strVar += "                  <option>금<\/option>";
  strVar += "                <\/select>";
  strVar += "              <\/div>";
  strVar += "              <div class=\"btn no-side-padding\" >";
  strVar += "                <select id='s_r_"+sinchon_row+"_2' class=\"selectpicker show-tick\" title=\"시간\">";
  strVar += "                  <option>07:50 ~ 08:50<\/option>";
  strVar += "                  <option>07:50 ~ 08:50<\/option>";
  strVar += "                  <option>07:50 ~ 08:50<\/option>";
  strVar += "                <\/select>";
  strVar += "              <\/div>";
  strVar += "            <\/div>";
  $("#"+t).append(strVar);
  $("#s_r_"+sinchon_row+"_1").selectpicker();
  $("#s_r_"+sinchon_row+"_2").selectpicker();

}
