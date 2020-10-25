<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Pagination\AbstractPaginator as Paginator;

interface IRepository
{
  
    public function create($attributes);
    
    public function update($id,$attributes);

    public function delete($id);

    public function getAll($take, $paginate);

    public function find($id, $fail);
    
        
    
}
