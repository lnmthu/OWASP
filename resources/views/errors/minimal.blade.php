<!DOCTYPE HTML>
<html>
	<head>
		<title>@yield('title')</title>
		<link href="{{ asset('css/404.css') }}" rel="stylesheet" type="text/css"  media="all" />
	</head>
	<body>
		<!--start-wrap--->
		<div class="wrap">
			<!---start-header---->
				<div class="header">
					<div class="logo">
						<h1><a href="#">Ohh</a></h1>
					</div>
				</div>
			<!---End-header---->
			<!--start-content------>
			<div class="content">
                @yield('image')
				<p><span><label>O</label>hh.....</span>You Requested the page that is no longer There.</p>
				<a id="backToStep" onclick="history.back()">Back To Step</a>
   			</div>
			<!--End-Cotent------>
		</div>
        <!--End-wrap--->
	</body>
</html>