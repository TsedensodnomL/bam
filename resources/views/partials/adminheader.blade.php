<div class='mt-3 container d-flex justify-content-between'>

    @if(Auth::check() && Auth::user()->role==1)
        <a href='{{route("category.index")}}'>Category </a> 
        <a href='{{route("tag.index")}}'>Tags </a> 
        <a href='{{route("post.index")}}'>Posts </a> 
    @endif
    <form action="{{ route('logout') }}" method="POST" >
        {{ csrf_field() }}
        <button class="btn btn-success text-white">Logout</button>
    </form>
</div>