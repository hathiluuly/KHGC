@extends('trangchu')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh sách bài viết của bạn</h3>
        </div>
    
        <div class="card-body">
          


          <div class="d-flex">
            <a href="{{ route('post.create') }}" class="btn btn-primary  me-2">Thêm mới</a>

            <form action="{{ route('post.deleteAll', ['id' => Auth::id()]) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger me-2" data-bs-target="#confirmDeleteAllModalLabel">Xóa tất cả</button>
            </form> 

           
          </div>
        </div>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Thumbnail</th>
              <th>Title</th>
              <th>Description</th>
              <th>Pushlish_date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
            <tr>
              <td>{{ $post -> thumbnail }}</td>
              <td>{{ $post -> title }}</td>
              <td>{{ $post -> description }}</td>
              <td>{{ $post -> created_at }}</td>
              <td>{{ $post -> status }}</td>
              <td>
                <div class="d-flex">
                  <button type="button"  class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" >
                    <i class="fa-solid fa-trash" ></i>
                </button>
                

                @include('post.popup')
                    <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="btn btn-warning  me-2"><i class="fa-solid fa-pen"></i></a>
                    <a href="{{ route('post.show', ['post' => $post->id]) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                </div>
               
            </td>
            </tr>
            @endforeach
           
            </tbody>
          </table>

        
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
@endsection