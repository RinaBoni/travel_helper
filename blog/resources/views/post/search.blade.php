@extends('layouts.main')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="text-center mt-3">Поиск</h1>
        <form action="{{route('search.index')}}" method="get" class="space-y-2 mb-6 ">
            <div class="flex items-baseline space-x-2">
                <x-select name="category_id" id="category_id" value="{{ request()->get('query') }}">
                    <option value="">Любая категория</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if(isset($_GET['category_id']))@if($_GET['category_id'] == $category->id) selected @endif @endif>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </x-select>
                <x-select name="district" id="district" value="{{ request()->get('query') }}">
                    @php $uniqueValues = $districtss->unique(); @endphp
                    <option value="">Любой район</option>
                    @foreach ($uniqueValues as $value)
                        <option value="{{ $value }}" @if(isset($_GET['district'])) @if($_GET['district'] == $value) selected @endif @endif>
                            {{ $value }}
                        </option>
                    @endforeach
                </x-select>
                {{-- <x-select name="tag" id="tag">
                    <option value="">Любой тэг</option>
                    @foreach ($tagss as $tag)
                        <option value="{{$tag-> id}}"
                            @if(isset($_GET['tag_id'])) @if($_GET['tag_id'] == $tag->id) selected @endif @endif>
                            {{$tag->title}}
                        </option>
                    @endforeach
                </x-select> --}}
                <x-text-input id="query" name="query" type="search" class="form-control" placeholder="Введите запрос" value="{{ request()->get('query') }}"/>
                @if ($search_field_filled == null)
                    <em style="color: #b9224d">Введите запрос!</em>
                @endif
            </div>
            <x-primary-button class="btn btn-warning btn-lg">Найти</x-primary-button>
        </form>

        @if($results)
            @if ($results->count())
                <em>Найденно {{ $results->count() }} результатов</em>
                <div class="row mt-2 mb-5">
                    @foreach ($results as $post)
                        <div class="col-lg-4">
                            <div class="card mb-3" style="width: 18rem;">
                                <div class="card-body">
                                    <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                        <h5 class="card-title">{{$post->title}}</h5>
                                    </a>
                                    <p class="card-text">
                                        @php
                                            $plainText = strip_tags($post->content);
                                        @endphp
                                        {{ mb_substr( $plainText , 0 , 100) }}...
                                    </p>
                                    <div class="btn btn-warning btn-lg">{{$post->category['title']}}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Ничего не найдено</p>
            @endif

        @endif
    </div>


    {{-- <script src="/js/app.js"></script> --}}
</main>
{{-- <script src="/js/app.js"></script> --}}


@endsection
