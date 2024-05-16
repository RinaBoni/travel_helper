@extends('layouts.main')

@section('content')
<main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Районы</h1>
            <section class="featured-posts-section">
                <div class="row">
                    <ul class="mb-5">
                        @foreach ($districtss as $district)
                            <li>
                                {{-- <a href="{{ route('category.post.index', $category->id) }}">{{ $districts }}</a> --}}
                                <a href="#">{{ $district }}</a>
                                {{-- <a class="dropdown-item" href="{{ route('district.post.index', ['district' => $district]) }}">{{ $district }}</a> --}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>

        <section class="edica-footer-banner-section">
        <div class="container">
        </div>
    </section>

    </main>

@endsection
