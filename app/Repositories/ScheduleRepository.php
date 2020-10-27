<?php

namespace App\Repositories;

use Carbon\Carbon;
use Auth;
use App\Repositories\ParticipantRepository;

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


  public function createSchedule($user_id, $data){

    if(!isset($data['end_date'])){
      $data['end_date'] = Carbon::create($data['start_date'])->add(1,'hours');
    }
    if(Auth::check()){
      $data['requester_id'] = Auth::user()->id;
    }
    $schedule = $this->create($data);

    $participantRepository = new ParticipantRepository();

    $participant = [
      'user_id' => $user_id,
      'schedule_id' => $schedule->id
    ];
    $participantRepository->create($participant);

    return $schedule;

  }

}
