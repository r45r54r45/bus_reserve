<body id="page-top" class="index">
	<div class="container-fluid">
		<div class="row">
			<a href="">
				<div class="col-xs-12 height-100 thecenter color border-all">
					<span class="extra-font">FRESHMAN YONSEI</span>
				</div>
			</a>
		</div>
		<div class="row">
			<!-- 학식 메뉴 시작 -->

			<div class="col-xs-12 col-sm-6 height-300 thecenter color border-all">
				<div>
					<span class="big-font">오늘 점심은<br>모먹지?</span>
					<div class="col-xs-12" style="margin-top:20px;">
						<div class="btn-group btn-group-justified " role="group">
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-default" data-toggle="collapse" data-target="#1dorm" aria-expanded="false" aria-controls="collapse">제 1 기숙사</button>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="collapse "  id="1dorm">
							<div class="well" >
								fff
							</div>
						</div>
					</div>
					<div class="col-xs-12" style="margin-top:20px;">
						<div class="btn-group btn-group-justified " role="group">
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-default" data-toggle="collapse" data-target="#2dorm" aria-expanded="false" aria-controls="collapse">제 2 기숙사</button>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="collapse "  id="2dorm">
							<div class="well" >
								fff
							</div>
						</div>
					</div>
					<div class="col-xs-12" style="margin-top:20px;">
						<div class="btn-group btn-group-justified " role="group">
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-default" data-toggle="collapse" data-target="#raon" aria-expanded="false" aria-controls="collapse">라온샘</button>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="collapse "  id="raon">
							<div class="well" >
								fff
							</div>
						</div>
					</div>
				</div>
			</div>
				<!-- 학식 메뉴 끝 -->
				<!-- 셔틀 시간 시작-->
				<div class="col-xs-12 col-sm-6 height-300 thecenter color border-all">
					<div>
						<div class="big-font">
							해경가서 술이나?
						</div>
						<div class="normal-font" style="margin-top:30px;">
							<span>해경으로 가요~!</span>
							<span id="h_s"></span>
						</div>
						<div class="normal-font" style="margin-top:5px;">
							<span>해경에서 긱사로~!</span>
							<span id="h_w"></span>
						</div>
						<div class="normal-font" style="margin-top:5px;">
							<span>영화보러 동춘으로~?</span>
							<span id="d_s"></span>
						</div>
						<div class="normal-font" style="margin-top:5px;">
							<span>동춘에서 긱사로~!</span>
							<span id="d_w"></span>
						</div>
						<div class="normal-font" style="margin-top:30px;">
							<span>실시간이니 걱정 ㄴㄴ해</span>
						</div>
					</div>
				</div>
				<!-- 셔틀 시간 끝-->
				<!-- 익명 질문 시작 -->
				<a href="">
					<div class="col-xs-12 col-sm-6 height-300 thecenter color border-all">
						<span class="big-font">익명으로<br>물어보장!</span>
					</div>
				</a>
				<!-- 익명 질문 끝 -->
				<!-- 셔틀예약 시작 -->
				<a href="">
					<div class="col-xs-12 col-sm-6 height-300 thecenter color border-all">
						<span class="big-font">셔틀예약<br>쉽게하장!</span>
					</div>
				</a>
				<!-- 셔틀예약 끝 -->

			</div>
		</div>
	</body>
	<script>
	// 셔틀 시간정보
	var h_time_s=[0820,0900,0940,1020,1200,1240,1320,1400,1500,1700,1820,1940,2100];
	var h_time_w=[];
	for (var i = 0; i < h_time_s.length; i++) {
		h_time_w[i]=h_time_s[i]+15;
	}
	var d_time_s=[1620,1740,2020,2140];
	var d_time_w=[];
	for (var i = 0; i < d_time_s.length; i++) {
		d_time_w[i]=d_time_s[i]+15;
	}
	$(window).on("load",function(){
		songdo_shuttle();
	});
	function findPos(arr,data){
		for (var i = 0; i < arr.length; i++) {
			if(arr[i]>data){
				return arr[i+1];
			}
		}
	}
	function songdo_shuttle(){
		setInterval(function(){
			var now=new Date().format("HHmm");
			$("#h_s").text(time_format(findPos(h_time_s,parseInt(now))));
			$("#h_w").text(time_format(findPos(h_time_w,parseInt(now))));
			$("#d_s").text(time_format(findPos(d_time_s,parseInt(now))));
			$("#d_w").text(time_format(findPos(d_time_w,parseInt(now))));
		},1000);
	}
	function time_format(data){
		var h=data.toString().substring(0,2);
		var m=data.toString().substring(2,4);
		return h+"시 "+m+"분";
	}
	</script>
