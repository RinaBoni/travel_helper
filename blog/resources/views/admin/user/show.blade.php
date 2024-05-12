@extends('admin.layouts.main')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6 d-flex align-items-center">
        <h1 class="m-0 mr-2">{{$user->title}}</h1>
        <a class="m-0 mr-2" href="{{ route('admin.user.edit', $user->id) }}"><i class="fa-solid fa-pen" style="color: #1b3f7e;"></i></a>
        <form class="m-0 mr-2" action="{{ route('admin.user.delete', $user->id) }}", method="POST">
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
            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Пользователи</a></li>
            <li class="breadcrumb-item active">{{$user->name}}</li>
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
                        <td>{{$user->id}}</td>
                    </tr>
                    <tr>
                        <td>Имя</td>
                        <td>{{$user->name}}</td>
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