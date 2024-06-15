@extends('layouts.main')

@section('content')
<main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $district }}</h1>
            <section class="featured-posts-section">
                <h3 class="widget-title">Достопримечательности</h3>
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                    <img src="{{ asset('storage/' . $post->preview_image)}}" alt="blog post">
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
                                                    <i class="fa-solid fa-heart" style="color: #63E6BE;"></i>
                                                @else
                                                    <i class="fa-regular fa-heart" style="color: #B197FC;"></i>
                                                @endif
                                            </button>
                                    </form>
                                @endauth
                                @guest
                                    <div>
                                        <span>{{ $post->liked_users_count }}</span>
                                        <i class="fa-regular fa-heart" style="color: #B197FC;"></i>
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
            @if ($groups->count() > 0)
                <section class="related-posts">
                    <h2 class="section-title mb-4" >Группы в этот район</h2>
                    <div class="row">
                        @foreach ($groups as $group)
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
                </section>
            @endif
        </div>
    </main>

@endsection
