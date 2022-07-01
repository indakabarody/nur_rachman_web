@extends('admin.layouts.app')

@section('title')
    Edit Postingan
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
                    <form class="form" action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{--begin::Card body--}}
                        <div class="card-body border-top p-9">
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                <div class="form-group">
                                    <label class="col-form-label required fw-bold fs-6">Tipe</label>
                                    <select class="form-select form-select-solid @error ('type') is-invalid @enderror" aria-label="Select example" name="type">
                                        <option value="News" @if ($post->type == 'News') selected @endif>News</option>
                                        <option value="Event" @if ($post->type == 'Event') selected @endif>Event</option>
                                    </select>
                                    @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            {{--end::Input group--}}
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                <div class="form-group">
                                    <label class="col-form-label required fw-bold fs-6">Judul</label>
                                    <input type="text" name="title" value="{{ old('title') ?? $post->title }}" class="form-control form-control-lg form-control-solid @error ('title') is-invalid @enderror">
                                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            {{--end::Input group--}}
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                <div class="form-group">
                                    <label class="col-form-label fw-bold fs-6">Thumbnail</label><br>
                                    {{--begin::Image input--}}
                                    <div class="image-input image-input-outline" data-kt-image-input="true">
                                        {{--begin::Preview existing avatar--}}
                                        @isset($post->thumbnail)
                                            <div class="image-input-wrapper" style="background-image: url({{ asset('storage/post-thumbnails/'.$post->thumbnail) }})"></div>
                                        @else
                                            <div class="image-input-wrapper"></div>
                                        @endisset
                                        {{--end::Preview existing avatar--}}
                                        {{--begin::Label--}}
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Thumbnail">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            {{--begin::Inputs--}}
                                            <input type="file" name="thumbnail" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="thumbnail_remove" />
                                            {{--end::Inputs--}}
                                        </label>
                                        {{--end::Label--}}
                                        {{--begin::Cancel--}}
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel">
                                        <i class="bi bi-x fs-2"></i>
                                        </span>
                                        {{--end::Cancel--}}
                                        {{--begin::Remove--}}
                                        @isset($post->thumbnail)
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Delete Thumbnail">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                        @endisset
                                        {{--end::Remove--}}
                                    </div>
                                    {{--end::Image input--}}
                                    {{--begin::Hint--}}
                                    <div class="form-text">File type: png, jpg, jpeg. File type: jpg, png, gif. Recommended resolution 800 x 533 px. Max 4 MB.</div>
                                    {{--end::Hint--}}
                                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            {{--end::Input group--}}
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                <div class="form-group">
                                    <label class="col-form-label required fw-bold fs-6">Konten</label>
                                    <textarea class="form-control @error ('content') is-invalid @enderror" id="content" name="content">{!! old('content') ?? $post->content !!}</textarea>
                                    @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            {{--end::Input group--}}
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                <div class="form-group">
                                    <label class="col-form-label fw-bold fs-6">Tampilkan Postingan?</label>
                                    <select class="form-select form-select-solid @error ('show_post') is-invalid @enderror" aria-label="Select example" name="show_post">
                                        <option value="1" @if ($post->show_post == 1) selected @endif>Ya</option>
                                        <option value="0" @if ($post->show_post == 0) selected @endif>Tidak</option>
                                    </select>
                                    @error('show_post') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
