<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            "description" => $this->description,
            "category_group_name" => $this->sub_category?->parent?->group?->name,
            "main_category_name" => $this->sub_category?->parent?->name,
            "sub_category_name" => $this->sub_category?->name,
            "brand_name" => $this->brand?->name,
            'image_url' => $this->image_url,
            'mou' => $this->MOU,
            'packaging' => $this->packaging,
            'availability' => $this->availability ? 'Instock' : 'Outstock',
            'manufacturer' => $this->manufacturer,
            'distributed_by' => $this->distributed_by,
            'product_details' => $this->product_details,
            'other_information' => $this->other_information
        ];
    }
}
