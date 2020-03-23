<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Comment;
use App\Models\Reply;
use App\Repositories\VideosRepository;
use App\Http\Requests\VideoUploadRequest;
use Alert;
use App\Models\Blog;
use App\Traits\UserTrait;
use App\Models\Category;
use App\Models\Video;
use DOMDocument;
use Image;
use Youtube;

class HomeController extends Controller
{
    use UserTrait;
    //
    protected $video;

    private $BLOG_PATH = 'uploads/blog/';
    /**
     * Undocumented function
     *
     * @param VideosRepository $video
     */
    public function __construct(VideosRepository $video)
    {
        $this->video = $video;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        return redirect()->route('user.posts');
    }

    public function profile()
    {
        $user = User::where('id', '=', auth()->user()->id)->first();
        $countries = \App\Models\Country::all();
        $states = \App\Models\State::where('country_id', '=', $user->country_id)->get();
        $cities = \App\Models\City::where('state_id', '=', $user->state_id)->get();
        return view('users.profile', compact('user', 'countries', 'states', 'cities'));
    }
    /**
     * Undocumented function
     *
     * @param [type] $id
     * @param Request $request
     * @return void
     */
    public function profileUpdate($id, Request $request)
    {
        $user = User::find($id);
        $user->dob = date('Y:m:d', strtotime($request->dob));
        $user->address = $request->address;
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->country_id = 1; //$request->country_id;
        $user->state_id = 1; //$request->state_id;
        $user->city_id = 1; //$request->city_id;
        $user->name = $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name;

        if ($user->update()) {
            return redirect()->back()->with('message', 'Profile update successful');
        }
        return redirect()->back()->with('error', 'Profile update failed');
    }
    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function updateProfilePicture(Request $request, $id)
    {
        $user = User::find($id);
        $oldImage = $user->image;
        $path = "uploads/users/";
        if ($request->has('image')) {
            $file = $request->image;
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $image = auth()->user()->id . '.' . $extension;
            $file->move($path, $image);
            $user->image = $image;
            if ($user->save()) {
                return redirect()->back()->with('message', 'Profile image updated');
            }
            return redirect()->back()->with('error', 'Profile image update failed');
        }
    }

    /****************************************
     * VIDEOS METHODS
     **************************************/

    public function videos()
    {
        $videos = Video::where('user_type', 'user')->where('user_id', auth()->user()->id)->paginate(15);
        return view('users.videos.index', compact('videos'));
    }

    public function showVideoForm()
    {
        $categories = [
            ['id' => 10, 'name' => 'Music'],
            ['id' => 17, 'name' => 'Sports'],
            ['id' => 28, 'name' => 'Science & Technology'],
        ];

        return view('users.videos.create', compact('categories'));
    }

    /**
     * Undocumented function
     *
     * @param \App\Http\Requests\VideoUploadRequest $request
     * @return Illuminate\Http\Response
     */
    public function uploadVideo(VideoUploadRequest $request)
    {

        if ($this->video->uploadVideo($request->except('_token'))) {
            Alert::success('was Uploaded Successfully', 'Your Video');
            return \redirect()->route('user.videos');
        } else {

            Alert::error('Error uploading Video', 'Oops');
            return \redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function deleteVideo($id)
    {
        $video = Video::findOrFail($id);

        if ($video->user_type != 'user' && $video->user_id != auth()->user()->id) {
            return redirect()->back()->with('error', 'You can not delete this video');
        }
        if ($video->delete())
            return redirect()->back()->with('message', 'Video deleted');
        else
            return redirect()->back()->with('error', 'Failed deleting video');
    }
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function storeComment(Request $request)
    {

        $comment = new Comment();
        $comment->comment =  $request->comment;
        $comment->commentable_type =  $request->commentable_type;
        $comment->commentable_id =  $request->commentable_id;
        $comment->user_id =  $request->user_id;
        if ($comment->save()) {
            return redirect()->back();
        }
    }
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function storeReply(Request $request)
    {
        $reply = new Reply();
        $reply->reply = $request->reply;
        $reply->comment_id = $request->comment_id;
        $reply->repliable_type = $request->repliable_type;
        $reply->repliable_id = $request->repliable_id;
        if ($reply->save()) {
            return redirect()->back();
        }
    }

    /**********************************
     *BLOG POST METHODS
     **********************************/

    public function post(Request $request)
    {
        $blogs = Blog::where('blogable_type', User::class)->where('blogable_id', auth()->user()->id)->paginate(15);
        return view('users.blog.index', compact('blogs'));
    }
    public function showNewPostForm()
    {
        $categories = Category::all();
        return view('users.blog.create', compact('categories'));
    }

    public function storePost(Request $request)
    {
        $data = $request->all();
        $data['summary'] = '';
        $blog = new Blog($data);
        $message = $data['content'];
        $dom = new DOMDocument();

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
        $blog->blogable_id = auth()->user()->id;
        $blog->blogable_type = User::class;
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
            return redirect()->route('user.posts');
        } else {
            return redirect()->back()->with('error', 'Post creation Failed');
        }
    }

    public function editPost($id)
    {
        $blog = Blog::findOrFail($id);

        return view('users.blog.edit', compact('blog'));
    }




    public function deletePost($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->blogable_type != User::class && $blog->blogable_id != auth()->user()->id) {
            return redirect()->back()->with('error', 'You can not delete this post');
        }

        if ($blog->delete()) {
            unlink(public_path($this->BLOG_PATH . $blog->image));
            $images = json_decode($blog->content_images);
            unlink(public_path($this->BLOG_PATH . $blog->image));

            $this->deleteOldImages($images);
            return redirect()->route('user.posts')->with('message', 'Post deleted');
        }
        return redirect()->back()->with('error', 'Post creation Failed');
    }

    public function updatePost(Request $request, $id)
    {
        $data = $request->all();
        $blog = Blog::findOrFail($id);
        $blog->title = $data['title'];
        $blog->tags = $data['tags'];
        $message = $data['content'];
        $dom = new DomDocument();
        $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        $oldContentImages = $blog->content_images;
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
        $blog->content_images = json_encode($content_images);

        if ($blog->update()) {
            $this->deleteOldImages($oldContentImages);
            return redirect()->route('user.posts')->with('message', 'Post Updated');
        }
    }

    public function deleteOldImages($images)
    {
        if (!$images == []) {
            return;
        }
        dd($images);
        foreach ($images as $image) {
            unlink(public_path($image));
        }
        return true;
    }
}
