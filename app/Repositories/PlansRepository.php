<?php
namespace App\Repositories;

use App\Models\Plan;

class PlansRepository 
{
    protected $plan;

    public function __construct(Plan $plan)
    {
        $this->plan = $plan;
    }

    public function getAll()
    {
        return $this->plan->all();
    }

    public function getPlanById($id)
    {
        return $this->plan->findOrFail($id);
    }

    public function create($params)
    {
        
        $plan = new Plan($params);

        $plan->save();

        return $plan;
    }

    public function update($params, $id)
    {
        $plan =  $this->plan->findOrFail($id);
        $plan->update($params);

        return $plan;
    }
    
    public function delete($id)
    {
        return $this->plan->destroy($id);
    }


}