<?php


    namespace App\Http\Resources\Users;


    use Illuminate\Http\Resources\Json\JsonResource;

    class StaffStudentResource extends JsonResource
    {
        public function toArray($request)
        {
            return [
                'id' => $this->id,
                'name' =>$this->first_name." ".$this->middle_name." ".$this->last_name,
                'reg_no' => $this->reg_no,
                'type' => 'Staff',
            ];
        }

    }