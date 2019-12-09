<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\post;
use App\tag;
use App\category;
use Session;

class postController extends Controller
{

    public function __construct(){

        $this->middleware('admin', ['except' => ['index','show']]);
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
        $category = category::all();
        $tag = tag::all();
        return view('posts.create', ['category'=>$category, 'tag'=>$tag]);
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
            'slug' => 'required|alpha_dash|min:5|max:255',
            'category' => 'required',
        ));

        // insert into db
        $post = new post;

        $post->id = $request->id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $request->slug;
        $post->category_id = $request->category;
        
        $post->tags()->sync($request->tags, false);

        $post->save();

        Session::flash('success','Амжилттай хадгалагдлаа');

        return redirect()->route('post.show',$request->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $post = DB::table('posts')->where('id',$id)->orWhere('slug',$id)->first();
          
        $post = post::where('slug',$id)->first();
        // echo $post;
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
        $category = category::all();
        $tag = tag::all();
        return view('posts.edit',['post'=>$post,'category'=>$category, 'tag'=>$tag]); 
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
                'body' => 'required',
                'category' => 'required'
            ));
        }
        else{
            $this->validate($request, array(
                'title' => 'required|max:255',
                'body' => 'required',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category' => 'required'
            ));
    
        }
        
        // insert into db
       

        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $request->slug;
        $post->category_id = $request->category;

        $post->save();

        Session::flash('success','Амжилттай хадгалагдлаа');

        return redirect()->route('post.show',$request->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::find($id);
        $post->tags()->detach();

        Post::destroy($id);
        Session::flash('success','Амжилттай устлаа');
        return response()->json(['Url' => "/"]); 
    }
}
