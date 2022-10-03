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
        <div class=" ">
            
        </div>
        <div class="d-flex">
            <a class="btn btn-link ps-0" onclick="appendComment('reply-{{$comment->id}}')">Reply</a>
            <form method="post" action="{{ route('deletecomment') }}">
                @csrf
                @method('delete')
                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                <button class="btn btn-link ps-0" type="submit" onclick="return confirm('Are you sure?');">Delete</button>
            </form>
        </div>
        <div class="reply-{{$comment->id}} d-none">
            @include('helpers.form')
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