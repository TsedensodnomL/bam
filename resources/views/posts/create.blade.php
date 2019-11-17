@extends('layouts.master')

@section('title','Admin | Create')

@section('content')
    

<form action="{{route('post.store')}}" class="p-5 bg-white" method='post'>
{{ csrf_field() }}
             
             <div class="row no-padding form-group">
               <div class="col-md-3 no-padding">
                 <label class="text-black" for="id">id</label>
                 <input type="text" id="id" name='id' class="form-control">
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
                 <input type="text" id="title" name='title' class="form-control">
               </div>
             </div>
             <div class="row form-group">
               <div class="col-md-12">
                 <label class="text-black" for="slug">slug</label>
                 <input type="text" id="slug" name='slug' class="form-control">
               </div>
             </div>
            
             <div class="row form-group">
               <div class="col-md-12">
                 <label class="text-black" for="body">body</label> 
                 <textarea name="body" id="body" cols="30" rows="20" class="form-control" placeholder="Write your notes or questions here..."></textarea>
               </div>
             </div>

             <div class="row form-group">
               <div class="col-lg-12">
                 <input  type="submit" value="Нийтлэх" class="btn btn-primary text-white">
               </div>
             </div>

 
           </form>
@endsection