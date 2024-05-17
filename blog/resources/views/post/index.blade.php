@extends('layouts.main')

@section('content')
<main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Достопримечательности Забайкальского края</h1>
            <section class="featured-posts-section">
                <div class="row">

                    @foreach ($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                    <img src="{{ 'storage/' . $post->preview_image}}" alt="blog post">
                                </a>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="blog-post-category">{{ $post->category->title }}</p>
                                @auth
                                    <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                        @csrf
                                        <span>{{ $post->liked_users_count }}</span>
                                        <button type="submit" class="border-0 bg-transparent">
                                                @if (auth()->user()->likedPosts->contains($post->id))
                                                    <i class="fa fa-solid fa-heart" style="color: #63E6BE;"></i>
                                                @else
                                                    <i class="fa fa-regular fa-heart" style="color: #B197FC;"></i>
                                                @endif
                                            </button>
                                    </form>
                                @endauth
                                @guest
                                    <div>
                                        <span>{{ $post->liked_users_count }}</span>
                                        <i class="fa fa-regular fa-heart" style="color: #B197FC;"></i>
                                    </div>
                                @endguest
                            </div>
                            <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="mx-auto" style="margin-top: -80px;">
                        {{ $posts->links() }}
                    </div>
                </div>
            </section>


            <section class="featured-posts-section">
                <h3 class="widget-title">Популярные достопримечательности</h3>
                <div class="row">

                    @foreach ($likedPosts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                    <img src="{{ 'storage/' . $post->preview_image}}" alt="blog post">
                                </a>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="blog-post-category">{{ $post->category->title }}</p>
                                @auth
                                    <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                        @csrf
                                        <span>{{ $post->liked_users_count }}</span>
                                        <button type="submit" class="border-0 bg-transparent">
                                                @if (auth()->user()->likedPosts->contains($post->id))
                                                    <i class="fa fa-solid fa-heart" style="color: #63E6BE;"></i>
                                                @else
                                                    <i class="fa fa-regular fa-heart" style="color: #B197FC;"></i>
                                                @endif
                                            </button>
                                    </form>
                                @endauth
                                @guest
                                    <div>
                                        <span>{{ $post->liked_users_count }}</span>
                                        <i class="fa fa-regular fa-heart" style="color: #B197FC;"></i>
                                    </div>
                                @endguest
                            </div>
                            <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>



            <div class="row">
                <div class="col-md-8">
                    <section class="related-posts">
                            <h2 class="section-title mb-4" >Отправьтесь в поход!</h2>
                            <div class="row">
                                @foreach ($groups as $group)
                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        <p class="post-category">{{ $group->post->title }}</p>
                                        <a href="{{ route('post.show', $group->id) }}" class="blog-post-permalink">
                                            <h6 class="blog-post-title">{{ $group->title }}</h6>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                    </section>
                </div>
            </div>
        </div>

    </main>

@endsection
