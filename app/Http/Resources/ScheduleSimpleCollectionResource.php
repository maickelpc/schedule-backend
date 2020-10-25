<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\ScheduleSimpleResource;

class ScheduleSimpleCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($item){ return new ScheduleSimpleResource($item); }),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
