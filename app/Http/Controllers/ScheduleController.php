<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Repositories\ScheduleRepository;
use App\Http\Resources\ScheduleResource;
use App\Http\Resources\ScheduleSimpleResource;
use App\Http\Resources\ScheduleCollectionResource;
use App\Http\Resources\ScheduleSimpleCollectionResource;

class ScheduleController extends Controller
{
    private $repository;
    
    public function __construct(ScheduleRepository $repository){
        $this->repository = $repository;
    }

    public function index(){
        $data = $this->repository->getAll();

        if(Auth::check()){
            return response()->json(new ScheduleCollectionResource($data), 200);
        }else{
            return response()->json(new ScheduleSimpleCollectionResource($data), 200);
        }
        
    }

    public function show($id){
        $item = $this->repository->find($id);

        if(Auth::check()){
            return response()->json(new ScheduleResource($item), 200);
        }else{
            return response()->json(new ScheduleSimpleResource($item), 200);
        }
        
    }

    public function scheduleByUser($id, Request $request){
        
        $data = $this->repository->scheduleByUser($id, $request->all());
        
        if(Auth::check()){
            return response()->json(new ScheduleCollectionResource($data), 200);
        }else{
            return response()->json(new ScheduleSimpleCollectionResource($data), 200);
        }
    }
}
