<?php

require_once("class.Http.php");

class Thread extends Http {

       var $handles;

       # constructor
       function Thread($url="") {
              $this->Http($url);
              $this->handles = array();
       }

       /**
        * 데이타 전송함수
        *
        * @param string $mode : POST, GET 중 하나를 입력한다.
        * @return string
        */
       function send($mode="GET") {

              // 웹서버에 접속한다.
              $fp = fsockopen($this->host, $this->port, $errno, $errstr, 10);
              if(!$fp) return $this->setError($this->host."로의 접속에 실패했습니다.");

              // GET, POST 방식에 따라 헤더를 다르게 구성한다.
              if(strtoupper($mode) == "POST") $this->query = $this->postMethod();
              else $this->query = $this->getMethod();

              fputs($fp,$this->query);
              socket_set_blocking($fp, FALSE);

              $this->handles[] = $fp;

              // 접속을 해제한다.
              //fclose($fp);

              return $fp;
       }

       function gather() {
              $ret = array();
              $max = count($this->handles);
              while(1) {
                     $i = 0;
                     for($i=0; $i<$max; $i++) {
                            $body = '';
                            if(!$fp = $this->handles[$i]) continue;
                            if(!$buffer = fgets($fp, 1024)) continue;
                            while(trim($buffer = fgets($fp,1024)) != "") {}
                            while(!feof($fp)) {
                                   $body .= fgets($fp,1024);
                            }
                            $ret[] = $body;
                            $this->close($fp);
                            $this->handles[$i] = 0;
                     }
                     if(count($ret) == $max) break;
                     usleep(10000);
              }
              return $ret;
       }

       function close($fp="") {
              if($fp) fclose($fp);
              else {
                     foreach($this->handles as $fp) {
                            if($fp) fclose($fp);
                     }
              }
              return true;
       }

}

?>
[출처] PHP에서 멀티 쓰레드 흉내내기|작성자 jesuskth
