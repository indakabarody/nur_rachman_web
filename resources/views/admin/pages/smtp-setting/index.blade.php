@extends('admin.layouts.app')

@section('title')
    Pengaturan SMTP
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
                    <form class="form" action="{{ route('admin.smtp-setting.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{--begin::Card body--}}
                        <div class="card-body border-top p-9">
                            <div class="row mb-3">
                                <div class="form-group col md-4">
                                    <label class="col-form-label required fw-bold fs-6">Host SMTP</label>
                                    <input type="text" name="smtp_host" placeholder="host smtp" class="form-control form-control-lg form-control-solid @error('smtp_host') is-invalid @enderror" value="{{ old('smtp_host') ?? $setting->smtp_host ?? config('mail.mailers.smtp.host') ?? env('MAIL_HOST') }}" required>
                                    @error('smtp_host') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    <small class="form-text text-muted">Alamat server SMTP, contoh : smtp.google.com</small>
                                </div>
                                <div class="form-group col md-4">
                                    <label class="col-form-label required fw-bold fs-6">Host secure</label>
                                    <input type="text" name="smtp_secure" placeholder="host secure" class="form-control form-control-lg form-control-solid @error('smtp_secure') is-invalid @enderror" value="{{ old('smtp_secure') ?? $setting->smtp_secure ?? config('mail.mailers.smtp.encryption') ?? env('MAIL_ENCRYPTION') }}" required>
                                    @error('smtp_secure') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    <small class="form-text text-muted">Metode keamanan SMTP, contoh : TLS</small>
                                </div>
                                <div class="form-group col md-4">
                                    <label class="col-form-label required fw-bold fs-6">Port SMTP</label>
                                    <input type="text" name="smtp_port" placeholder="port SMTP" class="form-control form-control-lg form-control-solid @error('smtp_port') is-invalid @enderror" value="{{ old('smtp_port') ?? $setting->smtp_port ?? config('mail.mailers.smtp.port') ?? env('MAIL_PORT') }}" required>
                                    @error('smtp_port') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col md-4">
                                    <label class="col-form-label required fw-bold fs-6">Username SMTP</label>
                                    <input type="text" name="smtp_username" placeholder="username smtp" class="form-control form-control-lg form-control-solid @error('smtp_username') is-invalid @enderror" value="{{ old('smtp_username') ?? $setting->smtp_username ?? config('mail.mailers.smtp.username') ?? env('MAIL_USERNAME') }}" required>
                                    @error('smtp_username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    <small class="form-text text-muted">Akun SMTP</small>
                                </div>
                                <div class="form-group col md-4">
                                    <label class="col-form-label required fw-bold fs-6">Password SMTP</label>
                                    <input type="text" name="smtp_password" class="form-control form-control-lg form-control-solid @error('smtp_password') is-invalid @enderror" value="{{ old('smtp_password') ?? $setting->smtp_password ?? config('mail.mailers.smtp.password') ?? env('MAIL_PASSWORD') }}" required>
                                    @error('smtp_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
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
    <link href="{{ asset('themes/admin/plugins/custom/summernote/summernote-lite.css') }}" rel="stylesheet">
@endsection

@section('page_scripts')
    <script src="{{ asset('themes/admin/plugins/custom/summernote/summernote-lite.js') }}"></script>
    <script>
      $('#description').summernote({
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
      $('#committee_layout').summernote({
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
      $('#co_host').summernote({
        tabsize: 2,
        height: 200,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>
@endsection
