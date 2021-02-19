<?php


    namespace App\Http\Resources\Users;


    use Illuminate\Http\Resources\Json\JsonResource;

    class StaffResource extends JsonResource
    {
        public function toArray($request)
        {
            return [
                'id' => $this->id,
                'name' =>$this->first_name." ".$this->middle_name." ".$this->last_name,
                'qualification' => $this->qualification,
                'gender' => $this->gender,
                'email' => $this->email,
                'designation' => $this->staffDesignation->title,
                'qualification' => $this->qualification,
                'home_phone' => $this->home_phone,
                'address' => $this->address,
                'reg_no' => $this->reg_no,
                'join_date' => $this->join_date,
                'date_of_birth' => $this->date_of_birth,
                'nationality' => $this->nationality,
            ];
        }

    }
