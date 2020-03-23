<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\BlogRepository;
use Alert;

class BlogsController extends Controller
{

    protected $blog;

    public function __construct(BlogRepository $repo){
        $this->blog = $repo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this->blog->getInstance()->all();
        return view('admin.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.blogs.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($this->blog->createBlog($request->except('_token'))){
            Alert::success('created successfully','Blog');
            return redirect()->route('blogs.index');
        }else{
            Alert::error('Failed Deleting blog','Oops');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blog = $this->blog->getBlogById($id);
        $categories = Category::all();
        return view('admin.blogs.edit', compact('blog','categories'));
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
        if($this->blog->updateBlog($id,$request->except('_token'))){
            Alert::success('Updated successfully','Blog');
            return redirect()->back()->with('message','Update Successful');
        }
        Alert::error('failed updating blog','oops');
        return redirect()->back()->with('message','Update Failed');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->blog->deleteBlog($id)){
            Alert::success('Deleted successfully','Blog');
            return \redirect()->back();
        }else{
            Alert::error('failed deleting blog','oops');
            return redirect()->back();
        }
    }
}
