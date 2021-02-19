<template>
    <div class="p-5" id="input">
        <form @submit.prevent="saveDetail">
            <div class="preview">
                <fetch-exam :vans="vans" :showData="addMark"></fetch-exam>
                <div class="overflow-x-auto" v-show="showSubject"> 
                        <table class="table table--sm"> 
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
                                <tr v-for="(exam, index) in form.exams" :key="index"> 
                                    <td class="border-b dark:border-dark-5">
                                        <input type="hidden" v-model="form.exams[index].student_id" value="form.exams[index].student_id" class="input w-full rounded-full border mt-2" >
                                        <input type="hidden" v-model="form.exams[index].id" value="form.exams[index].id" class="input w-full rounded-full border mt-2"  >

                                        {{form.exams[index].name}}</td> 
                                    <td class="border-b dark:border-dark-5"><input type="number" v-model="form.exams[index].obtain_mark_theory" class="input w-full rounded-full border border-b mt-2"  ></td> 
                                    <td class="border-b dark:border-dark-5">
                                        <div class="mt-0"> <input type="checkbox"  v-model="form.exams[index].absent_theory"  class="input input--switch border"> </div>
                                    </td> 
                                    <td class="border-b dark:border-dark-5"><input type="number" v-model="form.exams[index].obtain_mark_practical" class="input w-full rounded-full border border-bmt-2"  ></td> 
                                    <td class="border-b dark:border-dark-5">
                                        <div class="mt-0"> <input type="checkbox"  v-model="form.exams[index].absent_practical" class="input input--switch border"> </div>
                                    </td> 
                                    <td class="border-b dark:border-dark-5">
                                        <delete-button  @deleteBtn="removeDataInTable(index,exam)" ></delete-button>
                                    </td> 
                                </tr> 
                            </tbody>
                            
                        </table> 
                        
                    </div> 


            </div>
            <div class="p-5 border-t flex">
                <button type="button" v-show="!editmode" :disabled="isDisabled" @click="cancelDetail" class="button button--sm border block text-dark">Reset Form</button>
                <button type="button" v-show="editmode" :disabled="isDisabled" @click="cancelUpdate" class="button button--sm border block  text-dark">Cancel Update</button>
                <button type="submit" v-show="!editmode" :disabled="isDisabled"  class="button button--sm border text-white dark:border-dark-5 bg-theme-1 dark:text-gray-300 ml-auto">Submit</button>
                <button v-show="editmode" type="button" :disabled="isDisabled" @click="updateDetail" class="button button--sm border text-white dark:border-dark-5 bg-theme-1 dark:text-gray-300 ml-auto">Update changes</button>
            </div>
        </form>

    </div>
</template>

