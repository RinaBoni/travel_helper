@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление достопримечательности</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Достопримечательности</a></li>
                            <li class="breadcrumb-item active">Добавление достопримечательности</li>
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
                        <form action="{{ route('admin.post.store') }}" method="POST" class="submit-request-form clearfix" enctype="multipart/form-data">
                            @csrf
                            <label>Название</label>
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="title" placeholder="Название достопримечательности"
                                    value="{{ old('title') }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group w-50">
                                <label>Категория</label>
                                <select name="category_id" class="form-control" data-placeholder="Выберите категорию">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == old('category_id') ? ' selected' : '' }}>
                                            {{ $category->title }}</option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group w-50">
                                <label>Тэги</label>
                                <select class="select2" name="tag_ids[]" multiple="multiple"
                                    data-placeholder="Выберите тэги" style="width: 100%;">
                                    @foreach ($tags as $tag)
                                        <option
                                            {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : '' }}
                                            value="{{ $tag->id }}">{{ $tag->title }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('tag_ids')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group">
                                <textarea id="summernote" name="content"> {{ old('content') }}</textarea>
                                @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            <label>Ссылка на Яндекс.Карту</label>
                            <div class="form-group w-25">
                                {{-- <input type="text" class="form-control" name="map" placeholder="Яндекс.Карта" value="{{ old('map') }}"> --}}
                                <input type="text" class="form-control" name="map" placeholder="Яндекс.Карта"">
                                {{-- @error('map')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror --}}
                            </div>


                            <div class="form-group w-50">
                                <label for="exampleInputFile">Добавить привью</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label">Выберете изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>
                                </div>
                                @error('preview_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group w-50">
                                <label for="exampleInputFile">Добавить главное изображения</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" multiple class="custom-file-input" name="main_image">
                                        <label class="custom-file-label">Выберете изображения</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>
                                </div>
                                @error('main_image')
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
