@extends('layouts.guest')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    @php
        $setting = App\Models\Setting::first();
    @endphp
    <main id="main">
        {{-- ======= Breadcrumbs ======= --}}
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->type }}</p>
            </div>
        </div>
        {{-- End Breadcrumbs --}}
        {{-- ======= About Section ======= --}}
        <section id="post" class="post">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-sm">

                    </div>
                    <div class="col-sm">
                        <img src="{{ asset('storage/post-thumbnails/'.$post->thumbnail) }}" alt="{{ $post->title }}" style="width:500px">
                    </div>
                    <div class="col-sm">

                    </div>
                </div>
                <div class="row">
                    {!! $post->content !!}
                </div>
            </div>
        </section>
        {{-- End About Section --}}
    </main>
    {{-- End #main --}}
@endsection
