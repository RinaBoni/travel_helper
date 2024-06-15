@extends('layouts.main')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="text-center mt-3">Поиск</h1>
        <form action="{{route('search.index')}}" method="get">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Поиск</label>
                <input name="search_field" @if(isset($_GET['search_field'])) value="{{$_GET['search_field']}}" @endif type="text" class="form-control" id="exampleFormControlInput1" placeholder="Введите запрос">
            </div>
            <div class="row mb-5">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <div class="row">
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <div class="form-label">Выберите категорию</div>
                                <select name="category_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option></option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                                @if(isset($_GET['category_id']))
                                                    @if($_GET['category_id'] == $category->id) selected @endif
                                                @endif>
                                            {{$category->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <div class="form-label">Выберите тэг</div>
                                <select name="tags" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option></option>
                                    @foreach($tagss as $tag)
                                        <option value="{{$tag->id}}"
                                            @if(isset($_GET['tag_id']))
                                                @if($_GET['tag_id'] == $tag->id) selected @endif
                                            @endif>
                                            {{$tag->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h4 class="section-title mb-4" data-aos="fade-up">Где искать?</h4>
                        <div class="row">
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <input type="checkbox" id="post" name="post">
                                <label for="post">Название</label>
                            </div>
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <input type="checkbox" id="group" name="group">
                                <label for="group">Описание</label>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-lg-9 mx-auto">
                <button type="submit" class="btn btn-warning btn-lg">Подтвердить</button>
            </div>
            </div>
        </form>

        <h3 class="widget-title">Достопримечательности</h3>
        <div class="row mt-2 mb-5">
            @if ($posts->count() > 0 )
                @foreach($posts as $post)
                <div class="col-lg-4">
                    <div class="card mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                <h5 class="card-title">{{$post->title}}</h5>
                            </a>
                            {{-- <p class="card-text">{!! $post->content !!}...</p> --}}
                            <p class="card-text">
                                @php
                                    $plainText = strip_tags($post->content);
                                @endphp
                                {{ mb_substr( $plainText , 0 , 100) }}...
                            </p>
                            {{-- <p class="card-text">{!! mb_substr( $post->content , 0 , 150) !!}...</p> --}}
                            <div class="btn btn-primary">{{$post->category['title']}}</div>
                            @foreach ($tagss as $tag)
                            @if (in_array($tag->id, $post->tags->pluck('id')->toArray()))
                            <div class="btn btn-warning btn-lg">{{$tag->title}}</div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-lg-4">
                    <h5>Ничего не найдено</h5>
                </div>
            @endif
        </div>

        <h3 class="widget-title">Группы</h3>
        <div class="row mt-2">
            @if ($groups->count() > 0 )
                @foreach($groups as $group)
                <div class="col-lg-4">
                    <div class="card mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$group->title}}</h5>
                            <p class="card-text">{{mb_substr($group->post->title, 0 , 100)}}</p>
                            <div class="btn btn-primary">{{$group->$post->category}}</div>
                            @foreach($group->post->tags as $tag)
                            <div class="btn btn-warning btn-lg">{{$tag->title}}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-lg-4">
                    <h5>Ничего не найдено</h5>
                </div>
            @endif
        </div>
        {{-- <div class="row">
            <div class="mx-auto" style="margin-top: 80px;">
                {{ $posts->links() }}
            </div>
        </div> --}}
        {{-- {{$products->withQueryString()->links('vendor.pagination.bootstrap-4')}} --}}
    </div>
    <script src="/js/app.js"></script>
</main>


@endsection
