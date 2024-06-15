@extends('layouts.main')

@section('content')
<main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Группы</h1>
            <section class="featured-posts-section">
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
                                {{-- <p>{{ $group->users }}</p> --}}
                                @foreach ($group->users as $user_in_group)
                                    @if($currentUser == $user_in_group->id)
                                        @php
                                            $current_user_in_group =  $currentUser
                                        @endphp
                                        @php
                                            break
                                        @endphp
                                    @elseif ($currentUser != $user_in_group->id)
                                        @php
                                            $current_user_in_group = null
                                        @endphp
                                    @endif
                                @endforeach

                                @auth
                                    @if ($current_user_in_group)
                                    <form action="{{ route('group.leave', $group->id) }}", method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary" data-aos="" data-aos-delay="300">
                                            Покинуть группу
                                        </button>
                                    </form>

                                    @elseif ($current_user_in_group == null)
                                    <form action="{{ route('group.join', $group->id) }}", method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary" data-aos="" data-aos-delay="300">
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
                <div class="row">
                    <div class="mx-auto" style="margin-top: -80px;">
                        {{ $groups->links() }}
                    </div>
                </div>
            </section>
        </div>

    </main>

@endsection
