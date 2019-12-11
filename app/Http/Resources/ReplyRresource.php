<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyRresource extends JsonResource
{
   
    public function toArray($request)
    {
        return [
             'reply' => $this->body,
             'user' => $this->user,
             'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
