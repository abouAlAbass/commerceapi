<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description'=> $this->detail,
            'price' => $this->price,
            'discount' => $this->discount,
            'rating' =>($this->reviews->count()>0)? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'no rating yet',
            'href' => [
                'link' => route('products.show',$this->id)
            ]
        ];
    }

    public function with($request){

        return [
            'meta'=> [
                'apiName'=>'CommerceApi'
            ]
        ];

    }
}
