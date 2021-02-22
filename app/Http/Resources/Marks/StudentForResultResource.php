<?php


    namespace App\Http\Resources\Marks;


    use Illuminate\Http\Resources\Json\JsonResource;

    class StudentForResultResource extends JsonResource
    {

        /**
         * Transform the resource into an array.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return array
         */
        public function toArray($request)
        {
            return [
                'id' => $this->id,
                'faculty' => $this->examSchedule->faculty->faculty,
                'subject'=>$this->examSchedule->subject->title,
                'semester'=>$this->examSchedule->semester->semester,
                'exam'=>$this->examSchedule->exam->title,
                'month'=>$this->examSchedule->month->title,
                'year'=>$this->examSchedule->year->title,
                'faculty_id' => $this->examSchedule->faculty_id,
                'subject_id'=>$this->examSchedule->subjects_id,
                'semester_id'=>$this->examSchedule->semesters_id,
                'exam_id'=>$this->examSchedule->exams_id,
                'month_id'=>$this->examSchedule->months_id,
                'year_id'=>$this->examSchedule->years_id,
                'student_id' => $this->student_id,
                'reg_no' => $this->student->reg_no,
                'name' => $this->student->first_name." ".$this->student->middle_name." ".$this->student->last_name
            ];
        }
    }
