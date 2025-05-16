<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'proffession' => $this->proffession,
            'address' => $this->address,
            'phone' => $this->phone,
            'suggestion' => $this->suggestion,
            'education' => $this->education,

        ];
    }
}
