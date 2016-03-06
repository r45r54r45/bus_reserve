<?php
/**
* HTTP 소켓 클래스
*
* @author 희망주기 (hopegiver@korea.com)
* @date 2002-09-06
* @access public
*/

require_once("class.Error.php");

class Http extends Error {

    var $host;
    var $port;
    var $path;
    var $cookie;
    var $variable;
    var $referer;
    var $_header;
    var $auth;
    var $debug;
    var $query;

    # constructor
    function Http($url="") {
        $this->port = 80;
        if($url) $this->setURL($url);
    }

    /**
     * URL 지정함수
     *
     * @param string $url : URL
     * @return boolean
     */
    function setURL($url) {
        if(!$m = parse_url($url)) return $this->setError("파싱이 불가능한 URL입니다.");
        if($m['scheme'] != "http") return $this->setError("HTTP URL이 아닙니다.");

        $this->host = $m['host'];
        $this->port = ($m['port']) ? $m['port'] : 80;
        $this->path = ($m['path']) ? $m['path'] : "/";
        if($m['query']) {
            $arr1 = explode("&", $m['query']);
            foreach($arr1 as $value) {
                $arr2 = explode("=", $value);
                $this->setParam($arr2[0], $arr2[1]);
            }
        }
        if($m['user'] && $m['pass']) $this->setAuth($m['user'], $m['pass']);
        return true;
    }

    /**
     * 변수값을 지정한다.
     *
     * @param string $key : 변수명, 배열로도 넣을수 있다.
     * @param string $value : 변수값
     */
    function setParam($key, $value="") {
        if(is_array($key)) foreach($key as $k => $v) $this->variable[$k] = $v;
        else $this->variable[$key] = $value;
    }

    /**
     * Referer를 지정한다.
     *
     * @param string $referer : Referer
     */
    function setReferer($referer) {
        $this->referer = $referer;
    }

    /**
     * 쿠키를 지정한다.
     *
     * @param string $key : 쿠키변수명, 배열로도 넣을수 있다.
     * @param string $value : 쿠키변수값
     */
    function setCookie($key, $value="") {
        if(is_array($key)) foreach($key as $k => $v) $this->cookie .= "; $k=$v";
        else $this->cookie .= "; $key=$value";
        if(substr($this->cookie, 0, 1) == ";") $this->cookie = substr($this->cookie, 2);
    }

    /**
     * 인증설정함수
     *
     * @param string $id : 아이디
     * @param string $pass : 패스워드
     */
    function setAuth($id, $pass) {
        $this->auth = base64_encode($id.":".$pass);
    }

    /**
     * POST 방식의 헤더구성함수
     *
     * @return string
     */
    function postMethod() {
        if(is_array($this->variable)) {
            $parameter = "\r\n";
            foreach($this->variable as $key => $val) {
                    $parameter .= trim($key)."=".urlencode(trim($val))."&";
            }
            $parameter .= "\r\n";
        }
        $query .= "POST ".$this->path." HTTP/1.0\r\n";
        $query .= "Host: ".$this->host."\r\n";
        if($this->auth) $query .= "Authorization: Basic ".$this->auth."\r\n";
        if($this->referer) $query .= "Referer: ".$this->referer."\r\n";
        if($this->cookie) $query .= "Cookie: ".$this->cookie."\r\n";
        $query .= "User-agent: PHP/HTTP_CLASS\r\n";
        $query .= "Content-type: application/x-www-form-urlencoded\r\n";
        $query .= "Content-length: ".strlen($parameter)."\r\n";
        if($parameter) $query .= $parameter;
        $query .= "\r\n";
        return $query;
    }

    /**
     * GET 방식의 헤더구성함수
     *
     * @return string
     */
    function getMethod() {
        if(is_array($this->variable)) {
            $parameter = "?";
            foreach($this->variable as $key => $val) {
                    $parameter .= trim($key)."=".urlencode(trim($val))."&";
            }
            //$parameter = substr($parameter, 0, -1);
        }
        $query = "GET ".$this->path.$parameter." HTTP/1.0\r\n";
        $query .= "Host: ".$this->host."\r\n";
        if($this->auth) $query .= "Authorization: Basic ".$this->auth."\r\n";
        if($this->referer) $query .= "Referer: ".$this->referer."\r\n";
        if($this->cookie) $query .= "Cookie: ".$this->cookie."\r\n";
        $query .= "User-agent: PHP/HTTP_CLASS\r\n";
        $query .= "\r\n";
        return $query;
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

        // 헤더 부분을 구한다.
        $this->_header = ""; // 헤더의 내용을 초기화 한다.
        while(trim($buffer = fgets($fp,1024)) != "") {
            $this->_header .= $buffer;
        }

        // 바디 부분을 구한다.
        while(!feof($fp)) {
            $body .= fgets($fp,1024);
        }

        // 접속을 해제한다.
        fclose($fp);

        return $body;
    }

    /**
     * 헤더를 구하는 함수
     *
     * @return string
     */
    function getHeader() {
        return $this->_header;
    }

    /**
     * 쿠키값을 구하는 함수
     *
     * @param string $key : 쿠키변수
     * @return string or array
     */
    function getCookie($key="") {
        if($key) {
            $pattern = "/".$key."=([^;]+)/";
            if(preg_match($pattern, $this->_header, $ret)) return $ret[1];
        } else {
            preg_match_all("/Set-Cookie: [^\n]+/", $this->_header, $ret);
            return $ret[0];
        }
    }

}

/* 사용방법

$http = new Http;
$http->setDebug();
$http->setURL("http://www.zeto.co.kr/main/index.php?ch=main&skin=main");
$http->setCookie("ASPSESSIONIDGQGQGWJC", "FLFLJDMAOLEMKENOCCFDCKCH");
echo $http->send("GET");

*/

?>
