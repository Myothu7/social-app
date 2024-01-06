<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    #'user_id','feeling_id', 'title', 'content', 'photo'
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'photo' => $this->photo,
            'relationships' => [
                'user' => $this->user,
                'feeling' => $this->feeling
            ],
            // 'links' => [
            //     'self' => 'link-value',
            // ],
        ];
    }
}
