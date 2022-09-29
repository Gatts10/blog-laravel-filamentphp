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
            'author_id' => $this->user_id,
            'author' => [
                'name' => $this->user->name,
            ],
            'title' => $this->title,
            'slug' => $this->slug,
            'thumbnail' => $this->getFirstMediaUrl('posts'),
            'content' => $this->content,
            'published_at' => $this->published_at->diffForHumans(),
            'tags' => $this->tags,
            'comments' => $this->comments
        ];
    }
}