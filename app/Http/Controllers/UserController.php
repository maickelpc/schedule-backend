<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    private $repository;
    
    public function __construct(UserRepository $repository){
        $this->repository = $repository;
    }

    public function index(){
        $data = $this->repository->getAll();
        return response()->json($data);
    }

    public function show($id){
        $data = $this->repository->find($id);
        return response()->json($data);
    }


}
