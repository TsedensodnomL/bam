<!DOCTYPE html>
<html lang="en">
  <head>
  @include('partials.head')
  </head>
  
    @if (Session::has('success'))
      <div class='alert alert-success' role='alert'>{{Session::get('success')}}</div>
    @endif

    @if (count($errors)>0)
    <div class='alert alert-danger' role='alert'>
      <ul>
        @foreach($errors->all() as $er)
          <li>{{$er}}</li>
        @endforeach
      </ul>
    </div>
    @endif

  <body>
  @if(Auth::check())
    @include('partials.adminheader')
  @endif
  <div class="site-wrap">

    @include('partials.header')
     

    @yield('content')

    
   @include('partials.footer')
    
  </div>

  @include('partials.script')

 
  </body>
</html>

