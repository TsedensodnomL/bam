@extends('layouts.master')

@section('title','tag create')

@section('content')
<div class="container" style="margin-top:3rem, margin-bottom:3rem;">
    <form action='{{route("tag.store")}}' method='post'>
        @csrf()
        <div class="row form-group">
            <div class="col-lg-6">
                <label for='tag'>Таг</label>
                <input id='tag' class='form-control' name='name'>
            </div>
            <div class='col-md-6 mt-2'>
                <button class='btn btn-success text-white'>Хадгалах</button>
                <button href='route("tag")' class='btn btn-danger'>Буцах</button>
            </div>
        </div>
    </form>
</div>
@endsection