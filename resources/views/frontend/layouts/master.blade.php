<!DOCTYPE html>
<html lang="zxx">
<head>
	@include('frontend.layouts.head')	
</head>
<body>
	<?php
		session_start();    
		//echo session_id();
		//echo session()->getid('_token');
	?>
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	
	@include('frontend.layouts.notification')
	<!-- Header -->
	@include('frontend.layouts.header')
	<!--/ End Header -->
	@yield('main-content')
	
	@include('frontend.layouts.footer')

</body>
</html>