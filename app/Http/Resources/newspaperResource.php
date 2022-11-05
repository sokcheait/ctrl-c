<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class newspaperResource extends JsonResource
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
            'name'=> $this->name,
            'id' => $this->id,
            'title'=> $this->title,
            'des' => $this->des,
            'image'=>asset('/storage/'.$this->image),
            'status'=> $this->status
        ];
    }
}
