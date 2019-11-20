@extends('layouts.master')

@section('title','tags')

@section('content')
<div class="container">
    @foreach($tags as $tag)
        <div class="row mt-2">
            <div class="col-lg-9">
                <a href="{{route('tag.show',$tag->id)}} ">{{$tag->name}}</a>
            </div>
            <div class="col-lg-3">
                
                <a href='{{route("tag.edit",$tag->id)}}' class='text-white btn btn-success'>Засах</a>
            </div>
        </div>
    @endforeach
</div>
@endsection