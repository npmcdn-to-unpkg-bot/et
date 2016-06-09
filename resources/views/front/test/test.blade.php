<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Test</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="main">
			<div class="container">
				<div class="row" style="margin-top: 50px;">
					<h3>
						<span id="m">00</span> :
						<span id="s">00</span>
					</h3>
				</div>
				<h3>{{$test->test_name}}</h3>
				<form action="{{url('end-example')}}" method="post" class="form-examp">
				<div class="row" style="margin-top: 15px;">
					@foreach($questions as $q)
					<div class="row question-item">
						<p>{{$q->question_description}}</p>
						<p>
							@foreach($answers as $a)
								@if($a->questions_id == $q->id)
								<input type="checkbox" name="{{$q->id}}[]" value="{{$a->id}}" class="answer-item"> {{$a->answer_description}}<br/>
								@endif
							@endforeach
						</p>
					</div>
					@endforeach
				</div>
				<div class="row">
					<button class="btn btn-success" type="submit" id="end-examp">Nộp bài</button>
				</div>
				</form>
			</div>
		</div>
		

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script type="text/javascript">

			const start = (m, s) => {

				let time = setInterval(() => {
					if(s === 0 && m === 0){
						$('#end-examp').click();
						clearInterval(time);
						
						return;
					}

					if(s === 0 && m > 0){
						s = 60;
						m --;
					}

					s --;

					if(s < 10){
						inner_s = '0' + s;
					}else{
						inner_s = s;
					}

					document.getElementById('s').innerText = inner_s;

					if(m < 10){
						inner_m = '0' + m;
					}else{
						inner_m = m;
					}

					document.getElementById('m').innerText = inner_m;
				}, 1000)

			}

			let date = new Date(1465210775 * 1000);
			let now = new Date();

			let h_ctn = date.getHours() - now.getHours();
			let m_ctn = date.getMinutes() - now.getMinutes();
			let s_ctn = date.getSeconds() - now.getSeconds();

			console.log(h_ctn + ' : ' + m_ctn + ' : ' + s_ctn);

			if(h_ctn > 0){
				m_ctn = m_ctn + h_ctn * 60;
			}
			if(s_ctn < 0 ){
				s_ctn = 60  + s_ctn;
				m_ctn --;
			}
			console.log(h_ctn + ' : ' + m_ctn + ' : ' + s_ctn);
			start(m_ctn, s_ctn);

		</script>
		<?php
			// $date = date_create();
			// echo '<pre>';
			// print_r($date);
			// echo date_timestamp_get(date_create());
		?>
	</body>
</html>

