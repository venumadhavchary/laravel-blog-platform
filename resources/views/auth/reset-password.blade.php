@extends('layouts.index')

@section('main')
    
    <div class="form-container">
        <div class="form-header ">Reset Password</div> 
        <form action="{{ route('forgotPassword') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ $user->email }}" readonly>
            </div>            
            <div class="form-group">    
                <label>Password</label>
                <input type="password" name="password"  required>
            </div>
            <div class="form-group">
                <label>Password Confirmation</label>
                <input type="password" name="password_confirmation" required>
            <div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Change Password</button>
            </div>
        </form>
    </div>

@endsection



@section('footer')
@endsection
