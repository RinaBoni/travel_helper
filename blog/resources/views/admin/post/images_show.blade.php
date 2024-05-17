@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление изображений</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Достопримечательности</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.show', $post->id) }}">{{$post->title}}</a></li>
                            <li class="breadcrumb-item active">Изображения</li>
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

                    <div class="col-12">
                        <span class="input-group-append mb-2">
                            <a href="{{ route('admin.image.image', $post->id) }}"><button type="button" class="btn btn-primary">Добавить изображение</button></a>
                        </span>
                        <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Изображения</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($images as $imagee)
                                    <div class="col-sm-2">
                                            <img src="{{asset('storage/' . $imagee->image)}}" class="img-fluid mb-2" alt="white sample">
                                            <form class="m-0 mr-2" action="#", method="POST">
                                            {{-- <form class="m-0 mr-2" action="{{ route('admin.image.delete', $imagee->id) }}", method="POST"> --}}
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="fa-solid fa-trash-can" style="color: #1b3f7e;"></i>
                                                </button>
                                            </form>
                                            <form class="m-0 mr-2" action="#", method="POST">
                                            {{-- <form class="m-0 mr-2" action="{{ route('admin.image.delete', $imagee->id, $post->id) }}", method="POST"> --}}
                                                @csrf
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="title_image">
                                                    <label class="form-check-label" for="title_image">Титульное изображение</label>
                                                </div>
                                            </form>
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

    <script>
        import jqueryMultifile from "https://cdn.skypack.dev/jquery-multifile@2.2.2";

        $('input.file_upload_items').MultiFile({
                max: 6,
                accept: 'jpeg|jpg|png,svg',
                STRING: {
                    remove: '',
                    denied:'Выбранный тип файла (.$ext) не доступен для загрузки! Выберите .jpeg, .jpg .png или .svg',
                    duplicate:'Этот файл уже прикреплён:\n$file!'
                }
            });

        $('.upload_files_button').click(function(){
        $('input[id^=MultiFile1]').last().click();
        });
    </script>
@endsection
