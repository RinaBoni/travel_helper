@extends('layouts.main')

@section('content')
<body>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <h1 class="edica-page-title" data-aos="">Группа</h1>
                    <section class="edica-contact py-5 mb-5">
                        <div class="row">

                            <div class="col-md-8 contact-form-wrapper">
                                <form action="{{ route('group.store') }}" method="POST" >
                                @csrf
                                        <h5 data-aos="fade-up">Создание группы</h5>
                                        <div class="row">
                                            <div class="form-group col-md-6" data-aos="">
                                                <label for="name">Название группы</label>
                                                <input type="text" class="form-control" id="title" name="title" placeholder="" value="{{ old('title') }}">
                                                @error('title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6" data-aos="">
                                                <label for="place">Место</label>
                                                {{-- <input type="text" class="form-control" id="post_id" name="post_id" placeholder=""> --}}
                                                <select type="text" class="form-control" id="post_id" name="post_id" placeholder="">
                                                    @foreach ($posts as $post)
                                                        <option value="{{ $post->id }}"
                                                            {{ $post->id == old('post') ? ' selected' : '' }}>
                                                            {{ $post->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('post_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="form-group col-md-6" data-aos="" data-aos-delay="100">
                                                <label for="date">Дата отправления</label>
                                                <input type="date" class="form-control" id="departure_date" name="departure_date" placeholder="дата">
                                                @error('departure_date')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6" data-aos="" data-aos-delay="100">
                                                <label for="date">Дата возвращения</label>
                                                <input type="date" class="form-control" id="arrival_date" name="arrival_date" placeholder="дата">
                                                @error('arrival_date')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col-12" data-aos="" data-aos-delay="200">
                                                <label for="message">Дополнительная информация</label>
                                                <textarea name="additional_information" id="additional_information" rows="9" class="form-control" value="{{ old('additional_information') }}"></textarea>
                                                @error('additional_information')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-warning btn-lg" data-aos="" data-aos-delay="300">Создать</button>
                                </form>
                            </div>


                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>



</body>
@endsection
