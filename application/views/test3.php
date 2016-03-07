<?
$result=file_get_contents("http://localhost:8000/api/login?id=2014198024&pw=185251");
var_dump(json_decode($result));
