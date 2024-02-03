@extends('trangchu')

@section('content')
<div class="show-post">

<h2>Chi tiết bài viết</h2>

<h1>{{ $post->title }}</h1>
<span>{{ $post->description }}</span>

 <p>{!! htmlspecialchars_decode($post->content) !!}</p>
</div>

\
 @endsection