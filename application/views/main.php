<script>

function kk(theUrl)
	{
	    if (window.XMLHttpRequest)
	    {// code for IE7+, Firefox, Chrome, Opera, Safari
	        xmlhttp=new XMLHttpRequest();
	    }
	    else
	    {// code for IE6, IE5
	        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	    }
	    xmlhttp.onreadystatechange=function()
	    {
	        if (xmlhttp.readyState==4 && xmlhttp.status==200)
	        {
	            createDiv(xmlhttp.responseText);
	        }
	    }
	    xmlhttp.open("GET", theUrl, false);
	    xmlhttp.send();
	}

var id=2014198024;
var pw=1852512;
function login(){
  login_count=0;
  var d="?id="+id+"&pw="+pw;
  var f="<iframe style='' id='login' src='/work/login"+d+"'>";
  $("body").append(f);
  $("#login").on("load",function(){
    login_count++;
    if(login_count==1)$("#login").contents().find("#form2").submit();
    if(login_count==2){
			kk("http://ysweb.yonsei.ac.kr/busTest/reserveinfo2.jsp");
    }
    });
}
</script>

<button onclick="login()">dd</button>

<?php echo file_get_contents($_GET['url']); ?>
