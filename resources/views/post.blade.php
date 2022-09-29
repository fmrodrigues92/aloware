@extends('layout.app')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-10">

            <h1>{{ $post->title }}</h1>
            <h3>{{ $post->subtitle }}</h3>
            
            <div class="row mt-5 d-flex justify-content-center">
                <div class="col-12 col-md-10">
                    {!! $post->content !!}
                    
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <hr>
                </div>
            </div>
        
            <div class="row">
                <div class="col-12">
                    <h2>Comments</h2>

                    <form action="" method="POST">
                        <div class="mb-3">
                              <label for="name-field" class="form-label">Name</label>
                              <input type="email" class="form-control" id="name-field" name="name">
                        </div>
                        <div class="mb-3">
                              <label for="comment" class="form-label">Comment</label>
                              <textarea class="form-control" name="comment" id="comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    

@endsection