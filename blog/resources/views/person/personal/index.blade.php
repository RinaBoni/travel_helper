@extends('person.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
            <h1 class="m-0 mr-2">{{$user->name}}</h1>

            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Личный данные</a></li>
                {{-- <li class="breadcrumb-item active">{{$user->name}}</li> --}}
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
                    <form action="{{ route('person.personal.update', $user->id) }}" method="POST" class="w-25" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="exampleInputFile">Фотография</label>
                            {{-- <label for="exampleInputFile">{{ $user->user_image }}</label> --}}
                            <img src="{{ asset('storage/' . $user->user_image) }}" alt="featured image" class="w-100">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="user_image">
                                    <label class="custom-file-label">Выберете изображение</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузка</span>
                                </div>
                            </div>
                            @error('user_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Имя</label>
                            {{-- <label>{{ $user->name }}</label> --}}
                            <input type="text" class="form-control" name="name" placeholder="Имя" value="{{ $user->name }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Фамилия</label>
                            {{-- <label>{{ $user->lastname }}</label> --}}
                            <input type="text" class="form-control" name="lastname" placeholder="Фамилия" value="{{ $user->lastname }}">
                            @error('lastname')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Номер телефона</label>
                            {{-- <label>{{ $user->phone_number }}</label> --}}
                            <input type="text" class="form-control" name="phone_number" placeholder="Номер телефона" value="{{ $user->phone_number }}">
                            @error('phone_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Почта</label>
                            {{-- <label>{{ $user->email }}</label> --}}
                            <input type="text" class="form-control" name="email" placeholder="Почта" value="{{ $user->email }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="car" name="car" value="1" {{ $user->car ? 'checked' : '' }}>
                            <label class="form-check-label" for="car">Вы готовы поделиться машиной?</label>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="newsletter" name="newsletter" value="1" {{ $user->newsletter ? 'checked' : '' }}>
                            <label class="form-check-label" for="newsletter">Вы хотите получать новостную рассылку</label>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                        </div>

                        {{-- <span class="input-group-append mb-2">
                            <a href="{{ route('person.personal.edit', $user->id) }}"><button type="button" class="btn btn-primary">Изменить</button></a>
                        </span> --}}

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Изменить">
                        </div>
                    </form>


                    <form class="" action="{{ route('person.personal.delete', $user->id) }}", method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <input type="submit" class="btn btn-danger" value="Удалить профиль">
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
