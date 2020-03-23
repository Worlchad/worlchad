<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\VideosRepository;
use App\Http\Requests\VideoUploadRequest;
use Alert;

class VideosController extends Controller
{
    protected $video;
    public function __construct(VideosRepository $repo){
        $this->video = $repo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = $this->video->getInstance()->all();
        return view('admin.videos.index',compact('videos'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories = [
           ['id'=>10,'name'=>'Music'],
           ['id'=>17,'name'=>'Sports'],
           ['id'=>28,'name'=>'Science & Technology'],
       ];
       return view('admin.videos.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\VideoUploadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoUploadRequest $request)
    {
        if($this->video->uploadVideo($request->except('_token'))){
            Alert::success('Success','uploading video!');
            return redirect()->route('videos.index');
        }else{
            Alert::error('Error uploading video','Oops');
            return  redirect()->back();
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
        dd($id.' show');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = $this->video->getVideoById($id);
        return view('admin.videos.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\VideoUploadRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoUploadRequest $request, $id)
    {
        dd($id);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if( $this->video->deleteVideo($id)){
            Alert::success('Deleted Successfully','Video');
            return  redirect()->back();
        }else{
            Alert::error('Deletion failed','Video');
            return  redirect()->back(); 
        }
    }
}
