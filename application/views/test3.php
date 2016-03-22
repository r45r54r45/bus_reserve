<?
$tomorrow  = mktime (0,0,0,date("m")  , date("d")+1, date("Y"));
echo date("Y-m-d",$tomorrow);
