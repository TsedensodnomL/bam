<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\Http\Middleware\admin;
use Session;

class categoriesController extends Controller
{
    public function __construct(){

        $this->middleware('admin', ['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoies = category::all();

        return view('category.index',['categories'=>$categoies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name'=>'required|max:255',
            'description'=>'required'
        ));

        $category = new category;

        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        Session::flash('success', 'Амжилттай хадгалагдлаа');

        return redirect()->route('category.show',$category->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = category::find($id);
        return view('category.category', ['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::find($id);

        return view('category.edit',['category'=>$category]);
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
        $this->validate($request, array(
            'name' =>'required|max:255',
            'description' => 'required'
        ));

        $category = category::find($id);

        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        Session::flash('success','Амжилттай хадгалагдлаа');

        return redirect()->route('category.show',$id);
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
         
        return response()->json(['Url' => "/category"]); 
    }
}
