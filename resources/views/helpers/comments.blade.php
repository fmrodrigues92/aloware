@forelse ($comments as $comment)
                      
    <div class="col-12">
        <hr>
    </div>
    <div class="col-12 ">
        <div><strong>Name: </strong> {{ $comment->name }}</div>
        <div class="d-flex flex-row">
            <div class=""><strong class="">Message: </strong></div>
            <div class="ms-1 md">{!! $comment->comment !!}</div>
        </div>
        <div>
            <a class="btn btn-link ps-0" onclick="appendComment('reply-{{$comment->id}}')">Reply</a>
            <div class="reply-{{$comment->id}} d-none">
                @include('helpers.form')
            </div>
        </div>
        @if(isset($comment->comments) && count($comment->comments) > 0)
            <div class="row ps-4">
                @include('helpers.comments', ['comments' => $comment->comments])
            </div>
        @endif
    </div>

@empty
    <span>No comments</span>
@endforelse