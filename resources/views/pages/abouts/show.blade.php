@extends('layouts.guest')

@section('title')
    Tentang {{ $about->title }}
@endsection

@section('content')
    @php
        $setting = App\Models\Setting::first();
    @endphp
    <main id="main">
        {{-- ======= Breadcrumbs ======= --}}
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Tentang: {{ $about->title }}</h2>
            </div>
        </div>
        {{-- End Breadcrumbs --}}
        {{-- ======= About Section ======= --}}
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    {!! $about->content !!}
                </div>
            </div>
        </section>
        {{-- End About Section --}}
    </main>
    {{-- End #main --}}
@endsection
