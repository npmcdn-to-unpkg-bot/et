
<!DOCTYPE html>
<html>
    <script>document.write('<base href="' + document.location + '" />');</script>
    <title>Administrator</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{{ asset('/node_modules/bootstrap/dist/css/bootstrap.min.css') }}}">
    <link rel="stylesheet" href="{{{ asset('/app/admin/common.css') }}}">
    <!-- Polyfill(s) for older browsers -->
    <script src="https://npmcdn.com/es6-shim@0.35.0/es6-shim.min.js"></script>

    <script src="https://npmcdn.com/zone.js@0.6.12?main=browser"></script>
    <script src="https://npmcdn.com/reflect-metadata@0.1.3"></script>
    <script src="https://npmcdn.com/systemjs@0.19.27/dist/system.src.js"></script>

    <script src="{{{ asset('/app/admin/systemjs.config.js') }}}"></script>
    <script>
		System.import('app').catch(function (err) {
			console.error(err);
		});
    </script>
	</head>

	<body>
		@yield('content')
	</body>
</html>