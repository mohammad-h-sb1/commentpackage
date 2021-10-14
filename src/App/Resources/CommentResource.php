<?php

namespace Saberycategory\Cms\App\Resources;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        return[
            'user'=>new UserResource($this->user),
            'description'=>$this->description,
        ];
    }
}
