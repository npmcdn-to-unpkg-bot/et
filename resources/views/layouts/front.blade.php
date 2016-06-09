<html>
    <head>
        <title>App Name - @yield('title')</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="{{{ asset('/front/bootstrap/dist/css/bootstrap.min.css') }}}">
		<link rel="stylesheet" href="{{{ asset('/front/css/style.css') }}}">
		
		
		<script type="text/javascript" src="{{URL::asset('/front/js/jquery-1.11.3.js')}}"></script>
		<script type="text/javascript" src="{{URL::asset('/front/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    </head>
    <body>
        <header>
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Brand</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
							<li><a href="#">Link</a></li>
						</ul>
						<form class="navbar-form navbar-left" role="search">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Search">
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
						<ul class="nav navbar-nav navbar-right">
							@if(isset($userData->user_id))
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{!! $userData->email !!}<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="{!! url('profile/index') !!}">{!! trans('text.profile') !!}</a></li>
										<li><a href="{!! url('password/change') !!}">{!! trans('text.changepass') !!}</a></li>
										<li class="divider" role="separator"></li>
										<li><a href="{!! url('auth/logout') !!}">{!! trans('text.logout') !!}</a></li>
									</ul>
								</li>
							@else
								<li><a href="{!! url('auth/login') !!}">{!! trans('text.login') !!}</a></li>
								<li><a href="{!! url('auth/register') !!}">{!! trans('text.register') !!}</a></li>
							@endif
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</header>

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>