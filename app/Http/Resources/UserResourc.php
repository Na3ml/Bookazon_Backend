<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResourc extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
//            'username'=>$this->first_name ." ". $this->last_name,
            'email'=>$this->email,
            'address'=>$this->address,
            'phone_number'=>$this->phone_number,
            'gender'=>$this->gender,
        ];
    }
}
