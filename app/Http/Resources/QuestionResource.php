<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;


class QuestionResource extends JsonResource
{
    
    public function toArray($request)
    {
        return[
            'title' => $this->title,
            'path' => $this->path,
            'body' => $this->body,
            'created_at' => $this->created_at->diffForHumans(),
            'user_id' => $this->user_id
        ];
    }
}
