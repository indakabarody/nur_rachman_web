@php
    $setting = App\Models\Setting::first();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<title>@yield('title') - {{ config('app.name') }}</title>
		<meta content="" name="description">
		<meta content="" name="keywords">
		{{-- Favicons --}}
        @isset($setting->logo)
            <link href="{{ asset('storage/logos/' . $setting->logo) }}" rel="icon">
		    <link href="{{ asset('storage/logos/' . $setting->logo) }}" rel="apple-touch-icon">
        @endisset
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
        @include('components.dynamic-css')
		{{-- <link href="{{ asset('themes/guest/css/style.css') }}" rel="stylesheet"> --}}
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
                @if ($setting->logo != NULL)
                    <a href="{{ route('home') }}" class="logo me-auto"><img src="{{ asset('storage/logos/' . $setting->logo) }}" alt="" class="img-fluid"></a>
                @else
                    <h1 class="logo me-auto"><a href="{{ route('home') }}">{{ config('app.name') }}</a></h1>
                @endif

				<nav id="navbar" class="navbar order-last order-lg-0">
					<ul>
						<li><a href="{{ route('home') }}">Beranda</a></li>
                        @php
                            $abouts = App\Models\About::where('show_about', 1)->orderBy('title', 'ASC')->get();
                        @endphp

                        @isset($abouts)
                            <li class="dropdown">
                                <a href="#"><span>Tentang Kami</span> <i class="bi bi-chevron-down"></i></a>
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
							<h3>{{ config('app.name') }}</h3>
							<p>
								{{ $setting->address ?? NULL }} <br><br>
                                @isset($setting->phone)
                                    <strong>Telp:</strong> {{ $setting->phone }}<br>
                                @endisset
                                @isset($setting->email)
                                    <strong>Email:</strong> {{ $setting->email }}<br>
                                @endisset
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="container d-md-flex py-4">
				<div class="me-md-auto text-center text-md-start">
					<div class="copyright">
                        {{ $setting->copyright_text ?? '© ' . date('Y') . ' ' . config('app.name') }}
					</div>
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
