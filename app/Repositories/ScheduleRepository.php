<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\User;

class ScheduleRepository extends EloquentRepository
{

  public function __construct(){
    $this->modelClass = 'App\Models\Schedule';
  }

  public function scheduleByUser($user_id, $filters) {
    $query = $this->newQuery();
    $query->whereHas('participants', function($q) use($user_id){
        return $q->where('user_id', $user_id);
    });

    if( isset($filters['initial_date']) ){
      $date = Carbon::create($filters['initial_date']);
      $query = $query->where('start_date', '>=', $date);

    }

    if( isset($filters['final_date']) ){
      $date = Carbon::create($filters['final_date'])->setTime(23,59,59);
      $query = $query->where('start_date', '<=', $date);
    }

    if( isset($filters['status']) ){
      $query = $query->where('status', $filters['status']);
    }
    
    return $query->get();
  }

}
