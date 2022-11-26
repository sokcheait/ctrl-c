<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class socialmediaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'social_id' => array($this->social_id),
            'name'=> $this->name,
            'email'=> $this->email,
            'password'=> $this->password,
            'image'=>asset('/storage/'.$this->image),
            'status'=> $this->status
        ];
    }
}
