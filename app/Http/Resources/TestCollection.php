<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Http;

class TestCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
            return [
                'success' => true,
                'msg' => 'All Posts',
                'data' => $this->collection,
                'links' => 
                        [
                            'self' => 'link-value',
                        ]
            ];
    }
}
