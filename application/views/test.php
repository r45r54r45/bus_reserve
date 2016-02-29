<?

$url = $urldecode($_GET['path']);
$response = file_get_contents($url);
$object = simplexml_load_string($response);
$json = json_encode($object);
$count=$object->body->items->item->arrprevstationcnt;
$time= $object->body->items->item->arrtime;

echo "{'count':$count,'time':$time}";
