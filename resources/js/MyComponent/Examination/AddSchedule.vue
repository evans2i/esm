

<template>
    <div>

        <div class="intro-y flex flex-col sm:flex-row items-center mt-0">
            <h2 class="text-lg font-medium mr-auto">
                {{pagetitle}}
            </h2>
        </div>
        <div class="intro-y flex flex-col sm:flex-row items-center mt-0 lg:mt-5  sm:mt-3 mt-5">
            <h2 class="text-lg font-medium mr-auto">
                
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <button class="button text-white shadow-md mr-2" :class="addingTheme" @click="changeViews">{{ txtDiplay }}</button>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-1 lg:mt-5">
            <!-- BEGIN: Input -->
                <div class="intro-y box">
                    <schedule-table :angss="angs" urls="urls" v-show="tableshow"></schedule-table>
                    <div class="p-5" id="input" v-show="!tableshow">
                        <form @submit.prevent="saveDetail">
                            <div class="preview">
                                <div class="intro-y box px-5 pt-2 mt-5">
                                    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                            <select class="input w-full border" v-model="form.faculty_id" @change="loadSemisterFromFaculty">
                                                <option value="" selected>Select Faculties</option>
                                                <option v-for="(faculty,ind) in faculties" :key="ind" :value="faculty.id">{{ faculty.faculty }}</option>
                                            </select>
                                        </div>
                                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                            <select class="input w-full border" v-model="form.semester_id" @change="loadSubjectFromSemester">
                                                <option value="" selected>Select Semester</option>
                                                <option v-for="(semester,ind) in semesters" :key="ind" :value="semester.id">{{ semester.semester }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-10 pb-5 -mx-5">
                                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                            <select class="input w-full border" v-model="form.year_id" @change="loadSubjectFromSemester" >
                                                <option value="" selected>Select Year</option>
                                                <option v-for="(year,ind) in years" :key="ind" :value="year.id">{{ year.title }}</option>
                                            </select>
                                        </div>
                                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                            <select class="input w-full border" v-model="form.month_id" @change="loadSubjectFromSemester">
                                                <option value="" selected>Select Monthes</option>
                                                <option v-for="(month,ind) in monthes" :key="ind" :value="month.id">{{ month.title }}</option>
                                            </select>
                                        </div>
                                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                            <select class="input w-full border" v-model="form.exam_id" @change="loadSubjectFromSemester">
                                                <option value="" selected>Select Exams</option>
                                                <option v-for="(exam,ind) in exams" :key="ind" :value="exam.id">{{ exam.title }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="overflow-x-auto" v-show="showSubject"> 
                                        <table class="table table--sm"> 
                                            <thead> 
                                                <tr> 
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap"> Nme </th> 
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Date</th> 
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Start Time</th> 
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">End Time</th> 
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">FM(T) </th> 
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">PM(T)</th> 
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">FM(P)</th> 
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">PM(P)</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Action</th> 
                                                </tr> 
                                            </thead> 
                                            <tbody> 
                                                <tr v-for="(subject, subin) in form.subjects" :key="subin"> 
                                                    <td class="border-b dark:border-dark-5">{{subject.title}}</td> 
                                                    <td class="border-b dark:border-dark-5"><input type="date" v-model="form.subjects[subin].date" class="inputtable w-full rounded-full border mt-2" placeholder="Date" required></td> 
                                                    <td class="border-b dark:border-dark-5"><input type="time" v-model="form.subjects[subin].start_time" class="inputtable w-full rounded-full border mt-2" placeholder="Start Time" required></td> 
                                                    <td class="border-b dark:border-dark-5"><input type="time" v-model="form.subjects[subin].end_time" class="inputtable w-full rounded-full border mt-2" placeholder="End Time" required></td> 
                                                    <td class="border-b dark:border-dark-5"><input type="number" v-model="form.subjects[subin].full_mark_theory" class="inputtable w-full rounded-full border mt-2" placeholder="F mark T" ></td> 
                                                    <td class="border-b dark:border-dark-5"><input type="number" v-model="form.subjects[subin].pass_mark_theory" class="inputtable w-full rounded-full border mt-2" placeholder="P Mark F" ></td> 
                                                    <td class="border-b dark:border-dark-5"><input type="number" v-model="form.subjects[subin].full_mark_practical" class="inputtable w-full rounded-full border mt-2" placeholder="F mark P" ></td> 
                                                    <td class="border-b dark:border-dark-5"><input type="number" v-model="form.subjects[subin].pass_mark_practical" class="inputtable w-full rounded-full border mt-2" placeholder="P mark P" ></td> 
                                                    <td class="border-b dark:border-dark-5"><delete-button  @deleteBtn="removeDataInTable(subin,subject)" ></delete-button></td> 
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
                </div>
                <!-- END: Input -->
        </div>
        <div class="grid grid-cols-1 gap-1" >
    
        </div>

    </div>
</template>

<script>

    import JetButton from '@/Jetstream/Button'
    import BtnButton from '@/Buttons/BtnButton'
    import OverlapModal from '@/Customers/OverlapModal'
    import ScheduleTable from '@/MyComponent/Examination/TableSchedule'

    import DeleteButton from '@/Buttons/DeleteButton'
    import EditButton from '@/Buttons/EditButton'

    export default {
        props:['vans','urls','pagetitle','option'],
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
                angs:this.vans.examdatas.data,
                faculties:this.vans.faculty.data,
                years:this.vans.year.data,
                monthes:this.vans.months.data,
                exams:this.vans.exam.data,
                semesters:[],
                submitMode: false,
                editmode:false,
                tableshow:true,
                txtDiplay:"Add Schedule",
                addingTheme:"bg-theme-1",

                form: new Form({
                    exam_id:"",
                    faculty_id:"",
                    semester_id:"",
                    year_id:"",
                    month_id:"",
                    subjects:[],
                   
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
            loadSubjectFromSemester(){
                if (this.form.exam_id != "" && this.form.semester_id != "" && this.form.faculty_id != "" && this.form.year_id != "" && this.form.month_id != "") {
                    axios.get(`/ajaxs/loadSubjectFromSemester/${this.form.semester_id}`).then((data)=>{ 
                    this.form.subjects=data.data;
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
              this.id = null;
              this.indexValue= null;
              this.dataHolder={};
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

          findingLength(){
              return this.angs.length;
          },
          dataDisplaying(){
              return this.angs.slice(this.initNo,this.currentNo);
          },
          showSubject(){
            if (this.form.subjects != "" && this.form.subjects != undefined || this.form.subjects.length != 0 ) {
              return true;
            }
            return false;
          }

        },
       



        created(){
           
           
           
        }

}
</script>

<style lang="stylus" scoped>

</style>
