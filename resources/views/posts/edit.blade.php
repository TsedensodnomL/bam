@extends('layouts.master')

@section('title','Admin | Edit')

@section('content')
    

<form action="{{route('post.update',['post'=>$post->id])}}" class="p-5 bg-white" method='post'>
{{ csrf_field() }}
{{ method_field('put')}}
             
             <div class="row no-padding form-group">
               <div class="col-md-3 no-padding">
                 <label class="text-black" for="id">id</label>
                 <input type="text" id="id" value='{{ $post->id}}' name='id' class="form-control">
               </div>
               <div class="col-md-3 no-padding">
                 <label class="text-black" for="category">category</label>
                 <select name='category' class="form-control">
                   <option>...</option>
                 </select>
               </div>
               <div class="col-md-3 no-padding">
                 <label class="text-black" for="tag">tag</label>
                 <select name='tag' class="form-control">
                   <option>...</option>
                 </select>
               </div>
              <div>
              <div class="row form-group">
               <div class="col-md-12">
                 <label class="text-black" for="title">title</label>
                 <input type="text" id="title" value='{{ $post->title}}' name='title' class="form-control">
               </div>
             </div>
             <div class="row form-group">
               <div class="col-md-12">
                 <label class="text-black" for="slug">slug</label>
                 <input type="text" id="slug" value='{{url($post->slug)}}' name='slug' class="form-control">
               </div>
             </div>
            
             <div class="row form-group">
               <div class="col-md-12">
                 <label class="text-black" for="body">body</label> 
                 <textarea name="body" id="body"cols="30" rows="20" class="form-control">{{$post->body}}</textarea>
               </div>
             </div>

             <div class="row form-group">
               <div class="col-lg-12">
                 <input  type="submit" value="Засах" class="btn btn-primary text-white">
                 <a href='{{route("post.show",["post"=>$post->id])}}' class="btn btn-success text-white">Болих</a>
               </div>
             </div>

 
           </form>
@endsection