@extends('layouts.auth')

@section('title')
    Reset Password
@endsection

@section('content')
    {{--begin::Authentication - Reset Password --}}
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{asset('themes/admin/media/illustrations/sketchy-1/14.png')}}">
        {{--begin::Content--}}
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            {{--begin::Logo--}}
            <a href="{{ route('home') }}" class="mb-12">
            <img alt="Logo" src="{{asset('themes/admin/media/logos/logo-1.svg')}}" class="h-40px" />
            </a>
            {{--end::Logo--}}
            {{--begin::Wrapper--}}
            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
            {{--begin::Form--}}
            <form class="form w-100" action="{{ route('password.update') }}" method="POST">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                {{--begin::Heading--}}
                <div class="text-center mb-10">
                    {{--begin::Title--}}
                    <h1 class="text-dark mb-3">@yield('title')</h1>
                    {{--end::Title--}}
                    {{--begin::Link--}}
                    <div class="text-gray-400 fw-bold fs-4">Sudah mereset password ?
                        <a href="{{ route('login') }}" class="link-primary fw-bolder">Log in</a>
                    </div>
                    {{--end::Link--}}
                </div>
                {{--begin::Heading--}}
                {{--begin::Input group=--}}
                <div class="fv-row mb-10">
                    <label class="form-label fw-bolder text-dark fs-6">Email
                        <span class="text-danger">*</span></label>
                    <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" type="email" placeholder="" name="email" value="{{ $request->email ?? old('email') }}" required autocomplete="email" autofocus />
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                {{--end::Input group=--}}
                {{--begin::Input group--}}
                <div class="mb-10 fv-row" data-kt-password-meter="true">
                    {{--begin::Wrapper--}}
                    <div class="mb-1">
                        {{--begin::Label--}}
                        <label class="form-label fw-bolder text-dark fs-6">Password Baru
                            <span class="text-danger">*</span></label>
                        {{--end::Label--}}
                        {{--begin::Input wrapper--}}
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" placeholder="" name="password" required autocomplete="new-password" />
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                            <i class="bi bi-eye-slash fs-2"></i>
                            <i class="bi bi-eye fs-2 d-none"></i>
                            </span>
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        {{--end::Input wrapper--}}
                    </div>
                    {{--end::Wrapper--}}
                </div>
                {{--end::Input group=--}}
                {{--begin::Input group=--}}
                <div class="fv-row mb-10">
                    <label class="form-label fw-bolder text-dark fs-6">Konfirmasi Password
                        <span class="text-danger">*</span></label>
                    <input class="form-control form-control-lg form-control-solid @error('password_confirmation') is-invalid @enderror" type="password" placeholder="" name="password_confirmation" required autocomplete="new-password" />
                    @error('password_confirmation') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                {{--end::Input group=--}}
                {{--begin::Action--}}
                <div class="text-center">
                    <button type="submit" id="kt_new_password_submit" class="btn btn-lg btn-primary fw-bolder">
                    <span class="indicator-label">Reset</span>
                    </button>
                </div>
                {{--end::Action--}}
            </form>
            {{--end::Form--}}
            </div>
            {{--end::Wrapper--}}
        </div>
        {{--end::Content--}}
        {{--begin::Footer--}}
        <div class="d-flex flex-center flex-column-auto p-10">
            {{--begin::Links--}}
            {{--end::Links--}}
        </div>
        {{--end::Footer--}}
    </div>
    {{--end::Authentication - Sign-in--}}
@endsection
