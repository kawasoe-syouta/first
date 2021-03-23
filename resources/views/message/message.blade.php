<link href="{{ asset('css/message.css') }}" rel="stylesheet">
<div class="media">
    <div class="media-body comment-body">
        <div class="row">
            <span class="comment-body-user">{{ $message->name }}</span>
            <span class="comment-body-time">{{ $message->created_at }}</span>
        </div>
        <span class="comment-body-content">{!! nl2br(e($message->message)) !!}</span>
    </div>
</div>