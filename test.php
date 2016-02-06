<?php

function file_force_contents($dir, $contents){
     $parts = explode('/', $dir);
     $file = array_pop($parts);
     $dir = '';
     foreach($parts as $part)
         if(!is_dir($dir .= "/$part")) mkdir($dir);
     file_put_contents("$dir/$file", $contents);
 }

$url="http://freshman.yonsei.ac.kr";

if (function_exists('curl_init')) {
   // curl 리소스를 초기화
   $ch = curl_init();

   // url을 설정
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
   // 헤더는 제외하고 content 만 받음
   curl_setopt($ch, CURLOPT_HEADER, 0);

   // 응답 값을 브라우저에 표시하지 말고 값을 리턴
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

   // 브라우저처럼 보이기 위해 user agent 사용
   curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.5) Gecko/20041107 Firefox/1.0');

   $content = curl_exec($ch);

   // 리소스 해제를 위해 세션 연결 닫음
   curl_close($ch);
} else {
  echo "sibal";
   // curl 라이브러리가 설치 되지 않음. 다른 방법 알아볼 것
}
echo $content;
// file_force_contents("ttt.txt",htmlentities($data));

?>
