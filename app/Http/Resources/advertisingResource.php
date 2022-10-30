<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class advertisingResource extends JsonResource
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
            'ads_url'=> $this->ads_url,
            'location'=> $this->location,
            'image'=>asset('/storage/'.$this->image),
            'status'=> $this->status
        ];
    }
}
