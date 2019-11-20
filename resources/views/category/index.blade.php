@extends('layouts.master')

@section('title','category edit')

@section('content')
<div class="container">
    @foreach($categories as $category)
        <div class="row mt-2">
            <div class="col-lg-9">
                <a href="{{route('category.show',$category->id)}} ">{{$category->name}}</a>
            </div>
            <div class="col-lg-3">
                <a href='{{route("category.show",$category->id)}}' class='btn btn-primary'>Харах</a>
                <a href='{{route("category.edit",$category->id)}}' class='text-white btn btn-success'>Засах</a>
            </div>
        </div>
    @endforeach
</div>
@endsection