<?
$result=file_get_contents("http://ybanana.yonsei.ac.kr/api/login?id=2014198024&pw=1852512");
var_dump(json_decode($result));

$kk=json_decode($result);
print $kk->{'result'};
