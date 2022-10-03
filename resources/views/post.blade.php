@extends('layout.app')

@section('content')

    <div class="row d-flex justify-content-center pb-5 mb-5 ">
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

                    @include('helpers.form')

                </div>
            </div>

            {{-- <div class="row mt-4">
                <div class="col-12">
                    <hr>
                </div>
            </div> --}}

            <div class="row mt-4">
                    
                @include('helpers.comments', ['comments' => $comments])
                    
            </div>

        </div>
    </div>

    <script>
        function appendComment(className){
            let el = document.getElementsByClassName(className);
            el[0].classList.remove('d-none')
        }
        
    </script>
    

@endsection