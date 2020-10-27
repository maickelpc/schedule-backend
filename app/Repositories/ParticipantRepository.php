<?php

namespace App\Repositories;

use Carbon\Carbon;

class ParticipantRepository extends EloquentRepository
{

  public function __construct(){
    $this->modelClass = 'App\Models\Participant';
  }

}
