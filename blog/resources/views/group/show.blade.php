@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $group->title }}</h1>{{-- <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200"> {{ $date->translatedFormat('F') }} {{ $date->day }}  {{$date->year}} • {{ $date->format('H:i') }} • {{ $post->comments->count }} Комментария</p> --}}

            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <h5>Место: {{ $group->post->title }}</h5>
                    </div><div class="col-lg-9 mx-auto">
                        <h6>Дата отправления: {{ $departure_date->translatedFormat('F') }} {{ $departure_date->day }}  {{$departure_date->year}}</h6>
                    </div>
                    <div class="col-lg-9 mx-auto">
                        <h6>Дата возвращения: {{ $arrival_date->translatedFormat('F') }} {{ $arrival_date->day }}  {{$arrival_date->year}}</h6>
                    </div>
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $group->additional_information !!}
                    </div>
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        @foreach ($users as $user)
                        @if ($user->id == $currentUser)
                            <div>
                                Вы состоите в группе
                            </div>
                        @endif
                        @endforeach
                        @if ($users->count() > 0 )
                        <h6>Участники:</h6>

                            @foreach ($users as $user)
                            <div>
                                Имя: {{ $user->name }}, почта: {{ $user->email }}
                            </div>
                            @endforeach
                        @else
                            <h6>Пока в группе нет участников</h6>
                        @endif
                    </div>

                    @auth
                        @if ($currentUser == $group->creator)
                            <div class="col-lg-9 mx-auto" data-aos="fade-up">
                                <h6>Вы являетесь создателем группы</h6>
                            </div>
                            <div class="col-lg-9 mx-auto" data-aos="fade-up">
                                <a href="{{ route('group.edit', $group->id) }}" class="btn btn-warning btn-lg"><i class="fa-solid fa-pen" style="color: #1b3f7e;"></i></a>
                            </div>
                            <div class="col-lg-9 mx-auto" data-aos="fade-up">
                                <form action="{{ route('group.delete', $group->id) }}", method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning btn-lg" data-aos="" data-aos-delay="300">
                                        <i class="fa-solid fa-trash-can" style="color: #1b3f7e;"></i>
                                    </button>
                                </form>
                            </div>
                        @endif


                        @if ($currentUserGroup)
                            <div class="col-lg-9 mx-auto" data-aos="fade-up">
                                <div class="col-lg-9 mx-auto" data-aos="fade-up">
                                    <form action="{{ route('group.leave', $group->id) }}", method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-lg" data-aos="" data-aos-delay="300">
                                            Покинуть группу
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-9 mx-auto" data-aos="fade-up">
                                <div class="col-lg-9 mx-auto" data-aos="fade-up">
                                    <form action="{{ route('group.join', $group->id) }}", method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-lg" data-aos="" data-aos-delay="300">
                                            Присоединиться
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endauth
                    @guest
                    <div class="row">
                        <div class="col-lg-9 mx-auto">
                            <section class="related-posts">
                                <h4 class="section-title mb-4" data-aos="fade-up">Войдите в аккаунт чтобы присоединиться</h4>
                            </section></div></div>
                    @endguest

                </div>
            </section>

            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if ($relatedGroups->count() > 0 )
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Другие группы в это место</h2>
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



            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Отправьтесь в поход!</h2>
                        <div class="row">
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <a href="{{ route('group.create') }}"><h4 class="post-title">Создайте группу</h4></a>
                            </div>
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <a href="{{ route('group.index') }}"><h4 class="post-title">Все группы</h4></a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>

@endsection
