<?php

namespace Saberycategory\Cms\App\Resources;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Sabery\Package\Http\Resources\ProductResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return[
            'user'=>new UserResource($this->user),
            'name'=>$this->name,
            'description'=>$this->description,
            'products'=>ProductResource::collection($this->products)
        ];
    }
}
