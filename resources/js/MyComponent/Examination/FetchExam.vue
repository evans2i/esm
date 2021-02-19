

<template>
    <div class="intro-y box px-5 pt-2 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-10 pb-5 -mx-5">
            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                <select class="input w-full border" v-model="ledger.year_id" @change="getStudentSubjectData" >
                    <option value="" selected>Select Year</option>
                    <option v-for="(year,ind) in years" :key="ind" :value="year.id">{{ year.title }}</option>
                </select>
            </div>
            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                <select class="input w-full border" v-model="ledger.month_id" @change="getStudentSubjectData">
                    <option value="" selected>Select Monthes</option>
                    <option v-for="(month,ind) in monthes" :key="ind" :value="month.id">{{ month.title }}</option>
                </select>
            </div>
            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                <select class="input w-full border" v-model="ledger.faculty_id" @change="loadSemisterFromFaculty">
                    <option value="" selected>Select Faculties</option>
                    <option v-for="(faculty,ind) in faculties" :key="ind" :value="faculty.id">{{ faculty.faculty }}</option>
                </select>
            </div>

            
        </div>

        <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
            
            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                <select class="input w-full border" v-model="ledger.semester_id" @change="loadSingleSubjectFromSemester">
                    <option value="" selected>Select Semester</option>
                    <option v-for="(semester,ind) in semesters" :key="ind" :value="semester.id">{{ semester.semester }}</option>
                </select>
            </div>

            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                <select class="input w-full border" v-model="ledger.exam_id" @change="getStudentSubjectData">
                    <option value="" selected>Select Exams</option>
                    <option v-for="(exam,ind) in exams" :key="ind" :value="exam.id">{{ exam.title }}</option>
                </select>
            </div>

            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                <select class="input w-full border" v-model="ledger.subject_id" @change="getStudentSubjectData">
                    <option value="" selected>Select Subject</option>
                    <option v-for="(subject,ind) in subjects" :key="ind" :value="subject.id">{{ subject.title }}</option>
                </select>
            </div>

        </div>
    </div>
</template>

<script>

    import JetButton from '@/Jetstream/Button'
    import BtnButton from '@/Buttons/BtnButton'
    import OverlapModal from '@/Customers/OverlapModal'
    import ScheduleTable from '@/MyComponent/Examination/ExamTable'

    import DeleteButton from '@/Buttons/DeleteButton'
    import EditButton from '@/Buttons/EditButton'

    export default {
        props:['vans','showData'],
        components: {
            JetButton,
            BtnButton,
            OverlapModal,
            DeleteButton,
            EditButton,
            ScheduleTable
        },

        data() {
            return {
                faculties:this.vans.faculty.data,
                years:this.vans.year.data,
                monthes:this.vans.months.data,
                exams:this.vans.exam.data,
                semesters:[],
                subjects:[],

                ledger: {
                    exam_id:"",
                    faculty_id:"",
                    semester_id:"",
                    year_id:"",
                    month_id:"",
                    subject_id:"",
                },
            }
        },

        methods:{
            loadSemisterFromFaculty(){
                this.ledger.semester_id="";
                this.semesters=[];
                axios.get(`/ajaxs/loadSemisterFromFaculty/${event.target.value}`).then((data)=>{
                    this.semesters = data.data;
                });
            },
            loadSingleSubjectFromSemester(){
                axios.get(`/ajaxs/loadSubjectFromSemester/${event.target.value}`).then((data)=>{ 
                    this.subjects=data.data;
                });
            },
            getStudentSubjectData(){
                if (this.ledger.exam_id != "" && this.ledger.semester_id != "" && this.ledger.faculty_id != "" && this.ledger.year_id != "" && this.ledger.month_id != "" && this.ledger.subject_id != "") {
                   if(this.showData ==="addMark"){
                       appBus.fire('exam-fetch',this.ledger);
                   }else if(this.showData ==="examTable"){
                       appBus.fire('exam-table',this.ledger);
                   }
                   
                }

            },
        },

     

        computed: {
        },
       
        created(){
            
        }

}
</script>

<style lang="stylus" scoped>

</style>
