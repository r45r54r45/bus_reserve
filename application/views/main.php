<script>

function kk(url)
	{
		$.get(url,function(data){
		console.log(data);
	});
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
			kk("view-source:localhost:8000/main/proxy?url=http://ysweb.yonsei.ac.kr/busTest/notice2.jsp");
    }
    });
}
</script>

<button onclick="login()">dd</button>
