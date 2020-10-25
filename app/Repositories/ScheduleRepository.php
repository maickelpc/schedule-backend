<?php

namespace App\Repositories;


use App\Models\User;

class ScheduleRepository extends EloquentRepository
{

  public function __construct(){
    $this->modelClass = 'App\Models\Schedule';
  }
  
  

}
