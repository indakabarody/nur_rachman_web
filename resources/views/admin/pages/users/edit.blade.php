@extends('admin.layouts.app')

@section('title')
    Edit User
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
                        <h3 class="fw-bolder m-0">Detail User</h3>
                    </div>
                    {{--end::Card title--}}
                </div>
                {{--begin::Card header--}}
                {{--begin::Content--}}
                <div id="kt_account_profile_details" class="collapse show">
                    {{--begin::Form--}}
                    <form class="form" action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @method('PUT')

                        {{--begin::Card body--}}
                        <div class="card-body border-top p-9">
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                {{--begin::Label--}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Foto</label>
                                {{--end::Label--}}
                                {{--begin::Col--}}
                                <div class="col-lg-8">
                                    {{--begin::Image input--}}
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('themes/admin/media/avatars/blank.png') }})">
                                        {{--begin::Preview existing avatar--}}
                                        @isset($user->image)
                                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('storage/user-images/'.$user->image) }})"></div>
                                        @else
                                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('themes/admin/media/avatars/blank.png') }})"></div>
                                        @endisset
                                        {{--end::Preview existing avatar--}}
                                        {{--begin::Label--}}
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Photo">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            {{--begin::Inputs--}}
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="image_remove" />
                                            {{--end::Inputs--}}
                                        </label>
                                        {{--end::Label--}}
                                        {{--begin::Cancel--}}
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel">
                                        <i class="bi bi-x fs-2"></i>
                                        </span>
                                        {{--end::Cancel--}}
                                        {{--begin::Remove--}}
                                        @isset($user->image)
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Delete Photo">
                                                <i class="bi bi-x fs-2"></i>
                                            </span>
                                        @endisset
                                        {{--end::Remove--}}
                                    </div>
                                    {{--end::Image input--}}
                                    {{--begin::Hint--}}
                                    <div class="form-text">File type: png, jpg, jpeg, max 3 MB.</div>
                                    {{--end::Hint--}}
                                </div>
                                {{--end::Col--}}
                            </div>
                            {{--end::Input group--}}
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                {{--begin::Label--}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Nama</label>
                                {{--end::Label--}}
                                {{--begin::Col--}}
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="name" class="form-control form-control-lg form-control-solid @error ('name') is-invalid @enderror" placeholder="Masukkan Nama" value="{{ old('name') ?? $user->name }}" />
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                {{--end::Col--}}
                            </div>
                            {{--end::Input group--}}
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                {{--begin::Label--}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
                                {{--end::Label--}}
                                {{--begin::Col--}}
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="email" class="form-control form-control-lg form-control-solid @error ('email') is-invalid @enderror" placeholder="Masukkan Email Aktif" value="{{ old('email') ?? $user->email }}" />
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                {{--end::Col--}}
                            </div>
                            {{--end::Input group--}}
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                {{--begin::Label--}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Role</label>
                                {{--end::Label--}}
                                {{--begin::Col--}}
                                <div class="col-lg-8 fv-row">
                                    <select class="form-select form-select-solid @error ('role') is-invalid @enderror" aria-label="Select example" name="role">
                                        <option value="Admin" @if ($user->role == 'Admin') selected @endif>Admin</option>
                                    </select>
                                    @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                {{--end::Col--}}
                            </div>
                            {{--end::Input group--}}
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                {{--begin::Label--}}
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Password</label>
                                {{--end::Label--}}
                                {{--begin::Col--}}
                                <div class="col-lg-8 fv-row">
                                    <input type="password" name="password" class="form-control form-control-lg form-control-solid @error ('password') is-invalid @enderror" placeholder="Masukkan Password"/>
                                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    <small class="text-muted">Kosongkan jika tidak ingin mengganti password.</small>
                                </div>
                                {{--end::Col--}}
                            </div>
                            {{--end::Input group--}}
                            {{--begin::Input group--}}
                            <div class="row mb-6">
                                {{--begin::Label--}}
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Status Akun</label>
                                {{--end::Label--}}
                                {{--begin::Col--}}
                                <div class="col-lg-8 fv-row">
                                    <select class="form-select form-select-solid @error ('is_activated') is-invalid @enderror" aria-label="Select example" name="is_activated">
                                        <option value="1" @if ($user->is_activated == 1) selected @endif>Aktif</option>
                                        <option value="0" @if ($user->is_activated == 0) selected @endif>Nonaktif</option>
                                    </select>
                                    @error('is_activated') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
