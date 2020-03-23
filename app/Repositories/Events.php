<?php

namespace App\Repositories;
use App\Models\Event;
use Carbon\Carbon;

class Events {

    private $event;

    public function __construct(Event $event){
        $this->event = $event;
    }

    public function getInstance(){
        return $this->event;
    }

    public function getEventById($id){
        return $this->event->find($id);
    }

    public function getEventsByAdmin($id){
        return $this->event->where('admin_id','=',$id)->get();
    }

    public function createEvent($data){
        $event  = new $this->event;
        $event->name = $data['name'];
        $event->slug =\str_slug($data['name']) ;
        $event->description = $data['description'];
        $date = explode(' - ',$data['date']);
        // dd($date);
        $event->start_date = date(strtotime(\trim($date[0]) ));
        $event->end_date = date(strtotime(trim($date[1]) ));
        $event->category_id =$data['category_id'];
        $event->admin_id = $data['admin_id'];
        $event->country_id = $data['country'];
        $event->state_id = $data['state'];
        $event->city_id = $data['city'];
        $event->venue = $data['venue'];
        $event->details = $data['details'];
        $event->status = $data['status'];
        $event->participant_price = $data['participant_price'];
        $event->attendee_price = $data['attendee_price'];
        $event->reg_type = $data['reg_type'];
        $image = "";
        $banner = "";
        if(isset($data['image'])){
            $file = $data['image'];
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension()?: 'png';
            $imageFolderName      = '/uploads/events/images/';
            $image = str_random(10).'.'.$extension;
        }
        if(isset($data['image'])){
            $file = $data['banner'];
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension()?: 'png';
            $bannerFolderName      = '/uploads/events/banners/';
            $banner = str_random(10).'.'.$extension;
        }
        $event->image = $image;
        $event->banner = $banner;

        if($event->save()){
            $destinationPath1 = public_path() . $imageFolderName;
            $data['image']->move($destinationPath1, $image);
            $destinationPath2 = public_path() . $bannerFolderName;
            $data['banner']->move($destinationPath2, $banner);
        }
        return true;

    }


    public function updateEvent($id,$data){
        $event  =  $this->getEventById($id);
        $event->name = $data['name'];
        $event->description = $data['description'];
        $date = explode('-',$data['date']);
        $event->start_date = date('Y:m:d',strtotime($date[0]));
        $event->end_date =  date('Y:m:d',strtotime($date[1]));
        $event->category_id =$data['category_id'];
        $event->admin_id = $data['admin_id'];
        $event->country_id = $data['country'];
        $event->state_id = $data['state'];
        $event->city_id = $data['city'];
        $event->venue = $data['venue'];
        $event->details = $data['details'];
        $event->participant_price = $data['participant_price'];
        $event->attendee_price = $data['attendee_price'];
        $event->reg_type = $data['reg_type'];
        $event->status = $data['status'];
        $image = "";
        $banner = "";
        if(isset($data['image'])){
            $file = $data['image'];
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension()?: 'png';
            $imageFolderName      = '/uploads/events/images/';
            $image = str_random(10).'.'.$extension;
            $event->image = $image;
        }
        if(isset($data['banner'])){
            $file = $data['banner'];
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension()?: 'png';
            $bannerFolderName      = '/uploads/events/banners/';
            $banner = str_random(10).'.'.$extension;
            $event->banner = $banner;
        }

        if($event->update()){
            if(isset($data['image'])){
                $destinationPath1 = public_path() . $imageFolderName;
                $data['image']->move($destinationPath1, $image);
            }
            if(isset($data['banner'])){
                $destinationPath2 = public_path() . $bannerFolderName;
                $data['banner']->move($destinationPath2, $banner);
            }
        }
        return true;
    }

    public function deleteEvent($id){
        $event = $this->event->find($id);
         if($event->delete()){
             unlink('uploads/events/images/'.$event->image);
             unlink('uploads/events/banners/'.$event->banner);
             return true;
         }else{
             return false;
         }
    }

}
