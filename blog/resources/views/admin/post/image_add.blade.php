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
                            <li class="breadcrumb-item active">Добавление изображения</li>
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


                        <form action="{{ route('admin.image.imagestore', $post->id) }}" method="POST" class="submit-request-form clearfix" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Добавить </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <label class="custom-file-label">Выберете изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>
                                </div>
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Добавить">
                            </div>
                        </form>
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
