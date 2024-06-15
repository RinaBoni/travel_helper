@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" >{{ $post->title }}</h1>{{-- <p class="edica-blog-post-meta"  data-aos-delay="200"> {{ $date->translatedFormat('F') }} {{ $date->day }}  {{$date->year}} • {{ $date->format('H:i') }} • {{ $post->comments->count }} Комментария</p> --}}
            <p class="edica-blog-post-meta"  data-aos-delay="200"> {{ $date->translatedFormat('F') }} {{ $date->day }}  {{$date->year}} • {{ $date->format('H:i') }} • {{ $post->comments->count() }} Комментария</p>


            <section class="blog-post-featured-img" data-aos="" data-aos-delay="">
                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
                    <ol class="carousel-indicators">
                        @if($caruselImages)
                            @foreach ($caruselImages as $image)
                                @if ($loop->first)
                                    <li data-target="#myCarousel" data-slide-to="{{ $image->id }}" class="active"></li>
                                @else
                                    <li data-target="#myCarousel" data-slide-to="{{ $image->id }}" class=""></li>
                                @endif
                            @endforeach
                        @endif
                    </ol>
                    <div class="carousel-inner">
                        @if($caruselImages)
                            @foreach ($caruselImages as $image)
                                <div class="carousel-item @if($loop->first) active @endif">
                                    <img class="{{ $image->id }}-slide" src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->id }}-slide">
                                </div>
                            @endforeach
                        @endif
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







            {{-- <section class="blog-post-featured-img" data-aos="" data-aos-delay="">
                <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content"> --}}
                <div class="row">
                    <div class="col-lg-9 mx-auto" >
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="py-3">
                        @if ($post->vk)
                            <a href="{{ $post->vk }}"> <i class="fa-brands fa-vk" style="color: #B197FC;"></i> </a>
                        @endif
                        @if ($post->youtube)
                            <a href="{{ $post->youtube }}"><i class="fa-brands fa-youtube" style="color: #B197FC;"></i> </a>
                        @endif
                        @if ($post->telegram)
                            <a href="{{ $post->telegram }}"><i class="fa-brands fa-telegram" style="color: #B197FC;"></i> </a>
                        @endif
                        @if ($post->odnoklassniki)
                            <a href="{{ $post->odnoklassniki }}"><i class="fa-brands fa-odnoklassniki" style="color: #B197FC;"></i> </a>
                        @endif
                        @if ($post->website)
                            <a href="{{ $post->website }}"><i class="fa-solid fa-globe" style="color: #B197FC;"></i> </a>
                        @endif
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

                        @if ($post->map)
                            <script type="text/javascript" charset="utf-8" async src="{{ $post->map }}&amp;width=100%25&amp;height=554&amp;lang=ru_RU&amp;scroll=true"></script>
                        @endif
                    </section>

                    @if ($relatedPosts->count() > 0 )
                        <section class="related-posts">
                            <h2 class="section-title mb-4" >Похожие достопримечательности</h2>
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
                    @if ($relatedGroups->count() > 0 )
                        <section class="related-posts">
                            <h2 class="section-title mb-4" >Отправьтесь в поход!</h2>
                            <div class="row">
                                @foreach ($relatedGroups as $group)
                                <div class="col-lg-4">
                                    <div class="card mb-3" style="width: 18rem;">
                                        <div class="card-body">
                                            <a href="{{ route('group.show', $group->id) }}" class="blog-post-permalink">
                                            <h5 class="card-title">{{$group->title}}</h5>
                                            </a>
                                            <p class="card-text">{{mb_substr($group->post->title, 0 , 100)}}</p>

                                            <p>{{ $group->departure_date->translatedFormat('j F Y') }} - {{ $group->arrival_date->translatedFormat('j F Y') }}</p>

                                            @foreach ($groupUsers as $userInGroup)
                                                @if ($userInGroup->group_id == $group->id)
                                                    @if ($currentUser == $userInGroup->user_id)
                                                        @php
                                                            $currentUserInGroup =  $currentUser
                                                        @endphp
                                                        @php
                                                            break
                                                        @endphp
                                                    @else
                                                        @php
                                                            $currentUserInGroup =  null
                                                        @endphp
                                                    @endif
                                                @endif
                                            @endforeach
                                            @auth
                                                @if ($currentUserInGroup)
                                                <form action="{{ route('group.leave', $group->id) }}", method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning btn-lg" data-aos="" data-aos-delay="300">
                                                        Покинуть группу
                                                    </button>
                                                </form>
                                                @else
                                                <form action="{{ route('group.join', $group->id) }}", method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning btn-lg" data-aos="" data-aos-delay="300">
                                                        Присоединиться
                                                    </button>
                                                </form>

                                                @endif
                                            @endauth

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        {{-- </section>
                        <section class="related-posts"> --}}
                            <h3 class="section-title mb-4" >Или</h3>
                            <div class="row">
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <a href="{{ route('group.create') }}"><h4 class="post-title">Создайте группу</h4></a>
                                </div>
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <a href="{{ route('group.index', $post->id) }}"><h4 class="post-title">Все группы</h4></a>
                                </div>
                            </div>
                        </section>
                        @else
                        <section class="related-posts">
                            <h2 class="section-title mb-4" >Отправьтесь в поход!</h2>
                            <div class="row">
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <a href="{{ route('group.create') }}"><h4 class="post-title">Создайте группу</h4></a>
                                </div>
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <a href="{{ route('group.index', $post->id) }}"><h4 class="post-title">Все группы</h4></a>
                                </div>
                            </div>
                        </section>

                    @endif


                    <section class="comment-list mb-5">
                        <h2 class="section-title mb-5" >Комментарии ({{ $post->comments->count() }})</h2>
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
                        <h2 class="section-title mb-5" >Оставить комментарий</h2>
                        <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" >
                                <label for="comment" class="sr-only">Comment</label>
                                <textarea name="message" id="comment" class="form-control" placeholder="Напишите комментарий!" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" >
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
