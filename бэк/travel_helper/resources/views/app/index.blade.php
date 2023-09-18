@extends('layout.layout')
@vite(['resources/scss/app.scss', 'resources/js/app/app.js'])

@section('content')
    <div id="app"></div>
@endsection

@push('scripts')
    <script>
      window.user = @json(new \App\Http\Resources\User\UserLoginResource(auth()->user()), JSON_THROW_ON_ERROR)
    </script>
@endpush



