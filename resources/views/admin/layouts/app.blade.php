
<!DOCTYPE html>
{{--
Author: Keenthemes
Product Name: Metronic - #1 Selling Bootstrap 5 HTML Multi-demo Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
--}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	{{--begin::Head--}}
	<head>
		<meta charset="utf-8" />
		<title>@yield('title') - {{ config('app.name') }}</title>
		<meta name="description" content="{{ config('app.name') }}" />
		<link rel="canonical" href="{{ url('') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" type="image/x-icon" href="{{ asset('icons/favicon.ico') }}" />
		{{--begin::Fonts--}}
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		{{--end::Fonts--}}
        @yield('page_styles')
        <style>
            .ck-editor__editable {
                min-height: 300px;
            }
        </style>
		{{--begin::Global Stylesheets Bundle(used by all pages)--}}
		<link href="{{ asset('themes/admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('themes/admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		{{--end::Global Stylesheets Bundle--}}
	</head>
	{{--end::Head--}}
	{{--begin::Body--}}
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		@include('sweetalert::alert')
        {{--begin::Main--}}
		{{--begin::Root--}}
		<div class="d-flex flex-column flex-root">
			{{--begin::Page--}}
			<div class="page d-flex flex-row flex-column-fluid">
				{{--begin::Aside--}}
				<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
					{{--begin::Brand--}}
					<div class="aside-logo flex-column-auto" id="kt_aside_logo">
						{{--begin::Logo--}}
						<a href="{{ route('admin.dashboard') }}">
							<h3 class="h-15px logo" style="color: white">{{ config('app.name') }}</h3>
						</a>
						{{--end::Logo--}}
						{{--begin::Aside toggler--}}
						<div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
							{{--begin::Svg Icon | path: icons/duotone/Navigation/Angle-double-left.svg--}}
							<span class="svg-icon svg-icon-1 rotate-180">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="currentColor" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
										<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="currentColor" fill-rule="nonzero" opacity="0.5" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
									</g>
								</svg>
							</span>
							{{--end::Svg Icon--}}
						</div>
						{{--end::Aside toggler--}}
					</div>
					{{--end::Brand--}}
					{{--begin::Aside menu--}}
					<div class="aside-menu flex-column-fluid">
						{{--begin::Aside Menu--}}
						<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
							{{--begin::Menu--}}
							<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
								<div class="menu-item">
									<a class="menu-link" href="{{ route('admin.dashboard') }}">
										<span class="menu-icon">
											{{--begin::Svg Icon | path: icons/duotone/Design/PenAndRuller.svg--}}
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="currentColor" opacity="0.3" />
													<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="currentColor" />
												</svg>
											</span>
											{{--end::Svg Icon--}}
										</span>
										<span class="menu-title">Dashboard</span>
									</a>
								</div>
								<div class="menu-item">
									<div class="menu-content pt-8 pb-0">
										<span class="menu-section text-muted text-uppercase fs-8 ls-1">Menu Admin</span>
									</div>
								</div>
                                <div class="menu-item">
									<a class="menu-link" href="{{ route('admin.pages.index') }}">
										<span class="menu-icon">
											{{--begin::Svg Icon | path: icons/duotone/Design/PenAndRuller.svg--}}
											<span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M20 19H4C2.9 19 2 18.1 2 17H22C22 18.1 21.1 19 20 19Z" fill="currentColor"/>
                                                    <path opacity="0.3" d="M20 5H4C3.4 5 3 5.4 3 6V17H21V6C21 5.4 20.6 5 20 5Z" fill="currentColor"/>
                                                </svg>
											</span>
											{{--end::Svg Icon--}}
										</span>
										<span class="menu-title">Data Halaman</span>
									</a>
								</div>
                                <div class="menu-item">
									<a class="menu-link" href="{{ route('admin.posts.index') }}">
										<span class="menu-icon">
											{{--begin::Svg Icon | path: icons/duotone/Design/PenAndRuller.svg--}}
											<span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M15.43 8.56949L10.744 15.1395C10.6422 15.282 10.5804 15.4492 10.5651 15.6236C10.5498 15.7981 10.5815 15.9734 10.657 16.1315L13.194 21.4425C13.2737 21.6097 13.3991 21.751 13.5557 21.8499C13.7123 21.9488 13.8938 22.0014 14.079 22.0015H14.117C14.3087 21.9941 14.4941 21.9307 14.6502 21.8191C14.8062 21.7075 14.9261 21.5526 14.995 21.3735L21.933 3.33649C22.0011 3.15918 22.0164 2.96594 21.977 2.78013C21.9376 2.59432 21.8452 2.4239 21.711 2.28949L15.43 8.56949Z" fill="currentColor"/>
                                                    <path opacity="0.3" d="M20.664 2.06648L2.62602 9.00148C2.44768 9.07085 2.29348 9.19082 2.1824 9.34663C2.07131 9.50244 2.00818 9.68731 2.00074 9.87853C1.99331 10.0697 2.04189 10.259 2.14054 10.4229C2.23919 10.5869 2.38359 10.7185 2.55601 10.8015L7.86601 13.3365C8.02383 13.4126 8.19925 13.4448 8.37382 13.4297C8.54839 13.4145 8.71565 13.3526 8.85801 13.2505L15.43 8.56548L21.711 2.28448C21.5762 2.15096 21.4055 2.05932 21.2198 2.02064C21.034 1.98196 20.8409 1.99788 20.664 2.06648Z" fill="currentColor"/>
                                                </svg>
											</span>
											{{--end::Svg Icon--}}
										</span>
										<span class="menu-title">Data Postingan</span>
									</a>
								</div>
                                <div class="menu-item">
									<a class="menu-link" href="{{ route('admin.educations.index') }}">
										<span class="menu-icon">
											{{--begin::Svg Icon | path: icons/duotone/Design/PenAndRuller.svg--}}
											<span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"/>
                                                    <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"/>
                                                </svg>
											</span>
											{{--end::Svg Icon--}}
										</span>
										<span class="menu-title">Data Pendidikan</span>
									</a>
								</div>
                                <div class="menu-item">
									<a class="menu-link" href="{{ route('admin.abouts.index') }}">
										<span class="menu-icon">
											{{--begin::Svg Icon | path: icons/duotone/Design/PenAndRuller.svg--}}
											<span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
                                                    <rect x="11" y="17" width="7" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"/>
                                                    <rect x="11" y="9" width="2" height="2" rx="1" transform="rotate(-90 11 9)" fill="currentColor"/>
                                                </svg>
											</span>
											{{--end::Svg Icon--}}
										</span>
										<span class="menu-title">Data Tentang</span>
									</a>
								</div>
							</div>
							{{--end::Menu--}}
						</div>
					</div>
					{{--end::Aside menu--}}
				</div>
				{{--end::Aside--}}
				{{--begin::Wrapper--}}
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					{{--begin::Header--}}
					<div id="kt_header" style="" class="header align-items-stretch">
						{{--begin::Container--}}
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							{{--begin::Aside mobile toggle--}}
							<div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
								<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
									{{--begin::Svg Icon | path: icons/duotone/Text/Menu.svg--}}
									<span class="svg-icon svg-icon-2x mt-1">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<rect fill="currentColor" x="4" y="5" width="16" height="3" rx="1.5" />
												<path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="currentColor" opacity="0.3" />
											</g>
										</svg>
									</span>
									{{--end::Svg Icon--}}
								</div>
							</div>
							{{--end::Aside mobile toggle--}}
							{{--begin::Mobile logo--}}
							<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
								<a href="{{ route('admin.dashboard') }}" class="d-lg-none">
									<h3></h3>
								</a>
							</div>
							{{--end::Mobile logo--}}
							{{--begin::Wrapper--}}
							<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
								{{--begin::Navbar--}}
								<div class="d-flex align-items-stretch" id="kt_header_nav">
								</div>
								{{--end::Navbar--}}
								{{--begin::Topbar--}}
								<div class="d-flex align-items-stretch flex-shrink-0">
									{{--begin::Toolbar wrapper--}}
									<div class="d-flex align-items-stretch flex-shrink-0">
										{{--begin::User--}}
										<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
											{{--begin::Menu wrapper--}}
											<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                                                @isset(Auth::user()->image)
                                                    <img src="{{ asset('storage/user-images/' . Auth::user()->image) }}" alt="Profile" />
                                                @else
                                                    <img src="{{ asset('themes/admin/media/avatars/blank.png') }}" alt="Profile" />
                                                @endisset
											</div>
											{{--begin::Menu--}}
											<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
												{{--begin::Menu item--}}
												<div class="menu-item px-3">
													<div class="menu-content d-flex align-items-center px-3">
														{{--begin::Avatar--}}
														<div class="symbol symbol-50px me-5">
                                                            @isset(Auth::user()->image)
                                                                <img alt="Logo" src="{{ asset('storage/user-images/' . Auth::user()->image) }}" />
                                                            @else
                                                                <img alt="Logo" src="{{ asset('themes/admin/media/avatars/blank.png') }}" />
                                                            @endisset
														</div>
														{{--end::Avatar--}}
														{{--begin::Username--}}
														<div class="d-flex flex-column">
															<div class="fw-bolder d-flex align-items-center fs-5">{{ Auth::user()->name }}
															<span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Admin</span></div>
															<a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
														</div>
														{{--end::Username--}}
													</div>
												</div>
												{{--end::Menu item--}}
                                                {{--begin::Menu separator--}}
												<div class="separator my-2"></div>
												{{--end::Menu separator--}}
                                                {{--begin::Menu item--}}
												<div class="menu-item px-5">
													<a href="{{ route('admin.edit-profile.index') }}" class="menu-link px-5">Edit Profil</a>
												</div>
												{{--end::Menu item--}}
                                                {{--begin::Menu item--}}
												<div class="menu-item px-5">
													<a href="{{ route('admin.change-password.index') }}" class="menu-link px-5">Ganti Password</a>
												</div>
												{{--end::Menu item--}}
												{{--begin::Menu separator--}}
												<div class="separator my-2"></div>
												{{--end::Menu separator--}}
												{{--begin::Menu item--}}
												<div class="menu-item px-5">
													<a href="#" class="menu-link px-5" data-bs-toggle="modal" data-bs-target="#logout_modal">Log Out</a>
												</div>
												{{--end::Menu item--}}
											</div>
											{{--end::Menu--}}
											{{--end::Menu wrapper--}}
										</div>
										{{--end::User --}}
									</div>
									{{--end::Toolbar wrapper--}}
								</div>
								{{--end::Topbar--}}
							</div>
							{{--end::Wrapper--}}
						</div>
						{{--end::Container--}}
					</div>
					{{--end::Header--}}
					{{--begin::Content--}}
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						{{--begin::Toolbar--}}
						<div class="toolbar" id="kt_toolbar">
							{{--begin::Container--}}
							<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
								{{--begin::Page title--}}
								<div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3">
									{{--begin::Title--}}
									<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">@yield('title')</h1>
									{{--end::Title--}}
								</div>
								{{--end::Page title--}}
							</div>
							{{--end::Container--}}
						</div>
						{{--end::Toolbar--}}

                        @yield('content')

					</div>
					{{--end::Content--}}
					{{--begin::Footer--}}
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						{{--begin::Container--}}
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							{{--begin::Copyright--}}
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted fw-bold me-1">&copy; {{{ date('Y') }}}</span>
								<a href="{{ url('') }}" class="text-gray-800 text-hover-primary">{{ config('app.name') }}</a>
							</div>
							{{--end::Copyright--}}
						</div>
						{{--end::Container--}}
					</div>
					{{--end::Footer--}}
				</div>
				{{--end::Wrapper--}}
			</div>
			{{--end::Page--}}
		</div>
		{{--end::Root--}}
		{{--begin::Scrolltop--}}
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			{{--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg--}}
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="currentColor" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="currentColor" fill-rule="nonzero" />
					</g>
				</svg>
			</span>
			{{--end::Svg Icon--}}
		</div>
		{{--end::Scrolltop--}}
        {{--begin::Modal Log Out--}}
        <div class="modal fade" tabindex="-1" id="logout_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Log Out</h5>

                        {{--begin::Close--}}
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="currentColor">
                                        <rect fill="currentColor" x="0" y="7" width="16" height="2" rx="1"></rect>
                                        <rect fill="currentColor" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1"></rect>
                                    </g>
                                </svg>
                            </span>
                        </div>
                        {{--end::Close--}}
                    </div>

                    <div class="modal-body">
                        <p>Yakin ingin log out?</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tidak</button>
                        <button type="button" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-primary">Ya</button>
                    </div>
                </div>
            </div>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        {{--end::Modal Log Out--}}
		{{--end::Main--}}
		{{--begin::Javascript--}}
		{{--begin::Global Javascript Bundle(used by all pages)--}}
		<script src="{{ asset('themes/admin/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('themes/admin/js/scripts.bundle.js') }}"></script>
		{{--end::Global Javascript Bundle--}}
		{{--begin::Page Custom Javascript(used by this page)--}}
        @yield('page_scripts')
		{{--end::Page Custom Javascript--}}
		{{--end::Javascript--}}
	</body>
	{{--end::Body--}}
</html>
