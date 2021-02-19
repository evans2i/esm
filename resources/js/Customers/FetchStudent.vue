<template>
    <div class="intro-y box px-5 pt-2 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
            <table class="table table--sm">
                <tbody>
                    <tr >
                        <td class="border-b dark:border-dark-5">
                            <select class="input w-full border" v-model="form.faculty_id" @change="loadSemisterFromFaculty">
                                <option value="" selected>Select Class</option>
                                <option v-for="(faculty,ind) in faculties" :key="ind" :value="faculty.id">{{ faculty.faculty }}</option>
                            </select>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <select class="input w-full border" v-model="form.semester_id" @change="loadStudentFromFacultyAndSemester">
                                <option value="" selected>Select Semesters</option>
                                <option v-for="(semester,ind) in semesters" :key="ind" :value="semester.id">{{ semester.semester }}</option>
                            </select>
                        </td>
                        <td class="border-b dark:border-dark-5">
                            <select class="input w-full border" v-model="form.batch_id" @change="changeDataBasedOnBatch">
                                <option value="" disabled selected>Select Batches</option>
                                <option v-for="(batch,ind) in batchs" :key="ind" :value="batch.id">{{ batch.title }}</option>
                            </select>

                        </td>
                        <td class="border-b dark:border-dark-5"><delete-button  @deleteBtn="removeDataInTable()" ></delete-button></td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "FetchStudent",

        data(){
            return{
                semesters:[],
                students:[],

                form: new Form({
                    semester_id:"",
                    batch_id:"",
                    faculty_id:"",
                })
            }
        },

        methods:{
            loadSemisterFromFaculty(){
                this.form.semester_id="";
                this.form.batch_id="";
                this.semesters=[];
                axios.get(`/ajaxs/loadSemisterFromFaculty/${event.target.value}`).then((data)=>{
                    this.semesters = data.data;
                });
            },
            loadStudentFromFacultyAndSemester(){
                this.students=[];
                this.form.batch_id="";
                if(this.form.semester_id !=="" && this.form.semester_id !== undefined){
                    axios.get(`/ajaxs/loadStudentFromFacultyAndFees/${this.form.faculty_id}/${event.target.value}`).then((data)=>{
                        this.students = data.data;
                    });
                }
                appBus.fire('fetch-student', this.students)
            },
            changeDataBasedOnBatch(){
                if(this.form.batch_id !=="" && this.form.batch_id !== undefined){
                    if(this.form.semester_id !=="" && this.form.semester_id !== undefined){
                        let batch = this.form.batch_id;
                        let data = this.students;
                        let holder = [];
                        data.forEach(el => {
                            if (el.batch === batch) {
                                holder.push(el);
                            }
                        });
                        this.students = holder;
                    }else{
                        this.form.semester_id="";
                        this.form.batch_id="";
                    }
                }
                appBus.fire('fetch-student', this.students);
            },

        }
    }
</script>

<style scoped>

</style>
