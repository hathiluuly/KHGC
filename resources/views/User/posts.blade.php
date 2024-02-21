@extends('trangchu')

@section('content')


<div class="card-body">
          


    <table id="example2" class="table table-bordered table-hover">
      <thead>
      <tr>
       
        
        <th></th>
      
      </tr>
      </thead>
      <tbody>
        
          @foreach ($posts as $post)
      <tr>
     
       
        <td> 
            <a href="{{ route('show.post',['slug' => $post->slug])}}">
                <div class="card" style="width:60%">
                    <div class="row">
                        <div class="col-md-4">
                            @if ($post->hasMedia())
                            <img class="img-fluid" src="{{ $post->getFirstMediaUrl('thumbnails') }}" alt="">
                            @else
                            <img class="img-fluid" src="/storage/defaut_img/not found.png" alt="">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                               <h3 class="card-title"> <strong>{{ $post->title }}</strong></h3>
                           
                                <p class="card-text">{{ $post->description }}</p>
                                <p>  <small>{{ $post->publish_date }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
          </td>
 
      </tr>
      
      @endforeach
     
      </tbody>
    </table>
   
  
</div>



    @endsection