<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            "product_id" => $this->product->id,
            "name" => $this->product?->name,
            "feature_image" => $this->product?->image_url,
            "sale_price" => $this->product?->sale_price,
            "discount_price" => $this->product?->discount,
            "quantity" => $this->quantity,
            "net_weight" => (float)$this->product?->net_weight,
            "gross_weight" => (float)$this->product?->gross_weight,
        ];
    }
}
