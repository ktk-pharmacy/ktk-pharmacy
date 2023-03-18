<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
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
            'name' => $this->name,
            'name_mm' => $this->name_mm,
            'image_url' => $this->image_url,
            'uom' => $this->UOM,
            "sale_price" => $this->sale_price,
            "discount_price" => $this->discount,
            'packaging' => $this->packaging,
            'is_new' => $this->is_new,
            'availability' => $this->availability ? 'Instock' : 'Outstock',
            "sold_count" => $this->sold_count
        ];
    }
}
