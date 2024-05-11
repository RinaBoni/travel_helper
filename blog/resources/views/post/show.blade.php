@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>{{-- <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200"> {{ $date->translatedFormat('F') }} {{ $date->day }}  {{$date->year}} • {{ $date->format('H:i') }} • {{ $post->comments->count }} Комментария</p> --}}
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200"> {{ $date->translatedFormat('F') }} {{ $date->day }}  {{$date->year}} • {{ $date->format('H:i') }} • {{ $post->comments->count() }} Комментария</p>







            {{-- <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300"> --}}
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                    <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                    <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                    <div class="carousel-item">
                        <img class="first-slide" src="https://avatars.mds.yandex.net/i?id=1bee28e3176a1847fb5010f319d96999e55e10df-11035673-images-thumbs&n=13" alt="First slide">

                    </div>
                    <div class="carousel-item">
                        <img class="second-slide" src="https://mykaleidoscope.ru/x/uploads/posts/2022-10/1666137209_33-mykaleidoscope-ru-p-veselii-kotik-oboi-36.jpg" alt="Second slide">

                    </div>
                    <div class="carousel-item active">
                        <img class="third-slide" src="https://img.razrisyika.ru/kart/24/1200/95244-kotiki-kartinki-14.jpg" alt="Third slide">

                    </div>
                    </div>
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>
            {{-- </section> --}}
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                        <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                        </ol>
                        <div class="carousel-inner">

                        <div class="carousel-item">
                            <img class="first-slide" src="https://avatars.mds.yandex.net/i?id=1bee28e3176a1847fb5010f319d96999e55e10df-11035673-images-thumbs&n=13" alt="First slide">
                        </div>

                        <div class="carousel-item active">
                            <img class="second-slide" src="https://avatars.mds.yandex.net/i?id=1bee28e3176a1847fb5010f319d96999e55e10df-11035673-images-thumbs&n=13" alt="Second slide">
                        </div>

                        <div class="carousel-item">
                            <img class="third-slide" src="https://avatars.mds.yandex.net/i?id=1bee28e3176a1847fb5010f319d96999e55e10df-11035673-images-thumbs&n=13" alt="Third slide">
                        </div>
                        </div>
                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                        </a>
                    </div>
            </section>







            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="py-3">
                        @auth
                            <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                @csrf
                                <span>{{ $post->liked_users_count }}</span>
                                <button type="submit" class="border-0 bg-transparent">
                                        @if (auth()->user()->likedPosts->contains($post->id))
                                            <i class=" fa fa-solid fa-heart" style="color: #63E6BE;"></i>
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

                        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Acd2df954ba5a9c4ff790d75e48717239ca0788352d6769dabacc7bcbe8659b34&amp;width=100%25&amp;height=554&amp;lang=ru_RU&amp;scroll=true"></script>

                    </section>
                    @if ($relatedPosts->count() > 0 )
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>
                            <div class="row">
                                @foreach ($relatedPosts as $relatedPosts)
                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        <img src="{{ asset('storage/' . $relatedPosts->preview_image) }}" alt="related post" class="post-thumbnail">
                                        <p class="post-category">{{ $relatedPosts->category->title }}</p>
                                        <a href="{{ route('post.show', $relatedPosts->id) }}"><h5 class="post-title">{{ $relatedPosts->title }}</h5></a>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif

                    <div class="row">
                        <div class="col-lg-9 mx-auto">
                            @if ($relatedGroups->count() > 0 )
                                <section class="related-posts">
                                    <h2 class="section-title mb-4" data-aos="fade-up">Отправьтесь в поход!</h2>
                                    <div class="row">
                                        @foreach ($relatedGroups as $relatedGroup)
                                            <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                                                <a href="{{ route('group.show', $relatedGroup->id) }}" class="blog-post-permalink">
                                                    <h6 class="blog-post-title">{{ $relatedGroup->title }}</h6>
                                                </a>
                                                <div class="d-flex justify-content-between">
                                                    <p class="blog-post-category">{{ $relatedGroup->post->title }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </section>
                            @endif
                        </div>
                    </div>

                    <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Или</h2>
                            <div class="row">

                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        <a href="{{ route('group.create') }}"><h4 class="post-title">Создайте группу</h4></a>

                                    </div>
                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        <a href="{{ route('group.index', $post->id) }}"><h4 class="post-title">Все группы</h4></a>
                                    </div>

                            </div>
                        </section>



                    <section class="comment-list mb-5">
                        <h2 class="section-title mb-5" data-aos="fade-up">Комментарии ({{ $post->comments->count() }})</h2>
                        @foreach ($post->comments as $comment)
                            <div class="comment-text mb-3">
                                <span class="username">
                                    <div>
                                        {{ $comment->user->name }}
                                    </div>
                                    <span class="text-muted float-right">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                                </span><!-- /.username -->
                                {{ $comment->message }}
                            </div>
                        @endforeach

                    </section>
                    @auth()
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Оставить комментарий</h2>
                        <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                <label for="comment" class="sr-only">Comment</label>
                                <textarea name="message" id="comment" class="form-control" placeholder="Напишите комментарий!" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Оставить комментарий" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>

@endsection
