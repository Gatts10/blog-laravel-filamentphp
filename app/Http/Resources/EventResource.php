<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $images = collect();
        $items = $this->getMedia('events');
        foreach ($items as $item) {
            $images->push($item->getUrl());
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'date' => $this->date,
            'published_at' => $this->published_at->diffForHumans(),
            'thumbnail' => $this->getFirstMediaUrl('events'),
            'images' => $images
        ];
    }
}
