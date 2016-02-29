<div class="container-fluid">
  <div class="row center-align" id="home-top-button">
    <div id="home" class="btn-group" data-toggle="buttons">
      <label class="btn btn-primary active" style="border-bottom-left-radius: 16px;
      border-top-left-radius: 16px;" id="option1">
      <input type="radio" name="options"  autocomplete="off"> 송도 맛집
    </label>
    <label class="btn btn-primary" style="border-bottom-right-radius: 16px;
    border-top-right-radius: 16px; display:none;" id="option2">
    <input type="radio" name="options"  autocomplete="off" ><span id="menu_type"><span>
  </label>
</div>
</div>
</div>

<div id="grid">

           <div class="grid-element">
               <span id="g11">닭</span>
           </div>

           <div class="grid-element">
               <span id="g12">한식</span>
           </div>

           <div class="grid-element">
               <span id="g13">카페</span>
           </div>


           <div class="grid-element">
               <span id="g21">일식</span>
           </div>

           <div class="grid-element" style="background:#46292b;">
               <span id="g22">송도</span>
           </div>

           <div class="grid-element">
               <span id="g23">양식</span>
           </div>


           <div class="grid-element">
               <span id="g31">술</span>
           </div>

           <div class="grid-element">
             <span id="g32">고기</span>
           </div>

           <div class="grid-element">
               <span id="g33">기타</span>
           </div>

       </div>


       <div id="grid2">

                  <div class="grid-element">
                      <span id="g211"></span>
                  </div>

                  <div class="grid-element">
                      <span id="g212"></span>
                  </div>

                  <div class="grid-element">
                      <span id="g213"></span>
                  </div>


                  <div class="grid-element">
                      <span id="g221"></span>
                  </div>

                  <div class="grid-element" style="background:#46292b;">
                      <span id="g222"></span>
                  </div>

                  <div class="grid-element">
                      <span id="g223"></span>
                  </div>


                  <div class="grid-element">
                      <span id="g231"></span>
                  </div>

                  <div class="grid-element">
                    <span id="g232"></span>
                  </div>

                  <div class="grid-element">
                      <span id="g233"></span>
                  </div>

              </div>

       <div class="clear"></div>
<style type="text/css">
           .clear{
               clear:both;
           }
           #grid{
               width: 100%;
               padding:2vw 2vw;
               overflow: hidden;
           }

           #grid2{
               width: 100%;
               padding:2vw 2vw;
               overflow: hidden;
               opacity:0;
               height:0;
           }
           .grid-element{
               width:32vw;
               height:32vw;
               float:left;
               text-align: center;
               line-height: 32vw;
               cursor:pointer;
           }
           .grid-element>span{
             pointer-events:none;
             font-size: 12px;
             font-weight: 100;
           }
           #grid>div,#grid2>div{
             border:1px solid #46292b;
           }
           #g22,#g222{
             font-size: 15px;
             color:#fff;
           }
</style>
<script>
var currentDepth=0;
$(".grid-element").on("click",function(e){
  var clicked=e.originalEvent.srcElement.firstElementChild.id;
  if(currentDepth==0){
    if(clicked!="g22"){
      $("#option2").css("display","");
      $("#menu_type").text($("#"+clicked).text());
    putInfo(clicked);
    $("#grid").animate({
      opacity:0,
      height:0,
    },700, function(){
      $("#grid2").animate({
        opacity:1,
        height:'100vw',
      },700);
    });
    currentDepth=1;
  }
  }else{
    if(clicked=="g222"){
    $("#option2").css("display","none");
    $("#grid2").animate({
      opacity:0,
      height:0,
    },700, function(){
      $("#grid").animate({
        opacity:1,
        height:'100vw',
      },700);
    });
    currentDepth=0;
  }
}

});
var obj= {
  'g11':[
  [["맛불작전"],["Chi Mc"],["94st"]],
  [["한판 닭갈비"],["처음으로"],["디디치킨"]],
  [["제임스 치킨"],["오븐에 빠진 닭"],["문어 vs 치킨"]]],

  'g12':[
  [["집게"],["레드썬"],["이렇게 좋을수가"]],
  [["경복궁"],["처음으로"],["계절밥상"]],
  [["홍익 육계장"],["백종원 원조 쌈밥"],["박승광 해물 칼국수"]]],

  'g13':[
  [["카페라리"],["그리다 디저트"],["엔젤리노"]],
  [["요거프레소"],["처음으로"],["모뉴망"]],
  [["카페얼반"],["도쿄팡야"],["풀 사이드 228"]]],

  'g21':[
  [["겐로쿠 우동"],["테루"],["연어시대"]],
  [["송도옥"],["처음으로"],["아키노 주방"]],
  [["모리"],["스시 웨이"],["작은 식당"]]],

  'g23':[
  [["더스타일 함벅"],["버거룸 181"],["렐리쉬"]],
  [["La Salsa"],["처음으로"],["트리플듀에"]],
  [["지아니 스나폴리"],["메리고라운드"],["디오라마"]]],

  'g31':[
  [["호프 이야기"],["미술관"],["그작소"]],
  [["봉마담 맥주"],["처음으로"],["이화 주막"]],
  [["가르텐"],["아도니스"],["치치"]]],

  'g32':[
  [["축산 이야기"],["카페 조선"],["애플 삼겹살"]],
  [["구우리"],["처음으로"],["황소 갈비"]],
  [["갈비씨"],["이야기가 있는 삼겹살"],["육꼬집"]]],

  'g33':[
  [["라온샘"],["해물천하"],["소래포구"]],
  [["회를 품은 부대찌개"],["처음으로"],["청실 홍실"]],
  [["키친 1985"],["레드썬"],["북창동 순두부"]]]

};

function putInfo(target){
    for(var i=1;i<4;i++){
      for(var j=1;j<4;j++){
      $("#g2"+i+j).text(obj[target][i-1][j-1]);
      }
  }
}
</script>
