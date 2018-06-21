<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SkillResource extends Resource
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
            'skill' => $this->skill,
            'level' => $this->level,
        ];
    }
}