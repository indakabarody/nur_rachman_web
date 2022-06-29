@extends('admin.layouts.app')

@section('title')
    Edit Halaman
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
                        <h3 class="fw-bolder m-0">Detail Halaman</h3>
                    </div>
                    {{--end::Card title--}}
                </div>
                {{--begin::Card header--}}
                {{--begin::Content--}}
                <div id="kt_account_profile_details" class="collapse show">
                    {{--begin::Form--}}
                    <form class="form" action="{{ route('admin.pages.update', $page->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        {{--begin::Card body--}}
                        <div class="card-body border-top p-9">
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                <div class="form-group">
                                    <label class="col-form-label fw-bold fs-6">Judul</label>
                                    <input type="text" name="title" value="{{ old('title') ?? $page->title }}" class="form-control form-control-lg form-control-solid @error ('title') is-invalid @enderror">
                                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            {{--end::Input group--}}
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                <div class="form-group">
                                    <label class="col-form-label fw-bold fs-6">Konten</label>
                                    <textarea class="form-control @error ('content') is-invalid @enderror" id="content" name="content">{!! old('content') ?? $page->content !!}</textarea>
                                    @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            {{--end::Input group--}}
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                <div class="form-group">
                                    <label class="col-form-label fw-bold fs-6">Tampilkan Halaman?</label>
                                    <select class="form-select form-select-solid @error ('show_page') is-invalid @enderror" aria-label="Select example" name="show_page">
                                        <option value="1" @if ($page->show_page == 1) selected @endif>Ya</option>
                                        <option value="0" @if ($page->show_page == 0) selected @endif>Tidak</option>
                                    </select>
                                    @error('show_page') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    <small class="form-text text-muted">Jika YA maka halaman akan ditampilkan ke publik.</small>
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
    <link href="{{ asset('themes/admin/plugins/custom/summernote/summernote-lite.css') }}" rel="stylesheet">
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
