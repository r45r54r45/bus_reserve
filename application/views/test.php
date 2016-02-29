<?

$url = "http://openapi.tago.go.kr/openapi/service/ArvlInfoInqireService/getSttnAcctoSpcifyRouteBusArvlPrearngeInfoList?ServiceKey=JwH8P3QCOaTv%2FYttZkCDASHiJZblEJAk8X2i6nICtptOT8O55JvqRPG7nluVp6QEVQu7sy51aHk%2FUgm2b0Ncyg%3D%3D&cityCode=23&routeId=ICB165000381&nodeId=ICB165000725"; //6724
$response = file_get_contents($url);
$object = simplexml_load_string($response);
$json = json_encode($object);
$count6724=$object->body->items->item->arrprevstationcnt;
$time6724= $object->body->items->item->arrtime;

$url = "http://openapi.tago.go.kr/openapi/service/ArvlInfoInqireService/getSttnAcctoSpcifyRouteBusArvlPrearngeInfoList?ServiceKey=JwH8P3QCOaTv%2FYttZkCDASHiJZblEJAk8X2i6nICtptOT8O55JvqRPG7nluVp6QEVQu7sy51aHk%2FUgm2b0Ncyg%3D%3D&cityCode=23&routeId=ICB165000381&nodeId=ICB165000725"; //6724
$response = file_get_contents($url);
$object = simplexml_load_string($response);
$json = json_encode($object);
$count6405=$object->body->items->item->arrprevstationcnt;
$time6405= $object->body->items->item->arrtime;



echo "{
  '6724':{'count':$count6724,'time':$time6724},
  '6405':{'count':$count6405,'time':$time6405},
}";
