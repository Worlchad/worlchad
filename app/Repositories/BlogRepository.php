<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Models\Blog;
use Image;
use DomDocument;

class BlogRepository
{

    protected $blog;
    private $BLOG_PATH = 'uploads/blog/';

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function getInstance()
    {
        return $this->blog;
    }

    public function getBlogById($id)
    {
        return $this->blog->find($id);
    }

    public function createBlog($data)
    {
        unset($data['admin_id']);
        $data['summary'] = '';
        $blog = new $this->blog($data);
        $message = $data['content'];
        $dom = new DomDocument();

        libxml_use_internal_errors(true);
        $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        $content_images = [];
        // foreach <img> in the submited message
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            // if the img source is 'data-url'
            if (preg_match('/data:image/', $src)) {
                // get the mimetype
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                // Generating a random filename
                $filename = uniqid();
                $filepath = "uploads/blog/$filename.$mimetype";
                // @see http://image.intervention.io/api/
                $image = Image::make($src)
                    // resize if required
                    /* ->resize(300, 200) */
                    ->encode($mimetype, 100)  // encode file to the specified mimetype
                    ->save(public_path($filepath));
                array_push($content_images, $filepath);
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            } // <!--endif
        } // <!-
        $blog->content = $dom->saveHTML();
        $blog->slug = \str_slug($data['title']);
        $blog->tags = $data['tags'];
        $blog->blogable_id = auth()->guard('admin')->user()->id;
        $blog->blogable_type = Admin::class;
        $blog->content_images = json_encode($content_images);

        $picture = "";

        if (array_key_exists('image', $data)) {
            $file = $data['image'];
            $extension = $file->extension() ?: 'png';
            $picture = str_random(10) . '.' . $extension;
            $destinationPath = public_path() . '/uploads/blog/';
            $file->move($destinationPath, $picture);
        }
        $blog->image = $picture;
        if ($blog->save()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteBlog($id)
    {
        $blog = $this->getBlogById($id);
        if ($blog->delete()) {
            $images = json_decode($blog->content_images);
            unlink(public_path($this->BLOG_PATH . $blog->image));
            foreach ($images as $image) {
                unlink(public_path($image));
            }
            return true;
        }
        return false;
    }

    public function updateBlog($id, $data)
    {
        $blog = $this->getBlogById($id);
        $blog->title = $data['title'];
        $blog->tags = $data['tags'];
        $message = $data['content'];
        $dom = new DomDocument();
        $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        // foreach <img> in the submited message
        foreach ($images as $img) {

            $src = $img->getAttribute('src');
            // if the img source is 'data-url'
            if (preg_match('/data:image/', $src)) {
                // get the mimetype
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                // Generating a random filename
                $filename = uniqid();
                $filepath = "uploads/blog/$filename.$mimetype";
                // @see http://image.intervention.io/api/
                $image = Image::make($src)
                    // resize if required
                    /* ->resize(300, 200) */
                    ->encode($mimetype, 100)  // encode file to the specified mimetype
                    ->save(public_path($filepath));
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            } // <!--endif
        } // <!-
        $blog->content = $dom->saveHTML();

        if (array_key_exists('image', $data)) {
            $file = $data['image'];
            $extension = $file->extension() ?: 'png';
            $picture = str_random(10) . '.' . $extension;
            $destinationPath = public_path() . '/uploads/blog/';
            $file->move($destinationPath, $picture);
            if (file_exists($destinationPath . $blog->image)) {

                unlink($destinationPath . $blog->image);
            }
            $blog->image = $picture;
        }
        return $blog->update();
    }
}
