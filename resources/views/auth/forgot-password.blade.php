@extends('layouts.auth')

@section('title')
    Lupa Password
@endsection

@section('content')
    {{--begin::Authentication - Forgot Password --}}
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{asset('themes/admin/media/illustrations/sketchy-1/14.png')}}">
        {{--begin::Content--}}
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            {{--begin::Wrapper--}}
            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                {{--begin::Form--}}
                <form class="form w-100" action="{{ route('password.email') }}" method="POST">
                    @csrf
                    {{--begin::Heading--}}
                    <div class="text-center mb-10">
                        {{--begin::Title--}}
                        <h1 class="text-dark mb-3">@yield('title')</h1>
                        {{--end::Title--}}
                        {{--begin::Link--}}
                        <div class="text-gray-400 fw-bold fs-4">Masukkan email untuk reset password.</div>
                        {{--end::Link--}}
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{--begin::Heading--}}
                    {{--begin::Input group--}}
                    <div class="fv-row mb-10">
                        <label class="form-label fw-bolder text-gray-900 fs-6">Email
                            <span class="text-danger">*</span></label>
                        <input class="form-control form-control-solid @error('email') is-invalid @enderror" type="email" placeholder="" value="{{ old('email') }}" name="email"required autocomplete="email" autofocus />
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    {{--end::Input group--}}
                    {{--begin::Actions--}}
                    <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                        <button type="submit" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4">
                        <span class="indicator-label">Kirim</span>
                        </button>
                        <a href="{{ route('login') }}" class="btn btn-lg btn-light-primary fw-bolder">Batal</a>
                    </div>
                    {{--end::Actions--}}
                </form>
                {{--end::Form--}}
            </div>
            {{--end::Wrapper--}}
        </div>
        {{--end::Content--}}
        {{--begin::Footer--}}
        <div class="d-flex flex-center flex-column-auto p-10">
            {{--begin::Links--}}
            <div class="d-flex align-items-center fw-bold fs-6">
                <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>
                <a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
                <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
            </div>
            {{--end::Links--}}
        </div>
        {{--end::Footer--}}
    </div>
    {{--end::Authentication - Sign-in--}}
@endsection
