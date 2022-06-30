
<!DOCTYPE html>
{{--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
--}}
<html lang="en">
	{{--begin::Head--}}
	<head>
		<title>@yield('title') - {{ config('app.name') }}</title>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="" />
		<link rel="shortcut icon" href="{{asset('icons/favicon.ico')}}" />
		{{--begin::Fonts--}}
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		{{--end::Fonts--}}
		{{--begin::Global Stylesheets Bundle(used by all pages)--}}
		<link href="{{asset('themes/admin/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('themes/admin/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		{{--end::Global Stylesheets Bundle--}}
		{{--Begin::Google Tag Manager --}}
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&amp;l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
		{{--End::Google Tag Manager --}}
	</head>
	{{--end::Head--}}
	{{--begin::Body--}}
	<body id="kt_body" class="bg-body">
        @include('sweetalert::alert')
		{{--Begin::Google Tag Manager (noscript) --}}
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		{{--End::Google Tag Manager (noscript) --}}
		{{--begin::Main--}}
		{{--begin::Root--}}
		<div class="d-flex flex-column flex-root">
            @yield('content')
		</div>
		{{--end::Root--}}
		{{--end::Main--}}
		{{--begin::Javascript--}}
		{{--begin::Global Javascript Bundle(used by all pages)--}}
		<script src="{{asset('themes/admin/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('themes/admin/js/scripts.bundle.js')}}"></script>
		{{--end::Global Javascript Bundle--}}
		{{--begin::Page Custom Javascript(used by this page)--}}
		<script src="{{asset('themes/admin/js/custom/authentication/sign-in/general.js')}}"></script>
		{{--end::Page Custom Javascript--}}
		{{--end::Javascript--}}
	</body>
	{{--end::Body--}}
</html>
