@extends('layouts.index')

@section('main')
    <div class="container">
        <div class="card">
            <div class="form-header">
                <h2>Login</h2>
                <p>Please sign in to continue</p>
            </div>
            
        @include('layouts.errorsandsuccess')
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                </div>
                <div class="form-group" style="display:flex; justify-content: space-between; align-items:center; gap:1rem; flex-wrap:wrap">
                    <button class="btn btn-primary" type="submit">Login</button>
                    <div style="display:flex; gap:1rem; flex-wrap:wrap">
                        <a class="nav-link" href="{{ route('signup.show') }}">Sign Up</a>
                        <a class="nav-link" href="{{ route('forgotPassword.show') }}">Forgot Password</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection



@section('footer')
@endsection
