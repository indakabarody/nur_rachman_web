@extends('layouts.guest')

@section('title')
    {{ $education->title }}
@endsection

@section('content')
    @php
        $setting = App\Models\Setting::first();
    @endphp
    <main id="main">
        {{-- ======= Breadcrumbs ======= --}}
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>{{ $education->title }}</h2>
            </div>
        </div>
        {{-- End Breadcrumbs --}}
        {{-- ======= About Section ======= --}}
        <section id="education" class="education">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    {!! $education->content !!}
                </div>
            </div>
        </section>
        {{-- End About Section --}}
    </main>
    {{-- End #main --}}
@endsection
