<?php

namespace App\Http\Resources\Books;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BookCategoryResource extends ResourceCollection
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
            'title' => $this->title,  
            'slug' => $this->slug, 
            'label' => $this->title 
        ];
    }
}
