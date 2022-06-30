<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<title>@yield('title') - {{ config('app.name') }}</title>
		<meta content="" name="description">
		<meta content="" name="keywords">
		{{-- Favicons --}}
		<link href="{{ asset('themes/guest/img/favicon.png') }}" rel="icon">
		<link href="{{ asset('themes/guest/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
		{{-- Google Fonts --}}
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
		{{-- Vendor CSS Files --}}
		<link href="{{ asset('themes/guest/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
		<link href="{{ asset('themes/guest/vendor/aos/aos.css') }}" rel="stylesheet">
		<link href="{{ asset('themes/guest/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('themes/guest/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
		<link href="{{ asset('themes/guest/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
		<link href="{{ asset('themes/guest/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
		<link href="{{ asset('themes/guest/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
		{{-- Template Main CSS File --}}
		<link href="{{ asset('themes/guest/css/style.css') }}" rel="stylesheet">
		{{-- =======================================================
		* Template Name: Mentor - v4.7.0
		* Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
		* Author: BootstrapMade.com
		* License: https://bootstrapmade.com/license/
		======================================================== --}}
	</head>
	<body>
		{{-- ======= Header ======= --}}
		<header id="header" class="fixed-top">
			<div class="container d-flex align-items-center">
				<h1 class="logo me-auto"><a href="index.html">Mentor</a></h1>
				{{-- Uncomment below if you prefer to use an image logo --}}
				{{-- <a href="index.html" class="logo me-auto"><img src="{{ asset('themes/guest/img/logo.png') }}" alt="" class="img-fluid"></a>--}}
				<nav id="navbar" class="navbar order-last order-lg-0">
					<ul>
						<li><a href="{{ route('home') }}">Beranda</a></li>
                        @php
                            $abouts = App\Models\About::where('show_about', 1)->orderBy('title', 'ASC')->get();
                        @endphp

                        @isset($abouts)
                            <li class="dropdown">
                                <a href="#"><span>Tentang</span> <i class="bi bi-chevron-down"></i></a>
                                <ul>
                                    @foreach ($abouts as $about)
                                        <li><a href="{{ route('abouts.show', $about->slug) }}">{{ $about->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endisset

                        @php
                            $educations = App\Models\Education::where('show_education', 1)->orderBy('title', 'ASC')->get();
                        @endphp

                        @isset($educations)
                            <li class="dropdown">
                                <a href="#"><span>Pendidikan</span> <i class="bi bi-chevron-down"></i></a>
                                <ul>
                                    @foreach ($educations as $education)
                                        <li><a href="{{ route('educations.show', $education->slug) }}">{{ $education->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endisset

                        @php
                            $postCount = App\Models\Post::where('show_post', 1)->orderBy('title', 'ASC')->count();
                        @endphp

                        @if($postCount > 0)
                            <li><a href="{{ route('posts.index') }}">Media</a></li>
                        @endif

                        @php
                            $pages = App\Models\Page::where('show_page', 1)->orderBy('title', 'ASC')->get();
                        @endphp

                        @foreach ($pages as $page)
                            <li><a href="{{ route('pages.show', $page->slug) }}">{{ $page->title }}</a></li>
                        @endforeach
					</ul>
					<i class="bi bi-list mobile-nav-toggle"></i>
				</nav>
				{{-- .navbar --}}
				<a href="courses.html" class="get-started-btn">Get Started</a>
			</div>
		</header>
		{{-- End Header --}}
		@yield('content')
		{{-- ======= Footer ======= --}}
		<footer id="footer">
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6 footer-contact">
							<h3>Mentor</h3>
							<p>
								A108 Adam Street <br>
								New York, NY 535022<br>
								United States <br><br>
								<strong>Phone:</strong> +1 5589 55488 55<br>
								<strong>Email:</strong> info@example.com<br>
							</p>
						</div>
						<div class="col-lg-2 col-md-6 footer-links">
							<h4>Useful Links</h4>
							<ul>
								<li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
								<li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
								<li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
								<li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
								<li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
							</ul>
						</div>
						<div class="col-lg-3 col-md-6 footer-links">
							<h4>Our Services</h4>
							<ul>
								<li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
								<li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
								<li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
								<li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
								<li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
							</ul>
						</div>
						<div class="col-lg-4 col-md-6 footer-newsletter">
							<h4>Join Our Newsletter</h4>
							<p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
							<form action="" method="post">
								<input type="email" name="email"><input type="submit" value="Subscribe">
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="container d-md-flex py-4">
				<div class="me-md-auto text-center text-md-start">
					<div class="copyright">
						&copy; Copyright <strong><span>Mentor</span></strong>. All Rights Reserved
					</div>
					<div class="credits">
						{{-- All the links in the footer should remain intact. --}}
						{{-- You can delete the links only if you purchased the pro version. --}}
						{{-- Licensing information: https://bootstrapmade.com/license/ --}}
						{{-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ --}}
						Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
					</div>
				</div>
				<div class="social-links text-center text-md-right pt-3 pt-md-0">
					<a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
					<a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
					<a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
					<a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
					<a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
				</div>
			</div>
		</footer>
		{{-- End Footer --}}
		<div id="preloader"></div>
		<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
		{{-- Vendor JS Files --}}
		<script src="{{ asset('themes/guest/vendor/purecounter/purecounter.js') }}"></script>
		<script src="{{ asset('themes/guest/vendor/aos/aos.js') }}"></script>
		<script src="{{ asset('themes/guest/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('themes/guest/vendor/swiper/swiper-bundle.min.js') }}"></script>
		<script src="{{ asset('themes/guest/vendor/php-email-form/validate.js') }}"></script>
		{{-- Template Main JS File --}}
		<script src="{{ asset('themes/guest/js/main.js') }}"></script>
	</body>
</html>
