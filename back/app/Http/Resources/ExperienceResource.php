<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ExperienceResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'position' => $this->position,
            'company' => $this->company,
            'start' => $this->start->diffForHumans(),
            'end' => $this->end->diffForHumans(),
            'description' => $this->description,
            'position' => $this->position,
            'links' => $this->links,
        ];
    }
}