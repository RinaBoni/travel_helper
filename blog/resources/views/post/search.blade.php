@extends('layouts.main')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="text-center mt-3">Поиск</h1>
        {{-- <form action="#" method="get"> --}}
        <form action="{{route('search.index')}}" method="get">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Поиск</label>
                <input name="search_field" @if(isset($_GET['search_field'])) value="{{$_GET['search_field']}}" @endif type="text" class="form-control" id="exampleFormControlInput1" placeholder="Введите запрос">
            </div>
            {{-- <div class="mb-3">
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
            </div> --}}
            {{-- <div class="mb-3">
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
            </div> --}}
            <button type="submit" class="btn btn-warning btn-lg">Подтвердить</button>
        </form>
        <h3 class="widget-title">Достопримечательности</h3>
        <div class="row mt-5">
            @foreach($posts as $post)
                <div class="col-lg-4">
                    <div class="card mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                <h5 class="card-title">{{$post->title}}</h5>
                            </a>
                            <p class="card-text">{{ mb_substr( $post->content , 0 , 100) }}...</p>
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
        </div>
        <h3 class="widget-title">Группы</h3>
        <div class="row mt-5">
            @foreach($groups as $group)
                <div class="col-lg-4">
                    <div class="card mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$group->title}}</h5>
                            <p class="card-text">{{mb_substr($group->post->title, 0 , 100)}}</p>
                            {{-- <div class="btn btn-primary">{{$group->$post->category['title']}}</div> --}}
                            @foreach($group->post->tags as $tag)
                                <div class="btn btn-warning btn-lg">{{$tag->title}}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="mx-auto" style="margin-top: 80px;">
                {{ $posts->links() }}
            </div>
        </div>
        {{-- {{$products->withQueryString()->links('vendor.pagination.bootstrap-4')}} --}}
    </div>
    <script src="/js/app.js"></script>
</main>


@endsection
