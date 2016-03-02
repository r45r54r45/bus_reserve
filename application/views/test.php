<?
$result = file_get_contents('http://ysweb.yonsei.ac.kr/ysbus.jsp');
$JSESSIONID= substr($http_response_header[8],23,91);
$__smVisitorID= substr($http_response_header[7],26,11);
$postdata = http_build_query(
array(
  'userid' => '2014198024',
  'password' => '1852512'
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
$file = file_get_contents('http://ysweb.yonsei.ac.kr/ysbus_main.jsp', false, $context);
$opts = array(
  "http"=>array(
    "method"=>"GET",
    "header"=>"Content-type: application/x-www-form-urlencoded\r\n".
    "Cookie: JSESSIONID=$JSESSIONID; __smVisitorID=$__smVisitorID"
  )
);
$context = stream_context_create($opts);
//api selector


$file = file_get_contents('http://ysweb.yonsei.ac.kr/busTest/reserveinfo2.jsp', false, $context);
$DOM = new DOMDocument;
$DOM->loadHTML($file);
$tbody = $DOM->getElementsByTagName('tbody');
$tr=$tbody->item(0)->getElementsByTagName('tr');
$result=array();
for ($i=0; $i < $tr->length; $i++) {
  $td=$tr->item($i)->getElementsByTagName('td');
  $departure= $td->item(0)->nodeValue;
  $time=$td->item(1)->nodeValue;
  $seatNum=$td->item(2)->nodeValue;
  //출발위치
  $departure=explode('(',$departure);
  //시간
  $time=explode(' ',$time);
  $temp_date=explode('/',$time[0]);
  $time=$time[1];
  $date=array("year"=>$temp_date[0],"month"=>$temp_date[1],"date"=>$temp_date[2]);
  //자리
  $pos=strrpos($seatNum,"Seat No:");
  $seatNum= substr($seatNum,$pos+9,strlen($seatNum)-$pos-10);

  $result[$i]["departure"]=($departure[0]=="신촌캠퍼스 "?"C":"D");
  $result[$i]["time"]["date"]=$date;
  $result[$i]["time"]["time"]=$time;
  $result[$i]["seatNum"]=$seatNum;
}
echo json_encode($result); //예약 내역
