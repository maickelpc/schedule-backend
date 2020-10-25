<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
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
            'id' => $this->id,
            'client_name' => $this->client_name,
            'client_email' => $this->client_email,
            'client_phone' => $this->client_phone,
            'subject' => $this->subject,
            'meeting_agenda' => $this->meeting_agenda,
            'requester' => $this->requester,
            'participants' => $this->participants->with('user'),
            'created_at' => $this->created_at,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status,            
        ];
    }
}
