@extends('layouts.main')

@section('content')
    <div class="otp-card">
        <form action="{{route('check.otp')}}" method="POST" class="mb-3">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="otp" class="form-label">OTP</label>
                <input type="text" name="otp" class="form-control" id="otp">
            </div>
            <center>
                <button type="submit" class="btn btn-primary">Submit</button>
            </center>
        </form>
        <center>
            <form action="{{route('generate.otp')}}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-primary">Generate OTP</button>
            </form>
        </center>
    </div>
@endsection


