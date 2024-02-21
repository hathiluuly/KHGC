<!-- resources/views/post/create.blade.php -->

@extends('trangchu')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tạo mới bài viết</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Thumbnail</label>
                        <input type="file" class="form-control" id="thumbnail" name="thumbnail">

                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('content') is-invalid @enderror" value="{{ old('title') }}" id="title" name="title">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" value="{{ old('description') }}" id="description" name="description" rows="4"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="content">Content</label>
                        <textarea name="content" class="summernote @error('content') is-invalid @enderror" ></textarea> 
                        @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="publish_date">Publish Date</label>
                        <input type="datetime-local" name="publish_date" class="form-control" value="{{ old('publish_date') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
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
@endsection
