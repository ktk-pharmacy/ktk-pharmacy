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
            'packaging' => $this->packaging,
            'availability' => $this->availability ? 'Instock' : 'Outstock'
        ];
    }
}
