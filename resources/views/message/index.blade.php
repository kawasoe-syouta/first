@extends('layouts.app')

@section('content')
<link href="{{ asset('css/message.css') }}" rel="stylesheet">
<div class="mt-5 chat-container row justify-content-center">
    <div class="chat-area">
        <div class="card">
            <div class="card-header">Message</div>
            <div class="card-body chat-card">
                <div id="comment-data"></div>
            </div>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('message') }}">
    @csrf
    <div class="comment-container row justify-content-center">
        <div class="input-group comment-area">
            <textarea class="form-control" id="comment" name="message" placeholder="push massage (shift + Enter)"
                aria-label="With textarea"
                onkeydown="if(event.shiftKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
            <button type="submit" id="submit" class="btn btn-outline-primary comment-btn">Submit</button>
        </div>
    </div>
</form>

@section('js')
<script src="{{ asset('js/message.js') }}"></script>
@endsection
@endsection