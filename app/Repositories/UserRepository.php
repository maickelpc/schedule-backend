<?php

namespace App\Repositories;


use App\Models\User;

class UserRepository extends EloquentRepository
{

  public function __construct(){
    $this->modelClass = 'App\Models\User';
  }
  

}
