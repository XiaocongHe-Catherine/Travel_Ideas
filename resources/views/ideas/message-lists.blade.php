
<!-- Returns all the messages for that given idea ID -->
@foreach($comments as $comment) 


<li>
    <span>{{ $comment->user->name}}: {{$comment->comment}} - {{$comment->created_at}}</span>
</li>

@endforeach
