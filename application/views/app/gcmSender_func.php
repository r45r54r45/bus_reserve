<?
$headers = array(
 'Content-Type:application/json',
 'Authorization:key=AIzaSyACU6iZvyBcFURa6w_BYRIqVzxqdP8_sos'
);

$arr   = array();
$arr['data'] = array();
$arr['data']['data']="fuck fuck";
$arr['data']['type']="text";
$arr['data']['command']="show";
$arr['registration_ids'] = array();
$arr['registration_ids'] = $data['regits'];

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
