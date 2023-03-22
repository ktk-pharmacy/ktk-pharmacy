<?php

namespace App\Http\Resources;

use DB;
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
        if (!is_null($this->discount_amount) && $this->discount_from <= date('Y-m-d') && date('Y-m-d', strtotime("$this->discount_to - 1 day")) >= date('Y-m-d')) {
            $promotion = 1;
        } else {
            $promotion = null;
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'name_mm' => $this->name_mm,
            'image_url' => $this->image_url,
            'uom' => $this->UOM,
            "sale_price" => $this->sale_price,
            "discount_price" => $this->discount,
            "discount_type" => $this->discount_type,
            "discount_from" => $this->discount_from,
            "discount_to" => $this->discount_to,
            "promotion" => $promotion,
            'packaging' => $this->packaging,
            'is_new' => $this->is_new,
            'availability' => $this->availability ? 'Instock' : 'Outstock',
            "sold_count" => $this->sold_count
        ];
    }
}
