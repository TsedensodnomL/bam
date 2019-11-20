@extends('layouts.master')

@section('title','category edit')

@section('content')
<div class="container" style="margin-top:3rem, margin-bottom:3rem;">
    <form action='{{route("category.update", $category->id)}}' method='post'>
        @csrf()
        @method('put')
        <div class="row form-group">
            <div class="col-lg-6">
                <label for='category'>Категори</label>
                <input id='category' class='form-control' name='name' value="{{$category->name}}">
            </div>
            <div class="col-md-12">
                <label for='description'>Тайлбар</label>
                <input id='description' class='form-control' name='description' value="{{$category->description}}">
            </div>
            <div class='col-md-6 mt-2'>
                <button class='btn btn-success text-white'>Хадгалах</button>
                <button href='route("category")' class='btn btn-danger'>Буцах</button>
            </div>
        </div>
    </form>
</div>
@endsection