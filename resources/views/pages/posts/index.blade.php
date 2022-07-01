@extends('layouts.guest')

@section('title')
    Media
@endsection

@section('content')
    @php
        $setting = App\Models\Setting::first();
    @endphp
    <main id="main" data-aos="fade-in">
        {{-- ======= Breadcrumbs ======= --}}
        <div class="breadcrumbs">
            <div class="container">
                <h2>Media</h2>
            </div>
        </div>
        {{-- End Breadcrumbs --}}
        {{-- ======= Courses Section ======= --}}
        <section id="courses" class="courses">
            <div class="container" data-aos="fade-up">
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach ($posts as $post)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="course-item">
                                @isset($post->thumbnail)
                                    <img src="{{ asset('storage/post-thumbnails/' . $post->thumbnail) }}" class="img-fluid" alt="{{ $post->title }}">
                                @endisset
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>{{ $post->type }}</h4>
                                    </div>
                                    <h3><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h3>
                                    <p>{!! Str::limit($post->content, 30) !!}</p>
                                </div>
                            </div>
                        </div>
                        {{-- End Course Item--}}
                    @endforeach
                </div>
            </div>
        </section>
        {{-- End Courses Section --}}
    </main>
    {{-- End #main --}}
@endsection
