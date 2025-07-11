@extends('layouts.index')

@section('main')
<div class="container">
    <h1>Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}!</p>
    
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>
@endsection