<script>

    import JetButton from '@/Jetstream/Button'
    import BtnButton from '@/Buttons/BtnButton'
    import ScheduleTable from '@/MyComponent/Examination/ExamTable'
    import FetchExam from '@/MyComponent/Examination/FetchExam'
    import AddMark from '@/MyComponent/Examination/AddMark'
    import DeleteButton from '@/Buttons/DeleteButton'



    export default {
        props:['vans','urls','pagetitle','option'],
        components: {
            JetButton,
            BtnButton,
            DeleteButton,
            ScheduleTable,
            AddMark,
            FetchExam
        },

        data() {
            return {
                angs:[],
                submitMode: false,
                editmode:false,
                tableshow:true,
                txtDiplay:"Add Schedule",
                addingTheme:"bg-theme-1",
                error : "",
                addMark:"addMark",

                form: new Form({
                    exam_id:"",
                    faculty_id:"",
                    semester_id:"",
                    year_id:"",
                    month_id:"",
                    subject_id:"",
                    exams:[],
                }),
            }
        },

        methods: {
            loadSemisterFromFaculty(){
                this.form.semester_id="";
                this.form.subjects=[];
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
            getStudentSubjectData(ledger){
                this.form.exam_id = ledger.exam_id;
                this.form.semester_id = ledger.semester_id;
                this.form.faculty_id = ledger.faculty_id;
                this.form.year_id = ledger.year_id;
                this.form.month_id = ledger.month_id;
                this.form.subject_id = ledger.subject_id;
                if (this.form.exam_id != "" && this.form.semester_id != "" && this.form.faculty_id != "" && this.form.year_id != "" && this.form.month_id != "" && this.form.subject_id != "") {
                    axios.get(`/accademic/examMarkLedgerStudent/${this.form.year_id}/${this.form.month_id}/${this.form.exam_id}/${this.form.faculty_id}/${this.form.semester_id}/${this.form.subject_id}`).then((data)=>{ 
                        if (data.data.error === false) {
                            this.angs = data.data.exist;
                            this.form.exams= data.data.students.concat(data.data.exist);
                        } else {
                            Swal.fire("Something Wrong Happened !", `${data.data.error} !`, "error");
                        }
                });  
                }
            },
            removeDataInTable(index, subject){
                console.log(index);
            },
            changeViews(){
                this.tableshow = !this.tableshow;
                if(this.tableshow === true){
                    this.addingTheme = "bg-theme-1";
                    this.txtDiplay = "Add Schedule";
                }else{
                    this.txtDiplay = "Display Schedule"
                    this.addingTheme = "bg-theme-1"
                }
            },
            saveDetail(){
                    this.$Progress.start();
                    this.form
                        .post(`/accademic/${this.urls}`)
                        .then((data) => {
                            if(data.data === "successfull"){
                                this.cancelUpdate();
                                Toast.fire({
                                    icon: "success",
                                    title: `${this.pagetitle} created successfully`
                                });

                            }
                            // this.angs.push(data.data);
                            
                            this.$Progress.finish();
                        })
                        .catch(() => {
                            Toast.fire({
                                icon: "error",
                                title: "van did not created successfully"
                            });
                        });
                         window.location.reload();
            },
            updateDetail(){
                this.$Progress.start();
                this.form.put(`/accademic/${this.urls}/${this.id}`)
                    .then((data) => {
                        this.angs.splice(this.indexValue, 1, data.data);
                        this.cancelUpdate();
                        // this.angs.splice(index,1);
                        Toast.fire({
                            icon: "success",
                            title: `${this.pagetitle} Updated successfully`
                        });
                        this.$Progress.finish();
                    }).catch(() => {
                        this.$Progress.fail();
                        Toast.fire({
                            icon: "error",
                            title: `${this.pagetitle} did not Updated successfully`
                        });
                    });
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
            cancelDetail(){
              this.cancelUpdate();
              Toast.fire({ icon: "success", title: "reseted successfully" });
            },
            cancelUpdate(){
              this.form.reset();
              this.editmode = false;
            },
            actionEdit(index,van){
              this.editmode = true;
              this.indexValue= this.angs.indexOf(van);
              this.hideGuadian = false
              this.id= van.id;
                this.form.reset();
                this.form.fill(van);
            },

        },

        computed: {
          isDisabled() {
            if (!this.form.year_id || !this.form.semester_id || !this.form.month_id|| !this.form.faculty_id || !this.form.exam_id) {
              return !this.submitMode;
            }
          },
          isToDelete() {
            if (this.$page.user.role === "superadministrator") {
              return !this.optionValue.delete;
            }
            return this.optionValue.delete;
          },
          isToEdit() {
            if (this.$page.user.role === "superadministrator") {
              return !this.optionValue.edit;
            }
            return this.optionValue.edit;
          },

          isToShow() {
            if (this.$page.user.role === "superadministrator") {
              return !this.optionValue.show;
            }
            return this.optionValue.show;
          },

          
          showSubject(){
            if (this.form.exams != "" && this.form.exams != undefined || this.form.exams.length != 0 ) {
              return true;
            }
            return false;
          }

        },

        created(){
           appBus.listen('exam-fetch',this.getStudentSubjectData)
        }

}
</script>

<style lang="stylus" scoped>

</style>