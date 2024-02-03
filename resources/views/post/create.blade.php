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
                        <label for="thumbnail" class="form-label">Ảnh đại diện</label>
                        <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="created_at" class="form-label">Ngày tạo</label>
                        <input type="date" class="form-control" id="created_at" name="created_at">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái</label>
                        <select class="form-select" id="status" name="status">
                            <option value="published">Xuất bản</option>
                            <option value="draft">Nháp</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Lưu bài viết</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
