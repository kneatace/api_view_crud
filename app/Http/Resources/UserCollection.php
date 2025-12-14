<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        // Wrap each user in UserResource
        return [
            'data' => UserResource::collection($this->collection),
        ];
    }

    /**
     * Add extra meta information to the response (optional).
     */
    public function with($request)
    {
        return [
            'status' => 'success',
            'count' => $this->collection->count(),
        ];
    }
}
