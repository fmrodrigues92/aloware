<form action="{{ route('comment', ['slug' => $post->slug]) }}" method="POST">
    @csrf
    @if(isset($comment))
        <input type="hidden" name="parent_id" value="{{$comment->id}}">
    @endif
    <div class="mb-3">
          <label for="name-field" class="form-label">Name</label>
          <input type="text" class="form-control" id="name-field" name="name" required>
    </div>
    <div class="mb-3">
          <label for="comment" class="form-label">Comment</label>
          <textarea class="form-control" name="comment" id="comment" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
