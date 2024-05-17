@extends('admin.layouts.main')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6 d-flex align-items-center">
        <h1 class="m-0 mr-2">{{$post->title}}</h1>
        <a class="m-0 mr-2" href="{{ route('admin.post.edit', $post->id) }}"><i class="fa-solid fa-pen" style="color: #1b3f7e;"></i></a>
        <form class="m-0 mr-2" action="{{ route('admin.post.delete', $post->id) }}", method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="border-0 bg-transparent">
                <i class="fa-solid fa-trash-can" style="color: #1b3f7e;"></i>
            </button>
        </form>

        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Достопримечательности</a></li>
            <li class="breadcrumb-item active">{{$post->title}}</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- Small boxes (Stat box) -->

    <div class="row">
        <div class="col-6">

            <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{$post->id}}</td>
                    </tr>
                    <tr>
                        <td>Название</td>
                        <td>{{$post->title}}</td>
                    </tr>
                    <tr>
                        <td>Категория</td>
                        <td>{{ $post->category_id }}</td>
                    </tr>
                    <tr>
                        <td>Тэги</td>
                        <td>
                            @if ($tags->count() > 1)
                                @foreach ($tags as $tag)
                                    {{ $tag}},
                                @endforeach
                            @else
                                @foreach ($tags as $tag)
                                    {{ $tag}}
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Текст</td>
                        <td>{{ $post->content }}</td>
                    </tr>
                    <tr>
                        <td>Ссылка на Яндекс.Карту</td>
                        <td>{{ $post->map }}</td>
                    </tr>
                    <tr>
                        <td>Страна</td>
                        <td>{{ $post->country }}</td>
                    </tr>
                    <tr>
                        <td>Регион</td>
                        <td>{{ $post->region }}</td>
                    </tr>
                    <tr>
                        <td>Район</td>
                        <td>{{ $post->district }}</td>
                    </tr>
                    @if ($post->city)
                        <tr>
                            <td>Город</td>
                            <td>{{ $post->city }}</td>
                        </tr>
                    @endif
                    @if ($post->street)
                        <tr>
                            <td>Улица</td>
                            <td>{{ $post->street }}</td>
                        </tr>
                    @endif
                    @if ($post->building)
                        <tr>
                            <td>Здание</td>
                            <td>{{ $post->building }}</td>
                        </tr>
                    @endif
                    @if ($post->coordinates)
                        <tr>
                            <td>Координаты</td>
                            <td>{{ $post->coordinates }}</td>
                        </tr>
                    @endif
                    @if ($post->website)
                        <tr>
                            <td>Сайт</td>
                            <td>{{ $post->website }}</td>
                        </tr>
                    @endif
                    @if ($post->youtube)
                        <tr>
                            <td>YouTube</td>
                            <td>{{ $post->youtube }}</td>
                        </tr>
                    @endif
                    @if ($post->vk)
                        <tr>
                            <td>вконтакте</td>
                            <td>{{ $post->vk }}</td>
                        </tr>
                    @endif
                    @if ($post->odnoklassniki)
                        <tr>
                            <td>одноклассники</td>
                            <td>{{ $post->odnoklassniki }}</td>
                        </tr>
                    @endif
                    @if ($post->telegram)
                        <tr>
                            <td>Telegram</td>
                            <td>{{ $post->telegram }}</td>
                        </tr>
                    @endif
                    {{-- @if ($post->preview_image)
                        <tr>
                            <td>привью</td>
                            <td><img src="{{asset('storage/' . $post->preview_image)}}" alt="preview_image" class="w-50"></td>
                        </tr>
                    @endif
                    @if ($post->main_image)
                        <tr>
                            <td>главное изображение</td>
                            <td><img src="{{url('storage/' . $post->main_image)}}" alt="main_image" class="w-50"></td>
                        </tr>
                    @endif --}}

                </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            </div>
        </div>
        <div class="col-12">
            <div class="card card-primary">
            <div class="card-header">
                <h4 class="card-title">Изображения</h4>
                <a class="m-0 mr-2" href="{{ route('admin.image.show', $post->id) }}"><i class="fa-solid fa-pen" style="color: #fcfcfc;"></i></a>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($images as $imagee)
                        <div class="col-sm-2">
                                <img src="{{asset('storage/' . $imagee->image)}}" class="img-fluid mb-2" alt="white sample">
                        </div>
                    @endforeach
                <div class="col-sm-2">
                    <img src="{{url('storage/' . $post->preview_image)}}" class="img-fluid mb-2" alt="white sample">
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
