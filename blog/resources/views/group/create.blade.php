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
                                <form action="{{ route('admin.user.store') }}" method="POST" >
                                @csrf
                                        <h5 data-aos="fade-up">Создание группы</h5>
                                        <div class="row">
                                            <div class="form-group col-md-6" data-aos="">
                                                <label for="name">Название группы</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="">
                                            </div>
                                            <div class="form-group col-md-6" data-aos="">
                                                <label for="place">Место</label>
                                                <select type="text" class="form-control" id="place" name="place" placeholder="">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="form-group col-md-6" data-aos="" data-aos-delay="100">
                                                <label for="date">Дата отправления</label>
                                                <input type="date" class="form-control" id="date" name="date" placeholder="дата">
                                            </div>
                                            <div class="form-group col-md-6" data-aos="" data-aos-delay="100">
                                                <label for="date">Дата возвращения</label>
                                                <input type="date" class="form-control" id="date" name="date" placeholder="дата">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col-12" data-aos="" data-aos-delay="200">
                                                <label for="message">Дополнительная информация</label>
                                                <textarea name="message" id="message" rows="9" class="form-control"></textarea>
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
