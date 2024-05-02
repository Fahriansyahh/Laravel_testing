@extends('layouts.body')

@section('container')
    <main class="form-signin mt-5">
        <form>
            <h1 class="h4 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating mb-1">
                <input type="username" class="form-control" id="floatingUsername" placeholder="username">
                <label for="floatingUsername">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <div class="mt-2 d-flex justify-content-center">
                <a href="/signup" class="">create account</a>
            </div>
        </form>
    </main>
@endsection
