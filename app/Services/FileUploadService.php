<?php
namespace App\Services;

use JD\Cloudder\Facades\Cloudder; 
class FileUploadService 
{

    protected $videosFolder;
    protected $imagesFolder;

    public function uploadVideo($file)
    {
        // Form new file name
        $publicId  = $this->getUniqueId();
        // Get temp path
        $photo = $file->getRealPath();
        // Upload image to Cloudinary
       	Cloudder::uploadVideo($photo, $publicId);
        return Cloudder::getResult();
    }

    public function deleteFile($fileName)
    {
        Cloudder::destroyImage($fileName);
        return Cloudder::delete($fileName);
    }
    
    public function getUniqueId()
    {
        return  uniqid(true) . '_' . time() ;
    }
}