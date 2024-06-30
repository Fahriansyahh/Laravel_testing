@extends('layouts.body')

@section('container')
    <main class="form-signin mt-5">
        <form action="/signin" method="post">
            @csrf
            <h1 class="h4 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating mb-1">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                    id="username" placeholder="username" value="{{ old('username') }}" required>
                <label for="username">Username</label>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                <label for="password">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" id="remember" name="remember"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <div class="mt-2 d-flex justify-content-center">
                <a href="/signup" class="">create account</a>
            </div>
        </form>
    </main>
@endsection
