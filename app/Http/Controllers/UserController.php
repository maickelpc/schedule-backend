<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollectionResource;

class UserController extends Controller
{
    private $repository;
    
    public function __construct(UserRepository $repository){
        $this->repository = $repository;
    }

    public function index(){
        $data = $this->repository->getAll();
        return response()->json(new UserCollectionResource($data), 200);
    }

    public function show($id){
        $item = $this->repository->find($id);
        return response()->json(new UserResource($item), 200);
    }


}
