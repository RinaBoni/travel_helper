@extends('layouts.main')

@section('content')
<main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Группы</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach ($groups as $group)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <a href="{{ route('group.show', $group->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $group->title }}</h6>
                            </a>
                            <div class="d-flex justify-content-between">
                                <p class="blog-post-category">{{ $group->post->title }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="mx-auto" style="margin-top: -80px;">
                        {{ $groups->links() }}
                    </div>
                </div>
            </section>
        </div>

    </main>

@endsection
