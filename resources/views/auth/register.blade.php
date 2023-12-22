@extends('layouts.main')
@section('content')
    <div class="my-card">
        @error('otp_error')
                <p>
                    {{ $message }}
                </p>
        @enderror
        <h3 class="text-center">Register</h3>

        <form action="{{route('register.index')}}" method="POST">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" name="name" class="form-control @error('anme') is-invalid @enderror" id="name" value="{{ old('name')}}"">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email')}}">
                @error('email')
                <div  class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="noTelp" class="form-label">Nomor Telephone</label>
                <input type="number" name="noTelp" class="form-control @error('noTelp') is-invalid @enderror" id="noTelp" value="{{ old('noTelp')}}">
                @error('noTelp')
                <div  class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="provinsi" class="form-label">Provinsi</label>
                <input type="text" name="provinsi" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" value="{{ old('provinsi')}}">
                @error('provinsi')
                <div  class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kota" class="form-label">Kabupaten Kota</label>
                <input type="text" name="kota" class="form-control @error('kota') is-invalid @enderror" id="kota" value="{{ old('kota')}}">
                @error('kota')
                <div  class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <input type="text" name="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" value="{{ old('kecamatan')}}">
                @error('kecamatan')
                <div  class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password')}}">
                @error('password')
                <div  class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
