<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    
    public function toArray($request)
    {
        Carbon::setLocale('pt');

        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'category' => [
                'name' => $this->category->name,
                'slug' => $this->category->slug,
            ],
            'event_id' => $this->event_id,
            'event' => [
                'name' => $this->event->name ?? null,
                'slug' => $this->event->slug ?? null,
            ],
            'title' => $this->title,
            'slug' => $this->slug,
            'thumbnail' => $this->getFirstMediaUrl('posts'),
            'content' => $this->content,
            'is_published' => $this->is_published,
            'tags' => $this->tags,
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans()
        ];
    }
}