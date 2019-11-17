<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\post;
use Session;

class postController extends Controller
{

    public function __construct(){

        $this->middleware('auth', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'body' => 'required',
            'slug' => 'required|alpha_dash|min:5|max:255'
        ));

        // insert into db
        $post = new post;

        $post->id = $request->id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $request->slug;

        $post->save();

        Session::flash('success','Амжилттай хадгалагдлаа');

        return redirect()->route('post.show',$request->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = DB::table('posts')->where('id',$id)->orWhere('slug',$id)->first();

        return view('posts.post',['post'=>$post]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit',['post'=>$post]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if($request->input('slug') == $post->slug){
            $this->validate($request, array(
                'title' => 'required|max:255',
                'body' => 'required'
              
            ));
        }
        else{
            $this->validate($request, array(
                'title' => 'required|max:255',
                'body' => 'required',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug'
            ));
    
        }
        
        // insert into db
       

        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $request->slug;

        $post->save();

        Session::flash('success','Амжилттай хадгалагдлаа');

        return redirect()->route('post.show',$request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
         
        return response()->json(['Url' => "/"]); 
    }
}
