<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Repositories\Events;
use App\Models\Category;
use Alert;


class EventsController extends Controller
{
    protected $repo;
    public function __construct(Events $events){
        $this->repo = $events;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = $this->repo->getInstance()->all();
        return view('admin.events.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $states = State::where('country_id','=',160)->get(); //select  states for Nigeria as default
        $countries = Country::all();
        return view('admin.events.create',compact('countries','states','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($this->repo->createEvent($request->all())){
            Alert::success('created successfully','Event');
            return \redirect()->route('events.create');
        }else{
            Alert::error('failed creating event','Oops');
            return \redirect()->route('events.create');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = $this->repo->getEventById($id);
        $categories = Category::all();
        $states = State::where('country_id','=',$event->country_id)->get(); //select  states for Nigeria as default
        $cities = City::where('state_id','=',$event->state_id)->get(); //select  states for Nigeria as default
        $countries = Country::all();
        return view('admin.events.edit',compact('event','categories','countries','states','cities'));
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
        if($this->repo->updateEvent($id,$request->all())){

            Alert::success('Updated successfully','Event');
            return redirect()->back();
        }else{
            Alert::error('failed updating event','Oops');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if($this->repo->deleteEvent($id)){
            return redirect()->route('events.index');
        }

    }

    public function attendees(Request $request,$id){
        $event = $this->repo->getEventById($id);
        return view('admin.events.attendees',compact('event'));
    }

    public function participants(Request $request,$id){
        $event = $this->repo->getEventById($id);
        return view('admin.events.participants',compact('event'));
    }
}
