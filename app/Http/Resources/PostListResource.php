<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

class PostListResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'thumbnail' => $this->getFirstMediaUrl('posts'),
            'content' => Str::limit($this->content, 125, '...'),
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
