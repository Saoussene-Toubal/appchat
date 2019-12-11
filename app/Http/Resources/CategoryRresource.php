<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryRresource extends JsonResource
{
    
    public function toArray($request)
    {
      return [
          'name' => $this->name,
          'id' => $this->id
      ] ;
    }
}
