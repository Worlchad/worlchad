<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendeesRequest;
use App\Http\Requests\ParticipantRequest;
use App\Http\Requests\SupporterRequest;
use App\Models\Attendee;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Event;
use App\Models\Participant;
use App\Models\Plan;
use App\Models\State;
use App\Models\Supporter;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index()
    {
        $events = Event::where('end_date', '>', Carbon::now())->simplePaginate(5);
        $videos = Video::orderBy('created_at', 'asc')->simplePaginate(20);
        $blogs = Blog::orderBy('created_at', 'asc')->simplePaginate(20);
        $older_post = Blog::orderBy('created_at', 'asc')->limit(20)->get();
        $data = new Collection();
        $data = $videos->concat($blogs)->sortByDesc('created_at');
        $data->links = $videos->links() != ""?$videos->links(): $blogs->links();
        return view('index', compact('data', 'videos', 'blogs', 'older_post'));
    }

    public function aboutUs()
    {
        return view('about');
    }

    public function event()
    {

        $events = Event::where('end_date', '>', Carbon::now())->get();
        return view('event', compact('events'));
    }
    public function singleEvent($id)
    {
        $event = Event::where('slug', '=', $id)->first();
        // dd($event);

        if ($event->category->id == Category::where('name', 'like', '%sport%')->first()->id) {
            return redirect()->route('events.sport', $event->id);
        }

        return view('single_event', compact('event'));
    }

    public function gallery()
    {
        return view('gallery');
    }
    public function blog()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(20);
        $categories = Category::all();

        return view('blog', compact('blogs', 'categories'));
    }
    public function blogPost($id)
    {
        $blog = Blog::where('slug', '=', $id)->with(['comments', 'comments.replies'])->first();
        if (!$blog) {
            abort(404);
        }
        $categories = Category::all();
        // $comments = Comment::where([
        //     ['comment_type','=','blog'],['type_id','=',$id]
        // ])->get();
        // dd($blog->blogComments);
        return view('single_blog', compact('blog', 'categories'));
    }
    public function advertise()
    {
        return view('advertise');
    }

    public function contact()
    {
        return view('contact');
    }

    public function registration()
    {
        return view('registration');
    }

    public function support()
    {
        return view('support');
    }

    public function processSupport(SupporterRequest $request)
    {
        $supporter = new Supporter($request->except('_token'));
        if ($supporter->save()) {
            $message = "Thank you " . $supporter->name . " for supporting us";
            $user = [
                'name' => $supporter->name,
                'email' => $supporter->email,
                'msg' => $message,
            ];
            \Mail::send('emails.support', ['user' => $user], function ($m) use ($user) {
                $m->from(env('MAIL_FROM'), env('MAIL_NAME'));

                $m->to($user['email'], $user['name'])->subject('Thank You!');
            });
        } else {
            return redirect()->back();
        }
    }

    public function showEventParticipationForm()
    {
        $events = Event::where([['status', '=', 'open'], ['end_date', '>', Carbon::now()]])->get();
        $user = null;
        if (auth()->user()) {
            $user = User::find(auth()->user()->id);
        }
        $countries = Country::all();
        $states = State::where('country_id', '=', 160)->get();
        return view('register_event_participant', compact('events', 'user', 'countries', 'states'));
    }

    public function storeEventParticipant(ParticipantRequest $request)
    {
        $participant = new Participant($request->except(['_token']));
        $event = Event::find($participant->event_id);
        $picture = "";
        if ($request->has('image')) {
            $file = $request->image;
            $extension = $file->extension() ?: 'png';
            $picture = str_random(10) . '.' . $extension;
            $destinationPath = public_path() . '/uploads/events/participants/';
            $file->move($destinationPath, $picture);
        }
        $participant->image = $picture;
        if ($participant->save()) {
            $message = "Thank you,  your registration to participate in " . $event->name . " event was successful.";

            \Mail::send('emails.registration_successful', ['participant' => $participant, 'message' => $message], function ($m) use ($participant) {
                $m->from(env('MAIL_FROM'), env('MAIL_NAME'));

                $m->to($participant->email, $participant->first_name . ' ' . $participant->last_name)->subject('Registration Successful!');
            });
            return view('thank', compact('message'));
        } else {
            return redirect()->back();
        }
    }
    public function registerForEvent($id)
    {
        $user = null;
        if (auth()->user()) {
            $user = User::find(auth()->user()->id);
        }

        $event = Event::where('slug', '=', $id)->first();
        if ($event->status == 'closed') {
            return redirect()->route('home');
        }
        if ($event->category->id == Category::where('name', 'like', '%sport%')->first()->id) {
            return redirect()->route('events.sport', $event->id);
        }

        $countries = Country::all();
        $states = State::where('country_id', '=', 160)->get();
        return view('register_event', compact('event', 'countries', 'user', 'states'));
    }
    public function storeEventRegistration(AttendeesRequest $request)
    {

        $attendee = new Attendee($request->except(['_token']));
        $event = Event::find($attendee->event_id);
        $picture = "";
        if ($request->has('image')) {
            $file = $request->image;
            $extension = $file->extension() ?: 'png';
            $picture = str_random(10) . '.' . $extension;
            $destinationPath = public_path() . '/uploads/events/attendees/';
            $file->move($destinationPath, $picture);
        }
        $attendee->image = $picture;
        if ($attendee->save()) {

            $attendee->image = $picture;
            $message = "Thank you, your registration for " . $event->name . " was successful.";
            \Mail::send('emails.registration_successful', ['attendee' => $attendee, 'message' => $message], function ($m) use ($attendee) {
                $m->from(env('MAIL_FROM'), env('MAIL_NAME'));

                $m->to($attendee->email, $attendee->first_name . ' ' . $attendee->last_name)->subject('Registration Successful!');
            });
            return view('thanks', compact('message'));
        } else {
            return redirect()->back();
        }
    }
    public function verifyPaystackPayment(Request $request, $ref)
    {
        $url = 'https://api.paystack.co/transaction/verify/' . $ref;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            [
                'Authorization: Bearer sk_live_e27305695173303e6dc529bef0d51fdd7a3ab75e'
            ]
        );
        //send request
        $request = curl_exec($ch);
        //close connection
        curl_close($ch);
        //declare an array that will contain the result
        $result = array();
        if ($request) {
            $result = json_decode($request, true);
        }
        if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
            return "success";
            //Perform necessary action
        } else {
            return "Transaction was unsuccessful";
        }
    }
    public function singleVideo($id)
    {
        $video = Video::where('id', '=', $id)->with(['comments', 'comments.replies'])->first();
        if (!$video)
            abort(404);

        return view('single_video', compact('video'));
    }

    public function sendContactMail(Request $request)
    {
        $contact = $request->except('_token');
        \Mail::send('emails.contact', ['contact' => $contact], function ($m) use ($contact) {
            $m->from($contact['email'], $contact['name']);

            $m->to(env('MAIL_TO'), env('MAIL_NAME'))->subject('Contact Mail from ' . $contact['name']);
        });
        return redirect()->back()->with('message', 'Your email has been sent successfully');
    }

    public function sportEvents($id)
    {
        $event = Event::findOrFail($id);
        $states = State::where('country_id', 160)->get();
        return view('sports', compact('event', 'states'));
    }
}
