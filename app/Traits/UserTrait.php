<?php
namespace App\Traits;

use App\User;
use App\Models\Subscription;
use Carbon\Carbon;

trait UserTrait 
{
    public function isSubscribed()
    {
        $this->validateSubscription();
    
        $subscription = Subscription::where([
            ['user_id',auth()->id()],
            ['status','active']
        ])->get();
        return $subscription->count();
    
    }

    /**
     * validate and set al
     */
    public function validateSubscription(){
        $user = User::find(auth()->id());
        $now = Carbon::now();
        foreach($user->subscriptions as $subscription)
        {
                
                if(!($subscription->expired_at > $now) && $subscription->status != 'expired'){
                    $subscription->status = 'expired';
                    $subscription->save();
                } 
            
            
        }
    }
}