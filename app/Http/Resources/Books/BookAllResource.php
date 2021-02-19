<?php

namespace App\Http\Resources\Books;

// use Illuminate\Http\Resources\Json\ResourceCollection;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BookAllResource extends JsonResource
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
            'edition_year' => Carbon::parse($this->edition_year)->format('Y'),
            'publisher' => $this->publisher,
            'publish_year' => Carbon::parse($this->edition_year)->format('Y'),
            'series' => $this->series,
            'author' => $this->author,
            'price' => $this->price,
            'total_pages' => $this->total_pages,
            'source' => $this->source,
            'notes' => $this->notes,
            'status' => $this->status,
        ];
    }
}
