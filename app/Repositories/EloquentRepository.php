<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Pagination\AbstractPaginator as Paginator;

abstract class EloquentRepository implements IRepository
{
 /**
   * Model class for repo.
   *
   * @var string
   */
  protected $modelClass;

  /**
   * @param array $attributes
   * @return Model
   */
  protected function create($attributes)
  {
    return app($this->modelClass)::create($attributes);
  }

  /**
   * @param int $id
   * @param array $attributes
   * @return Model
   */
  protected function update($id,$attributes)
  {
    return $this->newQuery()->where('id', $id)->update($attributes);
  }

  /**
   * @param int $id
   * @return Model
   */
  protected function delete($id)
  {
    $item = $this->find($id, true);
    $item->delete();
    return $item;
  }

  /**
   * @return EloquentQueryBuilder|QueryBuilder
   */
  protected function newQuery()
  {    
    return app($this->modelClass)->newQuery();
  }

  /**
   * @param EloquentQueryBuilder|QueryBuilder $query
   * @param int                               $take
   * @param bool                              $paginate
   *
   * @return EloquentCollection|Paginator
   */
  protected function doQuery($query = null, $take = 15, $paginate = true)
  {
    if (is_null($query)) {
      $query = $this->newQuery();
    }

    if (true == $paginate) {
      return $query->paginate($take);
    }
    
    if ($take > 0 || false !== $take) {
      $query->take($take);
    }

    return $query->get();
  }

  /**
   * Returns all records.
   * If $take is false then brings all records
   * If $paginate is true returns Paginator instance.
   *
   * @param int  $take
   * @param bool $paginate
   *
   * @return EloquentCollection|Paginator
   */
  public function getAll($take = 15, $paginate = true)
  {
    return $this->doQuery(null, $take, $paginate);
  }


  /**
   * Retrieves a record by his id
   * If fail is true $ fires ModelNotFoundException.
   *
   * @param int  $id
   * @param bool $fail
   *
   * @return Model
   */
  public function find($id, $fail = true)
  {
    if ($fail) {
      return $this->newQuery()->findOrFail($id);
    }
    return $this->newQuery()->find($id);
  }
}
