<?php
namespace App\Repositories;

use App\Models\Video;
use Youtube;
use App\Services\FileUploadService;

class VideosRepository {
    protected $fileUploader;
    protected $video;

    public function __construct(Video $video, FileUploadService $fileUploadService){
        $this->video = $video;
        $this->fileUploader = $fileUploadService;
    }

    public function getInstance(){
        return $this->video;
    }
    public function getVideoById($id){
        return  $this->video->find($id);  
    }

    public function uploadVideo($params){
        
        $categories = [
            ['id'=>10,'name'=>'Music'],
            ['id'=>17,'name'=>'Sports'],
            ['id'=>28,'name'=>'Science & Technology'],
        ];
        $category = "";
            foreach($categories as $cat){
                if ($cat['id'] == $params['category_id']){
                    $category = $cat['name'];
                }
            }
            
        $fullPathToVideo = $params['video'];
        // dd($fullPathToVideo->getRealPath());

        $data = [
            'title'       => $params['title'],
            'description' => $params['description'],
            'tags'	      =>    explode(',',$params['tags']),
            'category_id' => $params['category_id']
        ];
        $y_video = Youtube::upload($fullPathToVideo, $data, 'public');
        
        // $video_response = $this->fileUploader->uploadVideo($fullPathToVideo);
        //add details to database too
        unset($params['video']);
        $params['slug'] = str_slug ($params['title']);
    
        $cat_id=0;
        foreach(\App\Models\Category::all() as $cat){
            if(preg_match('/'.$cat->name.'/',strtolower($category), $match)){
                $cat_id = $cat->id;
            }
        }
        $params['category_id'] = $cat_id;
        $video = new Video($params);
        // $video->key= $video_response['public_id'];
        $video->key= $y_video->getVideoId();
        return $video->save();
    }

    public function deleteVideo($id){
        $video = $this->getVideoById($id);
        // $this->fileUploader->deleteFile($video->key);
        $delete = Youtube::delete($video->key);
        return $video->delete();
    }

    public function updateVideo($id,$params){
        $vd = $this->getVideoById($id);
        $params['slug'] = str_slug($params['title']) ;
        $video = Youtube::update($id, [
            'title'       => $params['title'],
            'description' => $params['description'],
            'tags'	      => explode($params['tags']),
            'category_id' => $params['category_id']
        ], 'public');
        return $vd->update($params);
    }

}