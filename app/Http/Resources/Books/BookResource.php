<?php

namespace App\Http\Resources\Books;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'id' => $this->id, 
            'created_by' => $this->createdBy->name,
            'book_code' => $this->book_code,
            'book_master_id' => $this->book_master_id,
            'toggle' =>false,
            'book_status_id' =>$this->book_status_id,
            'book_status' =>$this->bookStatus->title,
            'display_class' =>$this->bookStatus->display_class,
        ];
    }
}
