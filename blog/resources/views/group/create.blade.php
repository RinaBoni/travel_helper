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
                                    
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6" data-aos="">
                                        <label for="phone">Место</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                                    </div>
                                    <div class="form-group col-md-6" data-aos="" data-aos-delay="100">
                                        <label for="email">Дата отправления</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email address">
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="form-group col-12" data-aos="" data-aos-delay="200">
                                        <label for="message">Дополнительная информация</label>
                                        <textarea name="message" id="message" rows="9" class="form-control"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-warning btn-lg" data-aos="" data-aos-delay="300">Send Message</button>
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
