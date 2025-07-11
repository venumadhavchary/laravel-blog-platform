@extends('layouts.index')


@section('main')   
<div class="container">
    <div class="card">
        <div class="form-header">
            <h2>Contact Us<h2>
            <p class="form-header">Please fill the form for contacting us</p>
            <form action="{{ route('contact') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" placeholder="Message" rows="6" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-big">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection



@section('footer')
@endsection
