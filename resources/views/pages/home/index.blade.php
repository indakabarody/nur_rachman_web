@extends('layouts.guest')

@section('title')
    Home
@endsection

@section('content')
    @php
        $setting = App\Models\Setting::first();
    @endphp
    {{-- ======= Hero Section ======= --}}
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>{{ $setting->hero_text }}</h1>
        </div>
    </section>
    {{-- End Hero --}}
    <main id="main">
        {{-- ======= Popular Courses Section ======= --}}
        <section id="popular-courses" class="courses">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Media</h2>
                    <p>Postingan Terbaru</p>
                </div>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">

                    @foreach ($recentPosts as $recentPost)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="course-item">
                                @isset($recentPost->thumbnail)
                                    <img src="{{ asset('storage/post-thumbnails/' . $recentPost->thumbnail) }}" class="img-fluid" alt="{{ $recentPost->title }}">
                                @endisset
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>{{ $recentPost->type }}</h4>
                                    </div>
                                    <h3><a href="{{ route('posts.show', $recentPost->slug) }}">{{ $recentPost->title }}</a></h3>
                                    <p>{!! Str::limit($recentPost->content, 30) !!}</p>
                                </div>
                            </div>
                        </div>
                        {{-- End Course Item--}}
                    @endforeach

                </div>
            </div>
        </section>
        {{-- End Popular Courses Section --}}
    </main>
    {{-- End #main --}}
@endsection
