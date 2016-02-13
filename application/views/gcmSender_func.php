<?
$headers = array(
 'Content-Type:application/json',
 'Authorization:key=AIzaSyACU6iZvyBcFURa6w_BYRIqVzxqdP8_sos'
);

$arr   = array();
$arr['data'] = array();
$arr['data']['msg'] = "{data:gcm으로 보낼 메시지를 쓰면 된다.}";
$arr['registration_ids'] = array();
$arr['registration_ids'][0] = "APA91bGIv534n9Rb-U8MMKfdnuDsyJ2S7aqgAjbwlUQI4fvxUsR6hYfLBVYcdx9cPxRU31RhA37KxbaSsI0eYCOU1BOIVRKnrOluR_neZ95euaAEx1zwi30gdpy3VvJ2R9xRvE1xV3gq";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,    'https://android.googleapis.com/gcm/send');
curl_setopt($ch, CURLOPT_HTTPHEADER,  $headers);
curl_setopt($ch, CURLOPT_POST,    true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arr));
$response = curl_exec($ch);
echo $response;
curl_close($ch);
