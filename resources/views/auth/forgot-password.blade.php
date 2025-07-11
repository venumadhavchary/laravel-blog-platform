@extends('layouts.index')

@section('main')
    <h1>Forgot Password</h1> 
    <div class="container">
        <form action="{{ route('forgotPassword') }}" method="POST">
            @csrf
            <label>Email</label>
            <input type="email" name="email" required>
            
            <button class="btn btn-primary" type="submit">Send Reset Password Link</button>
        </form>
    </div>

@endsection



@section('footer')
@endsection
