<?php

namespace App\Http\Resources\Books;

use Illuminate\Http\Resources\Json\JsonResource;

class BookMasterResource extends JsonResource
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
            'book_category_id' => $this->book_category_id,
            'book_category' => $this->bookCategory->title,
            'isbn_number' => $this->isbn_number,
            'code' => $this->code,
            'title' => $this->title,
            'sub_title' => $this->sub_title,
            'image' => $this->image,
            'language' => $this->language,
            'editor' => $this->editor,
            'edition' => $this->edition,
            'edition_year' => $this->edition_year,
            'publisher' => $this->publisher,
            'publish_year' => $this->publish_year,
            'series' => $this->series,
            'author' => $this->author,
            'price' => $this->price,
            'total_pages' => $this->total_pages ,
            'source' => $this->source,
            'notes' => $this->notes,
            'status' => $this->status,
            'totalbook' =>$this->bookCollection->count(),
            'availablebook' =>$this->bookCollection->where('book_status_id',1)->count(),
            'books' =>BookResource::collection($this->bookCollection),
        ];
    }
}
