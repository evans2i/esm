
<template>
     <div class="overflow-x-auto">
         <fetch-exam :vans="vans" :showData="examTable"></fetch-exam>
        <table class="table">
            <thead> 
                <tr> 
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Student Name </th> 
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Theory Marks </th> 
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Absent Theory</th> 
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Practical Marks</th> 
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Absent Practical</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Action</th> 
                </tr> 
            </thead> 
            <tbody> 
                <tr v-for="(van, index) in angs" :key="index"> 
                    
                    <td class="border-b dark:border-dark-5">{{van.name}}</td> 
                    <td class="border-b dark:border-dark-5">{{van.obtain_mark_theory}}</td> 
                    <td class="border-b dark:border-dark-5">{{van.absent_theory}}</td> 
                    <td class="border-b dark:border-dark-5">{{van.obtain_mark_practical}}</td> 
                    <td class="border-b dark:border-dark-5">{{van.absent_practical}}</td> 
                    <td class="border-b dark:border-dark-5">
                        <edit-button  @editBtn="actionSingleEdit(index,van)" ></edit-button>
                        <delete-button  @deleteBtn="removeDataInTable(index,van)" ></delete-button>
                    </td> 
                    
                    <!-- <dt>
                        <td class="border-b dark:border-dark-5"><input type="hidden" v-model="form.exams[index].students_id" value="form.exams[index].students_id" class="inputtable w-full rounded-full border mt-2"  >{{form.exams[index].name}}</td> 
                        <td class="border-b dark:border-dark-5"><input type="number" v-model="form.exams[index].obtain_mark_theory" class="inputtable w-full rounded-full border mt-2"  ></td> 
                        <td class="border-b dark:border-dark-5"><input type="number" v-model="form.exams[index].absent_theory" class="inputtable w-full rounded-full border mt-2" ></td> 
                        <td class="border-b dark:border-dark-5"><input type="number" v-model="form.exams[index].obtain_mark_practical" class="inputtable w-full rounded-full border mt-2"  ></td> 
                        <td class="border-b dark:border-dark-5"><input type="number" v-model="form.exams[index].absent_practical" class="inputtable w-full rounded-full border mt-2" ></td> 
                        <td class="border-b dark:border-dark-5">
                            <delete-button  @deleteBtn="removeDataInTable(index,exam)" ></delete-button>
                        </td> 
                    </dt> -->
                </tr> 
            </tbody>
        </table>
 </div>
</template>

<script>

    import JetButton from '@/Jetstream/Button'
    import DeleteButton from '@/Buttons/DeleteButton'
    import EditButton from '@/Buttons/EditButton'
    import FetchExam from '@/MyComponent/Examination/FetchExam'
    

    export default {
        props:['vans','gwams','urls'],
        components: {
            JetButton,
            DeleteButton,
            EditButton,
            FetchExam
        },

        data() {
            return {
                angs:this.gwams,
                editable:false,
                examTable:"examTable",

                form: new Form({
                    id:"",
                    exam_id:"",
                    faculty_id:"",
                    semester_id:"",
                    year_id:"",
                    month_id:"",
                    subject_id:"",
                    absent_practical:"",
                    obtain_mark_practical:"",
                    absent_theory:"",
                    obtain_mark_theory:"",
                }),
                
            }
        },

        methods: {


            getStudentSubjectData(ledger){
                this.form.exam_id = ledger.exam_id;
                this.form.semester_id = ledger.semester_id;
                this.form.faculty_id = ledger.faculty_id;
                this.form.year_id = ledger.year_id;
                this.form.month_id = ledger.month_id;
                this.form.subject_id = ledger.subject_id;
                if (this.form.exam_id != "" && this.form.semester_id != "" && this.form.faculty_id != "" && this.form.year_id != "" && this.form.month_id != "" && this.form.subject_id != "") {
                    axios.get(`/accademic/loadExamMarks/${this.form.year_id}/${this.form.month_id}/${this.form.exam_id}/${this.form.faculty_id}/${this.form.semester_id}/${this.form.subject_id}`).then((data)=>{ 
                        if (data.data.error === false) {
                            this.angs = data.data.exist;
                        } else {
                            Swal.fire("Something Wrong Happened !", `${data.data.error} !`, "error");
                        }
                });  
                }
            }, 

            actionSingleEdit(index, van){
                
                document.getElementById(`current-exam-${van.id}`);
                this.form.fill(van)


            },

            actionDelete(index,van){
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then(result => {
                        if (result.value) {
                            this.form.delete(`/accademic/${this.urls}/${van.id}`)
                                .then((data) => {
                                    let tr = this.angs.indexOf(van);
                                    Swal.fire("Deleted!", `${this.pagetitle} has been deleted.`, "success");
                                    this.angs.splice(tr,1);
                                    this.spinning=!this.spinning;

                                }).catch(() => {
                                    Swal.fire("Something Wrong Happened !", "Not Deleted Please try Again !", "error");
                                });
                        }else{

                        }
                    });
            },
         
        },

        computed: {
            findingLength(){
              return this.angs.length;
          },
          dataDisplaying(){
              return this.angs.slice(this.initNo,this.currentNo);
          },
       
        },
        created(){
           appBus.listen('exam-table',this.getStudentSubjectData)
        }


}
</script>













