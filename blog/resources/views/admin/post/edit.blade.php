@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование поста</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Достопримечательности</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.post.show', $post->id) }}">{{$post->title}}</a></li>
                        <li class="breadcrumb-item active">Редактирование</li>
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
                        <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="title" placeholder="Название поста"
                                    value="{{ $post->title }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group w-50">
                                <label>Категория</label>
                                <select name="category_id" class="form-control" data-placeholder="Выберите категорию">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $post->category_id ? ' selected' : '' }}>
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
                                            {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}
                                            value="{{ $tag->id }}">{{ $tag->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tag_ids')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <textarea id="summernote" name="content"> {{$post->content }}</textarea>
                                @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <label>Ссылка на Яндекс.Карту</label>
                            <div class="form-group w-50">
                                {{-- <input type="text" class="form-control" name="map" placeholder="Яндекс.Карта" value="{{ old('map') }}"> --}}
                                <input type="text" class="form-control" name="map" placeholder="Яндекс.Карта" value="{{ $post->map }}">
                                @error('map')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="card direct-chat direct-chat-primary w-50">
                                <div class="card-header ui-sortable-handle" style="cursor: move;">
                                    <h3 class="card-title">Адрес</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-footer">
                                        <label>Страна</label>
                                        <input type="text" name="country" placeholder="Страна" class="form-control" value="{{ $post->country }}">
                                        @error('country')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label>Регион</label>
                                        <input type="text" name="region" placeholder="Регион" class="form-control" value="{{ $post->region }}">
                                        @error('region')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label>Район</label>
                                        <input type="text" name="district" placeholder="Район" class="form-control" value="{{ $post->district }}">
                                        @error('district')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label>Город</label>
                                        <input type="text" name="city" placeholder="Город" class="form-control" value="{{ $post->city }}">
                                        @error('city')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label>Улица</label>
                                        <input type="text" name="street" placeholder="Улица" class="form-control mb-2" value="{{ $post->street }}">
                                        @error('street')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label>Здание</label>
                                        <input type="text" name="building" placeholder="Здание" class="form-control mb-2" value="{{ $post->building }}">
                                        @error('building')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label>Координаты</label>
                                        <input type="text" name="coordinates" placeholder="Координаты" class="form-control mb-2" value="{{ $post->coordinates }}">
                                        @error('coordinates')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>



                            <div class="card direct-chat direct-chat-primary w-50">
                                <div class="card-header ui-sortable-handle" style="cursor: move;">
                                    <h3 class="card-title">Ссылки</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-footer">
                                        <label>Сайт</label>
                                        <input type="text" name="website" placeholder="сайт" class="form-control" value="{{ $post->website }}">
                                        @error('website')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label>YouTube</label>
                                        <input type="text" name="youtube" placeholder="youtube" class="form-control" value="{{ $post->youtube }}">
                                        @error('youtube')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label>вконтакте</label>
                                        <input type="text" name="vk" placeholder="vk" class="form-control" value="{{ $post->vk }}">
                                        @error('vk')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label>одноклассники</label>
                                        <input type="text" name="odnoklassniki" placeholder="odnoklassniki" class="form-control" value="{{ $post->odnoklassniki }}">
                                        @error('odnoklassniki')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label>Telegram</label>
                                        <input type="text" name="telegram" placeholder="telegram" class="form-control mb-2" value="{{ $post->telegram }}">
                                        @error('telegram')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>

                            <div class="form-group w-50">
                                <label for="exampleInputFile">Добавить привью</label>
                                <div class="w-50 mb-2">
                                <img src="{{asset('storage/' . $post->preview_image)}}" alt="preview_image" class="w-50">
                                </div>
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
                                <label for="exampleInputFile">Добавить главное изображение</label>
                                <div class="w-50 mb-2">
                                <img src="{{url('storage/' . $post->main_image)}}" alt="main_image" class="w-50">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image">
                                        <label class="custom-file-label">Выберете изображение</label>
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
                                <input type="submit" class="btn btn-primary" value="Обновить">
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
@endsection
