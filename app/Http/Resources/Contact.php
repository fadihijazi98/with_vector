<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Contact extends JsonResource
{

    public function toArray($request)
    {
        return [
            'data' =>
            [
                'contact_id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'birth_day' => $this->birth_day,
                'company' => $this->company,
                'last_update' => $this->updated_at->diffForHumans()
            ],
            'links' =>
            [
              'link' => $this->path(),
            ],
        ];
    }
}
