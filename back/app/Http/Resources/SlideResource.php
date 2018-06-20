<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SlideResource extends Resource
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
            'footnote' => $this->footnote,
            'image' => $this->image,
            'lang' => $this->lang,
        ];
    }
}