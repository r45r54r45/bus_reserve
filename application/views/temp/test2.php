<?
$id= $_GET['id'];
$pw= $_GET['pw'];
$type=$_GET["type"];

$file = file_get_contents('https://yicdorm.yonsei.ac.kr/study.asp?mid=k00');
$ASPSESSIONIDQABBTARC= substr($http_response_header[6],33,24);


$result = file_get_contents('https://infra.yonsei.ac.kr/lauth/auth_request.jsp?req_key=aW50bHBvcnRhbA==&returl=https://yicdorm.yonsei.ac.kr/dorm_auth_receiver.asp?mid=k00');

$JSESSIONID= substr($http_response_header[5],23,87);
$__smVisitorID= substr($http_response_header[4],26,11);

$postdata = http_build_query(
array(
  'id' => $id,
  'pw' => $pw,
  'waction' => "aW50bHBvcnRhbA==",
  'sCode' => "bm9lbmNyeXB0",
  'returl' => "https://yicdorm.yonsei.ac.kr/dorm_auth_receiver.asp?mid=k00"
)
);
$opts = array(
"http"=>array(
  "method"=>"POST",
  "header"=>"Content-type: application/x-www-form-urlencoded\r\n".
  "Cookie: JSESSIONID=$JSESSIONID; __smVisitorID=$__smVisitorID",
  "content" => $postdata
)
);
$context = stream_context_create($opts);
$file = file_get_contents('https://infra.yonsei.ac.kr/lauth/YLLOGIN.do', false, $context);

$DOM = new DOMDocument;
$DOM->loadHTML($file);

$input=$DOM->getElementsByTagName('input');
$arr=array();
$cnt=0;
foreach($input as $element){
  $arr[$cnt++]=$element->getAttribute('value');
}

$postdata = http_build_query(
array(
  'gubun1' => $arr[0],
  'gubun2' => $arr[1],
  'gubun3' => $arr[2],
  'gubun4' => $arr[3],
  'gubun5' => $arr[4]
)
);
$opts = array(
"http"=>array(
  "method"=>"POST",
  "header"=>"Content-type: application/x-www-form-urlencoded\r\n".
  "Cookie:
  ASPSESSIONIDQABBTARC=$ASPSESSIONIDQABBTARC",
  "content" => $postdata
)
);
$context = stream_context_create($opts);
$file = file_get_contents('https://yicdorm.yonsei.ac.kr/dorm_auth_receiver.asp?mid=k00', false, $context);

$postdata = http_build_query(
array(
  'sOpt' => $type
)
);
$opts = array(
  "http"=>array(
    "method"=>"GET",
    "header"=>"Content-type: application/x-www-form-urlencoded\r\n".
    "Cookie:__smVisitorID=$__smVisitorID;
    ASPSESSIONIDQABBTARC=$ASPSESSIONIDQABBTARC",
    "content" => $postdata
  )
);
$context = stream_context_create($opts);
$file=file_get_contents('https://yicdorm.yonsei.ac.kr/study.asp?mid=k00', false, $context);

$DOM = new DOMDocument;
@$DOM->loadHTML($file);

$td=$DOM->getElementsByTagName('td');
foreach ($td as $temp) {
  if($temp->getAttribute('width')=="50"){
    if($temp->childNodes->item(0)->nodeName=="a")
    echo $temp->childNodes->item(0)->nodeValue."<br>";
  }
}
$uid=11;

if($type=="A"){
  echo "typeA selected";
}else if($type=="B"){
  $uid+=134;
    echo "typeB selected";
}else if($type=="D"){
  $uid+=307;
}else if($type=="E"){
  $uid+=555;
}
$postdata = http_build_query(
array(
  'actt' => "bok3",
  'uid' => $uid,
  'type' => $type
)
);
$opts = array(
"http"=>array(
  "method"=>"POST",
  "header"=>"Content-type: application/x-www-form-urlencoded\r\n".
  "Cookie:
  ASPSESSIONIDQABBTARC=$ASPSESSIONIDQABBTARC",
  "content" => $postdata
)
);
$context = stream_context_create($opts);
$file = file_get_contents('https://yicdorm.yonsei.ac.kr/study.asp?mid=k00&type='.$type, false, $context);
echo $file;
