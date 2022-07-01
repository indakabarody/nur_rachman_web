@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')

    <div id="kt_content_container" class="container">
        <div class="row g-5 g-xl-8">
            <h3>Selamat datang, {{ Auth::user()->name }}!</h3>


            <div class="col-xl-3">

                <a href="{{ route('admin.pages.index') }}" class="card bg-primary hoverable card-xl-stretch mb-xl-8">

                    <div class="card-body">

                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M20 19H4C2.9 19 2 18.1 2 17H22C22 18.1 21.1 19 20 19Z" fill="currentColor"/>
                                <path opacity="0.3" d="M20 5H4C3.4 5 3 5.4 3 6V17H21V6C21 5.4 20.6 5 20 5Z" fill="currentColor"/>
                            </svg>
                        </span>

                        <div class="text-inverse-warning fw-bolder fs-2 mb-2 mt-5">{{ $pageCount }}</div>
                        <div class="fw-bold text-inverse-warning fs-7">Halaman</div>
                    </div>

                </a>

            </div>
            <div class="col-xl-3">

                <a href="{{ route('admin.posts.index') }}" class="card bg-success hoverable card-xl-stretch mb-xl-8">

                    <div class="card-body">

                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="currentColor"/>
                                <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="currentColor"/>
                            </svg>
                        </span>

                        <div class="text-inverse-warning fw-bolder fs-2 mb-2 mt-5">{{ $postCount }}</div>
                        <div class="fw-bold text-inverse-warning fs-7">Postingan</div>
                    </div>

                </a>

            </div>
            <div class="col-xl-3">

                <a href="{{ route('admin.educations.index') }}" class="card bg-info hoverable card-xl-stretch mb-xl-8">

                    <div class="card-body">

                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor"/>
                                <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor"/>
                            </svg>
                        </span>

                        <div class="text-inverse-warning fw-bolder fs-2 mb-2 mt-5">{{ $educationCount }}</div>
                        <div class="fw-bold text-inverse-warning fs-7">Pendidikan</div>
                    </div>

                </a>

            </div>
            <div class="col-xl-3">

                <a href="{{ route('admin.abouts.index') }}" class="card bg-warning hoverable card-xl-stretch mb-xl-8">

                    <div class="card-body">

                        <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
                                <rect x="11" y="17" width="7" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"/>
                                <rect x="11" y="9" width="2" height="2" rx="1" transform="rotate(-90 11 9)" fill="currentColor"/>
                            </svg>
                        </span>

                        <div class="text-inverse-warning fw-bolder fs-2 mb-2 mt-5">{{ $aboutCount }}</div>
                        <div class="fw-bold text-inverse-warning fs-7">Tentang</div>
                    </div>

                </a>

            </div>
        </div>
    </div>

@endsection
