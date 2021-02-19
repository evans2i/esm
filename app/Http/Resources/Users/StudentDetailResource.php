<?php


    namespace App\Http\Resources\Users;


    use Carbon\Carbon;
    use Illuminate\Http\Resources\Json\JsonResource;

    class StudentDetailResource extends JsonResource
    {
        public function toArray($request)
        {
            return [
                'id' => $this->id,
                'name' => $this->first_name . " " . $this->middle_name . " " . $this->last_name,
                'faculty' => $this->faculty,
                'gender' => $this->gender,
                'email' => $this->email,
                'semester' => $this->semester,
                'facultyName' => $this->facultyData->faculty,
                'semesterName' => $this->semesterData->semester,
                'studentBatch' => $this->studentBatch->title,
                'reg_no' => $this->reg_no,
                'batch' => $this->batch,
                'date_of_birth' => Carbon::parse($this->date_of_birth)->format('d-M-Y'),
                'age' => Carbon::now()->diffInYears(Carbon::parse($this->date_of_birth)),

                'address' => $this->address->address ."/". $this->address->temp_address,
                'home_phone' => $this->address->home_phone." /". $this->address->mobile_1. " / " .$this->address->mobile_2 ,


                'guardian' => $this->parent->guardian_first_name. " ". $this->parent->guardian_last_name,
                'guardianResident' => $this->parent->guardian_first_name . " ". $this->parent->guardian_last_name,
                'guardianContact' => $this->parent->guardian_mobile_1 . "/". $this->parent->guardian_mobile_2. "/". $this->parent->guardian_residence_number,
                'guardianOffice' => $this->parent->guardian_office . "--".$this->parent->guardian_occupation . "--". $this->parent->guardian_office_number,


                'father' => $this->parent->father_first_name. " ". $this->parent->father_last_name,
                'fatherResident' => $this->parent->father_first_name . " ". $this->parent->father_last_name,
                'fatherContact' => $this->parent->father_mobile_1 . "/". $this->parent->father_mobile_2. "/". $this->parent->father_residence_number,
                'fatherOffice' => $this->parent->father_office . "--".$this->parent->father_occupation . "--". $this->parent->father_office_number,

                'mother' => $this->parent->mother_first_name . " ". $this->parent->mother_last_name,
                'motherResident' => $this->parent->mother_first_name . " ". $this->parent->mother_last_name,
                'motherContact' => $this->parent->mother_mobile_1 . "/". $this->parent->mother_mobile_2. "/". $this->parent->mother_residence_number,
                'motherOffice' => $this->parent->mother_office . "--".$this->parent->mother_occupation . "--". $this->parent->mother_office_number,

            ];
        }
    }
