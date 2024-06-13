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
            <a class="m-0 mr-2" href="{{ route('person.personal.edit', $user->id) }}"><i class="fa-solid fa-pen" style="color: #1b3f7e;"></i></a>
            <form class="m-0 mr-2" action="{{ route('person.personal.delete', $user->id) }}", method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="border-0 bg-transparent">
                    <i class="fa-solid fa-trash-can" style="color: #1b3f7e;"></i>
                </button>
            </form>

            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('person.main.index') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('person.personal.index') }}">Личный данные</a></li>
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
                <div class="col-6">

                    <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                        <tbody>
                            @if ($user->user_image)
                                <tr>
                                    <td>привью</td>
                                    <td><img src="{{asset('storage/' . $user->user_image)}}" alt="user_image" class="w-50"></td>
                                </tr>
                            @endif
                            <tr>
                                <td>Имя</td>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <td>Фамилия</td>
                                <td>{{$user->lastname}}</td>
                            </tr>
                            <tr>
                                <td>Почта</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Номер телефона</td>
                                <td>{{ $user->phone_number }}</td>
                            </tr>
                            <tr>
                                <td>Вы готовы поделиться машиной?</td>
                                <td>
                                    @if($user->car) Да
                                    @else Нет
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Вы хотите получать новостную рассылку?</td>
                                <td>
                                    @if($user->newsletter) Да
                                    @else Нет
                                    @endif
                                </td>
                            </tr>

                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
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
