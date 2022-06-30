@extends('admin.layouts.app')

@section('title')
    Pengaturan Website
@endsection

@section('content')
    {{--begin::Post--}}
    <div class="post d-flex flex-column-fluid" id="kt_post">
        {{--begin::Container--}}
        <div id="kt_content_container" class="container">
            {{--begin::Basic info--}}
            <div class="card mb-5 mb-xl-10">
                {{--begin::Card header--}}
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    {{--begin::Card title--}}
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Detail Pengaturan</h3>
                    </div>
                    {{--end::Card title--}}
                </div>
                {{--begin::Card header--}}
                {{--begin::Content--}}
                <div id="kt_account_profile_details" class="collapse show">
                    {{--begin::Form--}}
                    <form class="form" action="{{ route('admin.website-setting.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @method('PUT')

                        {{--begin::Card body--}}
                        <div class="card-body border-top p-9">
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                {{--begin::Label--}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Judul Website</label>
                                {{--end::Label--}}
                                {{--begin::Col--}}
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="website_title" class="form-control form-control-lg form-control-solid @error ('website_title') is-invalid @enderror" placeholder="Masukkan Judul Website" value="{{ old('website_title') ?? config('app.name') }}" />
                                    @error('website_title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                {{--end::Col--}}
                            </div>
                            {{--end::Input group--}}
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                {{--begin::Label--}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Logo</label>
                                {{--end::Label--}}
                                {{--begin::Col--}}
                                <div class="col-lg-8">
                                    {{--begin::Image input--}}
                                    <div class="image-input image-input-outline" data-kt-image-input="true">
                                        {{--begin::Preview existing avatar--}}
                                        @isset($setting->logo)
                                            <div class="image-input-wrapper" style="background-image: url({{ asset('storage/logos/'.$setting->logo) }})"></div>
                                        @else
                                            <div class="image-input-wrapper"></div>
                                        @endisset
                                        {{--end::Preview existing avatar--}}
                                        {{--begin::Label--}}
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Logo">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            {{--begin::Inputs--}}
                                            <input type="file" name="logo" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="logo_remove" />
                                            {{--end::Inputs--}}
                                        </label>
                                        {{--end::Label--}}
                                        {{--begin::Cancel--}}
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel">
                                        <i class="bi bi-x fs-2"></i>
                                        </span>
                                        {{--end::Cancel--}}
                                        {{--begin::Remove--}}
                                        @isset($setting->logo)
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Delete Logo">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                        @endisset
                                        {{--end::Remove--}}
                                    </div>
                                    {{--end::Image input--}}
                                    {{--begin::Hint--}}
                                    <div class="form-text">File type: png, jpg, jpeg, max 4 MB.</div>
                                    {{--end::Hint--}}
                                </div>
                                {{--end::Col--}}
                            </div>
                            {{--end::Input group--}}
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                {{--begin::Label--}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Gambar Depan</label>
                                {{--end::Label--}}
                                {{--begin::Col--}}
                                <div class="col-lg-8">
                                    {{--begin::Image input--}}
                                    <div class="image-input image-input-outline" data-kt-image-input="true">
                                        {{--begin::Preview existing avatar--}}
                                        @isset($setting->hero_image)
                                            <div class="image-input-wrapper" style="background-image: url({{ asset('storage/hero-images/'.$setting->hero_image) }})"></div>
                                        @else
                                            <div class="image-input-wrapper"></div>
                                        @endisset
                                        {{--end::Preview existing avatar--}}
                                        {{--begin::Label--}}
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Hero Image">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            {{--begin::Inputs--}}
                                            <input type="file" name="hero_image" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="hero_image_remove" />
                                            {{--end::Inputs--}}
                                        </label>
                                        {{--end::Label--}}
                                        {{--begin::Cancel--}}
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel">
                                        <i class="bi bi-x fs-2"></i>
                                        </span>
                                        {{--end::Cancel--}}
                                        {{--begin::Remove--}}
                                        @isset($setting->hero_image)
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Delete Hero Image">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                        @endisset
                                        {{--end::Remove--}}
                                    </div>
                                    {{--end::Image input--}}
                                    {{--begin::Hint--}}
                                    <div class="form-text">File type: png, jpg, jpeg, max 4 MB.</div>
                                    {{--end::Hint--}}
                                </div>
                                {{--end::Col--}}
                            </div>
                            {{--end::Input group--}}
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                {{--begin::Label--}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Teks Depan</label>
                                {{--end::Label--}}
                                {{--begin::Col--}}
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="hero_text" class="form-control form-control-lg form-control-solid @error ('hero_text') is-invalid @enderror" placeholder="Masukkan Teks Depan" value="{{ old('hero_text') ?? $setting->hero_text }}" />
                                    @error('hero_text') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                {{--end::Col--}}
                            </div>
                            {{--end::Input group--}}
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                {{--begin::Label--}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Warna Aksen</label>
                                {{--end::Label--}}
                                {{--begin::Col--}}
                                <div class="col-lg-8 fv-row">
                                    <input type="color" name="accent_color" class="form-control form-control-color form-control-lg form-control-solid @error ('accent_color') is-invalid @enderror" placeholder="Masukkan Warna Aksen" value="{{ old('accent_color') ?? $setting->accent_color ?? '#5fcf80' }}" />
                                    @error('accent_color') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                {{--end::Col--}}
                            </div>
                            {{--end::Input group--}}
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                {{--begin::Label--}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Teks Copyright</label>
                                {{--end::Label--}}
                                {{--begin::Col--}}
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="copyright_text" class="form-control form-control-lg form-control-solid @error ('copyright_text') is-invalid @enderror" placeholder="Masukkan Teks Copyright" value="{{ old('copyright_text') ?? $setting->copyright_text ?? '© ' . date('Y') . ' ' . config('app.name') }}" />
                                    @error('copyright_text') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                {{--end::Col--}}
                            </div>
                            {{--end::Input group--}}
                        </div>
                        {{--end::Card body--}}
                        {{--begin::Actions--}}
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-white btn-active-light-primary me-2">Reset</button>
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Simpan</button>
                        </div>
                        {{--end::Actions--}}
                    </form>
                    {{--end::Form--}}
                </div>
                {{--end::Content--}}
            </div>
            {{--end::Basic info--}}
        </div>
        {{--end::Container--}}
    </div>
    {{--end::Post--}}

@endsection

@section('page_styles')

@endsection

@section('page_scripts')

@endsection
