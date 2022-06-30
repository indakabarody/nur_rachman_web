@extends('admin.layouts.app')

@section('title')
    Pengaturan Kontak
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
                    <form class="form" action="{{ route('admin.contact-setting.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @method('PUT')

                        {{--begin::Card body--}}
                        <div class="card-body border-top p-9">
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                {{--begin::Label--}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Alamat</label>
                                {{--end::Label--}}
                                {{--begin::Col--}}
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="address" class="form-control form-control-lg form-control-solid @error ('address') is-invalid @enderror" placeholder="Masukkan Alamat" value="{{ old('address') ?? $setting->address }}" />
                                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                {{--end::Col--}}
                            </div>
                            {{--end::Input group--}}
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                {{--begin::Label--}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Telp</label>
                                {{--end::Label--}}
                                {{--begin::Col--}}
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="phone" class="form-control form-control-lg form-control-solid @error ('phone') is-invalid @enderror" placeholder="Masukkan No Telp" value="{{ old('phone') ?? $setting->phone }}" />
                                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                {{--end::Col--}}
                            </div>
                            {{--end::Input group--}}
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                {{--begin::Label--}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Email</label>
                                {{--end::Label--}}
                                {{--begin::Col--}}
                                <div class="col-lg-8 fv-row">
                                    <input type="email" name="email" class="form-control form-control-lg form-control-solid @error ('email') is-invalid @enderror" placeholder="Masukkan Email" value="{{ old('email') ?? $setting->email }}" />
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
