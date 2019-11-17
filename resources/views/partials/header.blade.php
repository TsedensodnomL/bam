<div class='mt-3 container d-flex justify-content-between'>

    <a href='{{route("category.index")}}'>Category </a> 
    <a href='#'>Tags </a> 
    <a href='{{route("post.index")}}'>Posts </a> 
    
    <form action="{{ route('logout') }}" method="POST" >
        {{ csrf_field() }}
        <button class="btn btn-success text-white">Logout</button>
    </form>
</div>