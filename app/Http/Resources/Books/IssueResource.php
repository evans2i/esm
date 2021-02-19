<?php


    namespace App\Http\Resources\Books;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;


    class IssueResource extends JsonResource
    {
        public function toArray($request)
        {
            return [
                'id' => $this->id,
                'book_id' => $this->book_id,
                'issued_on' => Carbon::parse($this->issued_on)->format('Y-m-d'),
                'due_date' => Carbon::parse($this->due_date)->format('Y-m-d'),
                'return_date' => $this->return_date,
                'code' => $this->libBook->book_code,
                'title' => $this->libBook->bookMaster->title,
                'category' => $this->libBook->bookMaster->bookCategory->title,
                'sub_title' => $this->libBook->bookMaster->sub_title,
                'status' => $this->status,
                'days' =>Carbon::parse($this->due_date)->diffInDays(Carbon::now()),
            ];
        }
    }
