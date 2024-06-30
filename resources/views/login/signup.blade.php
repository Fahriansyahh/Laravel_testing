@extends('layouts.body')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('container')
    <main class="form-signin mt-5">
        <form action="/signup" method="post">
            @csrf
            <h1 class="h4 mb-3 fw-normal">Please sign up</h1>

            <div class="form-floating mb-1">
                <input type="email" class="form-control    @error('email') is-invalid @enderror" id="email"
                    name="email" placeholder="email" value="{{ old('email') }}">
                <label for="email">Email</label>
                @error('email')
                    <div class="invalid-feedback">
                        Example invalid form file feedback
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-1">
                <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username"
                    name="username" placeholder="username" value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                    <div class="invalid-feedback">
                        Example invalid form file feedback
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" placeholder="password">
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        Example invalid form file feedback
                    </div>
                @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
            <div class="mt-2 d-flex justify-content-center">
                <a href="/signin" class="">login account</a>
            </div>
        </form>
    </main>
@endsection
