@extends('layouts.master')

@section('title', '')

@section('content')

<div class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span>Категори</span>
            <h3>{{$category->name}}</h3>
            <p>{{$category->description}}</p>
          </div>
          @if(Auth::check() && Auth::user()->role==1)
          <div class="col-md-3 d-flex align-items-center">
            <a href='{{route("category.edit",$category->id)}}' class='btn btn-success text-white'>Засах</a>
          </div>
          @endif
        </div>
      </div>
    </div>
    
    <div class="site-section bg-white">
      <div class="container">
         @foreach($category->posts as $post)
        <div class="row">
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="{{route('post.show',$post->slug)}}"><img src="images/img_1.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-secondary mb-3">{{$category->name}}</span>

              <h2><a href="{{route('post.show',$post->slug)}}">{{$post->title}}</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; {{$post->created_at}}</span>
              </div>
              
                <p>{{substr($post->body, 0, 50)}}</p>
                <p><a href="{{route('post.show',$post->slug)}}">Read More</a></p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
@endsection