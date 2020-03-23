<?php
namespace App\Repositories;

use App\Models\Subscription;
use Carbon\Carbon;
use App\Models\Plan;
use App\Models\Transaction;

class SubscriptionRespository
{
    protected $subscription;

    public function __construct(Subscription $subscription)
    {
        $this->subscription = $subscription;
    }

    public function getAll()
    {
        return $this->subscription->all();
    }

    public function getSubscriptionById($id)
    {
        return $this->findOrFail($id);
    }

    public function getSubscriptionsByUser($user_id)
    {
        return $this->subscription->where('user_id',$user_id)->get();
    }

    public function subscribeUser($params)
    {
        if(isset($params['status'])){
            
            if($params['status'] != 'paid'){

                $req = Request::create('/verifypayment/hts57s7s', 'GET');
                $res = app()->handle($req);
                if($request != 'success'){

                    return null;
                }else {
                    $params['status'] = 'paid';
                }
            }
            
             $sub = new Subscription($params);
            $sub->expired_at = Carbon::now()->addMonths(Plan::find($params['plan_id'])->duration);
            $transaction = new Transaction($params);
            
            if($sub->save()){
                $sub->transactions()->save($transaction);
                return $sub;
            }
        }
       

        return null;
    }

    public function cancel($sub_id)
    {
        return $this->subscription->findOrFail($sub_id)->update(['status'=>'canceled']);
    }
}