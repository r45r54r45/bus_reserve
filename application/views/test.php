<?

$url = "http://openapi.tago.go.kr/openapi/service/ArvlInfoInqireService/getSttnAcctoSpcifyRouteBusArvlPrearngeInfoList?ServiceKey=JwH8P3QCOaTv%2FYttZkCDASHiJZblEJAk8X2i6nICtptOT8O55JvqRPG7nluVp6QEVQu7sy51aHk%2FUgm2b0Ncyg%3D%3D&cityCode=23&routeId=ICB165000381&nodeId=ICB165000725";

$response = file_get_contents($url);
$object = simplexml_load_string($response);
echo $object;
