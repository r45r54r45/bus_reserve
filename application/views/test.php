<?
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

$url = "http://openapi.tago.go.kr/openapi/service/ArvlInfoInqireService/getSttnAcctoSpcifyRouteBusArvlPrearngeInfoList?ServiceKey=JwH8P3QCOaTv%2FYttZkCDASHiJZblEJAk8X2i6nICtptOT8O55JvqRPG7nluVp6QEVQu7sy51aHk%2FUgm2b0Ncyg%3D%3D&cityCode=23&routeId=ICB165000381&nodeId=ICB165000725"; //6724
$response = file_get_contents($url);
$object = simplexml_load_string($response);
$count6724=$object->body->items->item->arrprevstationcnt;
$time6724= $object->body->items->item->arrtime;

$url = "http://openapi.tago.go.kr/openapi/service/ArvlInfoInqireService/getSttnAcctoSpcifyRouteBusArvlPrearngeInfoList?ServiceKey=JwH8P3QCOaTv%2FYttZkCDASHiJZblEJAk8X2i6nICtptOT8O55JvqRPG7nluVp6QEVQu7sy51aHk%2FUgm2b0Ncyg%3D%3D&cityCode=23&routeId=ICB165000381&nodeId=ICB165000725"; //6724
$response = file_get_contents($url);
$object = simplexml_load_string($response);
$json = json_encode($object);
$count6405=$object->body->items->item->arrprevstationcnt;
$time6405= $object->body->items->item->arrtime;

$url = "http://openapi.tago.go.kr/openapi/service/ArvlInfoInqireService/getSttnAcctoSpcifyRouteBusArvlPrearngeInfoList?ServiceKey=JwH8P3QCOaTv%2FYttZkCDASHiJZblEJAk8X2i6nICtptOT8O55JvqRPG7nluVp6QEVQu7sy51aHk%2FUgm2b0Ncyg%3D%3D&cityCode=23&routeId=ICB165000381&nodeId=ICB165000725"; //91
$response = file_get_contents($url);
$object = simplexml_load_string($response);
$json = json_encode($object);
$count91=$object->body->items->item->arrprevstationcnt;
$time91= $object->body->items->item->arrtime;

$url = "http://openapi.tago.go.kr/openapi/service/ArvlInfoInqireService/getSttnAcctoSpcifyRouteBusArvlPrearngeInfoList?ServiceKey=JwH8P3QCOaTv%2FYttZkCDASHiJZblEJAk8X2i6nICtptOT8O55JvqRPG7nluVp6QEVQu7sy51aHk%2FUgm2b0Ncyg%3D%3D&cityCode=23&routeId=ICB165000381&nodeId=ICB165000725"; //9201
$response = file_get_contents($url);
$object = simplexml_load_string($response);
$json = json_encode($object);
$count9201=$object->body->items->item->arrprevstationcnt;
$time9201= $object->body->items->item->arrtime;

echo '{
  "6724":{"count":'.$count6724.',"time":'.$time6724.'},
  "6405":{"count":'.$count6405.',"time":'.$time6405.'},
  "91":{"count":'.$count91.',"time":'.$time91.'},
  "9201":{"count":'.$count9201.',"time":'.$time9201.'}
}';
