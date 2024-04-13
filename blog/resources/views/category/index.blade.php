@extends('layouts.main')

@section('content')
<main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Категории</h1>
            <section class="featured-posts-section">
                <div class="row">
                    <ul class="mb-5">
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('category.post.index', $category->id) }}">{{ $category->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>

    </main>

@endsection
