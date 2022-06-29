@extends('admin.layouts.app')

@section('title')
    Tambah Postingan
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
                        <h3 class="fw-bolder m-0">Detail Postingan</h3>
                    </div>
                    {{--end::Card title--}}
                </div>
                {{--begin::Card header--}}
                {{--begin::Content--}}
                <div id="kt_account_profile_details" class="collapse show">
                    {{--begin::Form--}}
                    <form class="form" action="{{ route('admin.posts.store') }}" method="POST">
                        @csrf

                        {{--begin::Card body--}}
                        <div class="card-body border-top p-9">
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                <div class="form-group">
                                    <label class="col-form-label fw-bold fs-6">Tipe</label>
                                    <select class="form-select form-select-solid @error ('type') is-invalid @enderror" aria-label="Select example" name="type">
                                        <option value="News">News</option>
                                        <option value="Event">Event</option>
                                    </select>
                                    @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            {{--end::Input group--}}
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                <div class="form-group">
                                    <label class="col-form-label fw-bold fs-6">Judul</label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control form-control-lg form-control-solid @error ('title') is-invalid @enderror">
                                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            {{--end::Input group--}}
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                <div class="form-group">
                                    <label class="col-form-label fw-bold fs-6">Konten</label>
                                    <textarea class="form-control @error ('content') is-invalid @enderror" id="content" name="content">{!! old('content') !!}</textarea>
                                    @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
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
    <link href="{{ asset('themes/admin/plugins/custom/summernote/summernote-lite.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('page_scripts')
    <script src="{{ asset('themes/admin/plugins/custom/summernote/summernote-lite.js') }}"></script>
    <script>
        $('#content').summernote({
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
