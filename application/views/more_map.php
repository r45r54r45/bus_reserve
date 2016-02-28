<div id="grid">

           <div class="grid-element">
               <span id="g11">맛불작전</span>
           </div>

           <div class="grid-element">
               <span id="g12">Label</span>
           </div>

           <div class="grid-element">
               <span id="g13">Label</span>
           </div>


           <div class="grid-element">
               <span id="g21">Label</span>
           </div>

           <div class="grid-element">
               <span id="g22">Label</span>
           </div>

           <div class="grid-element">
               <span>Label</span>
           </div>


           <div class="grid-element">
               <span>Label</span>
           </div>

           <div class="grid-element">
             <span>Label</span>
           </div>

           <div class="grid-element">
               <span>Label</span>
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
           }
           .grid-element{
               width:32vw;
               height:32vw;
               float:left;
               text-align: center;
               line-height: 32vw;
           }
           #grid>div{
             border:1px solid black;
           }
</style>
<script>
$("#grid-element").on("click",function(){
  // console.log("Dd");
});
</script>
