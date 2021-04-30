<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return[
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'quantity'=>$this->quantity,
            'price'=>$this->price
        ];
    }

    public function with($request){
        return[
            'version' => "1.0.0",
            'author' => "EWRC01"
        ];
    }
}
