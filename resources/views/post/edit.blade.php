@extends('trangchu')

@section('content')

<h2>Chỉnh sửa bài viết</h2>

<div class="container">
    <form action="{{ route('post.update', ['post' => $post->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $post->title, old('title')}}"  id="exampleFormControlInput1" placeholder="Title">
            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
          </div>
         
        
          <div class="form-group">
            <label for="exampleFormControlSelect1">Description</label>
            <input type="text" name="description" class="form-control" id="exampleFormControlInput1" value="{{ $post->description,old('description') }}" placeholder="Description">
          </div>
         
        

        <div class="form-group" id="editor">
        <label for="exampleFormControlSelect1">Content</label>
               <textarea  class="summernote @error('content') is-invalid @enderror" name="content" rows="5" >{{ old('content') }}{{ $post->content }}</textarea>
               @error('content')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="form-group row">
            <div class="">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300, // Chiều cao của trình soạn thảo
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']]
                ]
            });
        });
    </script>
</div>
@endsection