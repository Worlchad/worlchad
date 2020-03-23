<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Repositories\SubscriptionRespository;

class SubscriptionController extends Controller
{
    protected $repository;

    public function __construct(SubscriptionRespository $subscriptionRespository)
    {
        $this->middleware("auth");
        $this->repository = $subscriptionRespository;
    }

    public function index(){
        $plans = Plan::all();
        return view('users.plans',compact('plans'));
    }
/**
 * @param Request
 * @method Post
 */
    public function subscribe(Request $request)
    {
       if($this->repository->subscribeUser($request->except(['_token']))){
           return redirect()->route('video.upload.form');
       };
    }

    public function cancel($id)
    {
        $this->repository->cancel($id);
    }

    public function upgrade(Request $request)
    {

    }
}
