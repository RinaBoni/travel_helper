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
                            <div class="form-group w-50">
                                {{-- <input type="text" class="form-control" name="map" placeholder="Яндекс.Карта" value="{{ old('map') }}"> --}}
                                <input type="text" class="form-control" name="map" placeholder="Яндекс.Карта"">
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
                                        <input type="text" name="country" placeholder="Страна" class="form-control">
                                        @error('country')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label>Регион</label>
                                        <input type="text" name="region" placeholder="Регион" class="form-control">
                                        @error('region')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label>Район</label>
                                        <input type="text" name="district" placeholder="Район" class="form-control">
                                        @error('district')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label>Город</label>
                                        <input type="text" name="city" placeholder="Город" class="form-control">
                                        @error('city')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label>Улица</label>
                                        <input type="text" name="street" placeholder="Улица" class="form-control mb-2">
                                        @error('street')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label>Здание</label>
                                        <input type="text" name="building" placeholder="Здание" class="form-control mb-2">
                                        @error('building')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label>Координаты</label>
                                        <input type="text" name="coordinates" placeholder="Координаты" class="form-control mb-2">
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
                                        <input type="text" name="website" placeholder="сайт" class="form-control">
                                        @error('website')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label>YouTube</label>
                                        <input type="text" name="youtube" placeholder="youtube" class="form-control">
                                        @error('youtube')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label>вконтакте</label>
                                        <input type="text" name="vk" placeholder="vk" class="form-control">
                                        @error('vk')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label>одноклассники</label>
                                        <input type="text" name="odnoklassniki" placeholder="odnoklassniki" class="form-control">
                                        @error('odnoklassniki')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label>Telegram</label>
                                        <input type="text" name="telegram" placeholder="telegram" class="form-control mb-2">
                                        @error('telegram')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>




                            {{-- <div class="card direct-chat direct-chat-primary w-50">
                                <div class="card-header ui-sortable-handle" style="cursor: move;">
                                    <h3 class="card-title">Номера телефонов</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <form action="#" method="post">
                                        <div id="phoneNumbersFields">
                                            <label>Номер телефона</label>
                                            <input type="text" name="phone_number" placeholder="номер телефона" class="form-control">
                                            <label>Должность сотрудника</label>
                                            <input type="text" name="type" placeholder="должность" class="form-control mb-2">
                                        </div>
                                        <span class="input-group-append mb-2">
                                            <button type="button" class="btn btn-primary" id="addEmployeeButton">Добавить еще номер</button>
                                            <button type="button" class="btn btn-danger" id="removeLastButton">Удалить последний номер</button>
                                        </span>
                                        <span class="input-group-append mb-2">
                                            <button type="button" class="btn btn-primary">Сохранить</button>
                                        </span>
                                    </form>
                                    <script>
                                        document.getElementById('addEmployeeButton').addEventListener('click', function() {
                                            // Создаем новый блок для номера телефона
                                            var newPhoneNumberBlock = document.createElement('div');
                                            newPhoneNumberBlock.innerHTML = `
                                                <label>Номер телефона</label>
                                                <input type="text" name="phone_number" placeholder="номер телефона" class="form-control">
                                                <label>Должность сотрудника</label>
                                                <input type="text" name="type" placeholder="должность" class="form-control mb-2">
                                            `;
                                            // Добавляем новый блок после последнего блока с номером телефона
                                            document.getElementById('phoneNumbersFields').appendChild(newPhoneNumberBlock);
                                        });
                                        document.getElementById('removeLastButton').addEventListener('click', function() {
                                            var phoneNumbersFields = document.getElementById('phoneNumbersFields');
                                            // Удаляем последний блок с номером телефона, если он существует
                                            if (phoneNumbersFields.children.length > 1) {
                                                phoneNumbersFields.removeChild(phoneNumbersFields.lastChild);
                                            }
                                        });
                                    </script>
                                </div>
                            </div> --}}




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



                            <form action="{{ route('admin.post.imagestore') }}" method="POST" class="submit-request-form clearfix" enctype="multipart/form-data">
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
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="title_image">
                                        <label class="form-check-label" for="title_image">Титульное изображение</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Добавить изображение">
                                </div>
                            </form>


                            @if (session()->has('message'))
                                <div class="info-box mb-3 bg-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif




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
