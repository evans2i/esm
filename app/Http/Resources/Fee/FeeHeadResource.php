<?php

namespace App\Http\Resources\Fee;

use Illuminate\Http\Resources\Json\JsonResource;

class FeeHeadResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [ 'id' => $this->id, 'fee_head_title' => $this->fee_head_title, 'fee_head_amount' => $this->fee_head_amount, 'status' => $this->status,  'label' => $this->fee_head_title ];
    }
}
