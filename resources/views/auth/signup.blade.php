@extends('layouts.index')

@section('main')
<div class="container">
    <div class="card">
        <div class="form-header">
            <h2>Sign Up</h2>
            <p>Please sign up to continue</p>
        </div> 
        @include('layouts.errorsandsuccess')
        <form action="{{ route('signup.register') }}" method="POST">
            @csrf 
            <div class="form-group">
                Name </label>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <labe>Username </label>
                <input type="text" name="username" value="{{ old('username') }}" required>
            </div> 
            <div class="form-group">
                <labe>Email </label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div> 
            <div class="form-group">
                <labe>Password </label>
                <input type="password" name="password" value="{{ old('password') }}" required>
            </div>
            <div class="form-group">
                <labe>Re-Enter Password </label>
                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
            </div>
            <div  style="padding-bottom: 1rem; ">
                <input type="checkbox" name="terms" value="0" required> I agree to the <a href="{{ route('terms') }}">Terms and Conditions</a> 
            </div>
            <input type="submit" class="btn btn-primary btn-big" name="submit" value="Sign Up">
        </form>
    </div>
</div>
@endsection



@section('footer')
@endsection
