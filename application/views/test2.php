<?

$content= file_get_contents("http://bus.incheon.go.kr/iwcm/retrievebusstopcararriveinfo.laf?bstopid=165000725&routeid=165000381&pathseq=30");
$time=strrpos($content,'<font color="red">');
$pos= stripos($content,'<font color="red">');
$b6724=array("","");
if(!$pos||!$time){

}
else{
$b6724[0]=substr($content,$pos+18,1);
$b6724[1]=substr($content,$time+18,2);
}
//end of 6724

$content= file_get_contents("http://bus.incheon.go.kr/iwcm/retrievebusstopcararriveinfo.laf?bstopid=165000861&routeid=165000245&pathseq=33");
$time=strrpos($content,'<font color="red">');
$pos= stripos($content,'<font color="red">');
$b9201=array("","");
if(!$pos||!$time){}
else{
$b9201[0]=substr($content,$pos+18,1);
$b9201[1]=substr($content,$time+18,2);
}
//end of 9201


$content= file_get_contents("http://bus.incheon.go.kr/iwcm/retrievebusstopcararriveinfo.laf?bstopid=165000848&routeid=165000206&pathseq=74");
$time=strrpos($content,'<font color="red">');
$pos= stripos($content,'<font color="red">');
$b91=array("","");
if(!$pos||!$time){}
else{
$b91[0]=substr($content,$pos+18,1);
$b91[1]=substr($content,$time+18,2);
}
//end of 91

$content= file_get_contents("http://bus.incheon.go.kr/iwcm/retrievebusstopcararriveinfo.laf?bstopid=164000016&routeid=165000215&pathseq=41");
$time=strrpos($content,'<font color="red">');
$pos= stripos($content,'<font color="red">');
$b6405=array("","");
if(!$pos||!$time){}
else{
$b6405[0]=substr($content,$pos+18,1);
$b6405[1]=substr($content,$time+18,2);
}
//end of 6405

echo '{
  "6724":{"count":"'.$b6724[0].'","time":"'.$b6724[1].'"},
  "6405":{"count":"'.$b6405[0].'","time":"'.$b6405[1].'"},
  "91":{"count":"'.$b91[0].'","time":"'.$b91[1].'"},
  "9201":{"count":"'.$b9201[0].'","time":"'.$b9201[1].'"}
}';
