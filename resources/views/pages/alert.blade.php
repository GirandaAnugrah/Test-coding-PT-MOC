@extends('layouts.main')

@section('content')
    <div class="test">
        <h3>Maaf generate OTP sudah melebihi batas</h3>
        <h6 class="text-center">Silahkan coba beberapa saat lagi</h6>
        <a href="{{route('home')}}">Back to Home</a>
    </div>
@endsection
