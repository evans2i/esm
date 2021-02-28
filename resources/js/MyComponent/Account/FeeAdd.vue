

<template>
    <div>
        <div class="intro-y flex flex-col sm:flex-row items-center mt-0 lg:mt-5  sm:mt-3 mt-5">
            <h2 class="text-lg font-medium mr-auto">

            </h2>
<!--            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">-->
<!--&lt;!&ndash;                <button class="button text-white shadow-md mr-2" :class="addingTheme" @click="changeViews">{{ txtDiplay }}</button>&ndash;&gt;-->
<!--            </div>-->
<!--            -->
        </div>

        <div class="grid grid-cols-1 gap-1 lg:mt-5">
            <!-- BEGIN: Input -->
                <div class="intro-y box">
                    <div class="p-5" id="input">
                        <form @submit.prevent="saveDetail">
                            <div class="preview">
                                <div class="intro-y box px-5 pt-2 mt-5">
                                    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                                        <table class="table table--sm">
                                            <thead>
                                                <tr>

                                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap"> Date Due</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Fee Head</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Fee Amount</th>
                                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap"><a @click="addDataAndPushToFee"><i class="feather icon-plus"></i> Add</a> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(fee, inde) in form.fees" :key="inde">
                                                    <td class="border-b dark:border-dark-5"><input type="date" v-model="form.fees[inde].fee_due_date" class="inputtable w-full rounded-full border mt-2" placeholder="Date" required></td>
                                                    <td class="border-b dark:border-dark-5">
                                                        <select class="input w-full border" v-model="form.fees[inde].id" @change="assignDataandPushToFee(inde)">
                                                            <option value="" selected>Select Fee Head</option>
                                                            <option v-for="(fes,index) in feeHeads" :key="index" :value="fes.id">{{ fes.label }}</option>
                                                        </select>
                                                    </td>
                                                    <td class="border-b dark:border-dark-5"><input type="text" disabled v-model="form.fees[inde].fee_head_amount" class="inputtable w-full rounded-full border mt-2" placeholder="End Time" required></td>
                                                    <td class="border-b dark:border-dark-5"><delete-button  @deleteBtn="removeDataInTable(inde)" ></delete-button></td>
                                                </tr>

                                                <tr >
                                                    <td class="border-b dark:border-dark-5"><input type="date" v-model="dataHolder.fee_due_date"  class="input w-full rounded-full border mt-2" placeholder="Date"></td>
                                                    <td class="border-b dark:border-dark-5">
                                                        <select class="input w-full border"   @change="assignDataHolder()" >
                                                            <option value="" selected>Select Fee Head</option>
                                                            <option v-for="(feeHead,index) in feeHeads" :key="feeHead.id" :value="index ">{{ feeHead.label }}</option>
                                                        </select>
                                                        </td>
                                                    <td class="border-b dark:border-dark-5"><input  type="text" disabled v-model="dataHolder.fee_head_amount"   class="input w-full rounded-full border mt-2"></td>
                                                    <td class="border-b dark:border-dark-5"><delete-button  @deleteBtn="removeDataInTable()" ></delete-button></td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>


                                    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                            <select class="input w-full border" v-model="form.faculty_id" @change="loadSemisterFromFaculty">
                                                <option value="" selected>Select Class</option>
                                                <option v-for="(faculty,ind) in faculties" :key="ind" :value="faculty.id">{{ faculty.faculty }}</option>
                                            </select>
                                        </div>
                                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                            <select class="input w-full border" v-model="form.semester_id" @change="loadStudentFromFacultyAndSemester">
                                                <option value="" selected>Select Semesters</option>
                                                <option v-for="(semester,ind) in semesters" :key="ind" :value="semester.id">{{ semester.semester }}</option>
                                            </select>
                                        </div>
                                       <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                            <select class="input w-full border" v-model="form.batch_id" @change="changeDataBasedOnBatch">
                                                <option value="" disabled selected>Select Batches</option>
                                                <option v-for="(batch,ind) in batchs" :key="ind" :value="batch.id">{{ batch.title }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="overflow-x-auto">
                                    <table class="table table--sm">
                                        <thead>
                                            <tr>
                                                <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">
                                                    <input type="checkbox"   class="input input--switch border" v-model="check"  @change="markAllSturdents">
                                                </th>
                                                <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Student No</th>
                                                <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap"> Name </th>
                                                <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Class</th>
                                                <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Terms</th>

                                                <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(student, inde) in form.students" :key="inde">
                                                <td class="border-b dark:border-dark-5">
                                                    <input type="checkbox" class="input input--switch border" v-model="form.students[inde].check">
                                                </td>
                                                <td class="border-b dark:border-dark-5">{{student.reg_no}}</td>
                                                <td class="border-b dark:border-dark-5">{{student.name}}</td>
                                                <td class="border-b dark:border-dark-5">{{student.facultyName}}</td>
                                                <td class="border-b dark:border-dark-5">{{student.semesterName}}</td>
                                                <td class="border-b dark:border-dark-5"><delete-button  @deleteBtn="removeStudentInTable(inde,student)" ></delete-button></td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>


                            </div>
                            <div class="p-5 border-t flex">
                                <!-- <button type="button" v-show="!editmode" :disabled="isDisabled" @click="cancelDetail" class="button button--sm border block text-dark">Reset Form</button> -->
                                <!-- <button type="button" v-show="editmode" :disabled="isDisabled" @click="cancelUpdate" class="button button--sm border block  text-dark">Cancel Update</button> -->
                                <button type="submit" v-show="!editmode" :disabled="isDisabled"  class="button button--sm border text-white dark:border-dark-5 bg-theme-1 dark:text-gray-300 ml-auto">Add Fee</button>
                                <!-- <button v-show="editmode" type="button" :disabled="isDisabled" @click="updateDetail" class="button button--sm border text-white dark:border-dark-5 bg-theme-1 dark:text-gray-300 ml-auto">Update changes</button> -->
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

        name: "FeeAdd",

        data() {
            return {
                faculties:this.vans.faculties.data,
                batchs:this.vans.batch.data,
                feeHeads:this.vans.fee_heads.data,
                semesters:[],

                submitMode: false,
                editmode:false,
                tableshow:true,
                txtDiplay:"Add Schedule",
                addingTheme:"bg-theme-1",

                check:false,

                form: new Form({
                    batch_id:"",
                    faculty_id:"",
                    semester_id:"",
                    fees:[],
                    students:[]

                }),
                dataHolder:{
                    id:"",
                    fee_head_amount:"",
                    fee_head_title:"",
                    fee_due_date:"",
                },

                // 0757094520
            }
        },

        methods: {
            markAllSturdents(){
                let data = this.form.students;
                let holder = [];
                if (data.length !== 0 && data !== undefined) {
                    data.forEach(el => {
                        el.check = this.check;
                            holder.push(el);
                    });
                    this.form.students = holder;
                } else {
                     this.check = false;
                }
            },
            addDataAndPushToFee(){
                let data = {
                    id : "",
                    fee_due_date:"",
                    fee_head_amount:"",
                    fee_head_title:"",
                }
                if (this.dataHolder.fee_due_date!=="" && this.dataHolder.fee_due_date!==undefined && this.dataHolder.fee_head_amount!=="" && this.dataHolder.fee_head_amount!==undefined) {

                    data.fee_due_date = this.dataHolder.fee_due_date;
                    data.id = this.dataHolder.id;
                    data.fee_head_amount = this.dataHolder.fee_head_amount;
                    data.fee_head_title = this.dataHolder.fee_head_title;
                    this.form.fees.push(data);
                   this.resetDataHolder();
                } else {
                    Swal.fire("Ooohhps!!!..... !", "Fill all required Data!", "error");
                }

            },

            assignDataHolder(){
                let dataId = event.target.value;
                let fee = this.feeHeads[dataId];
                this.dataHolder.id = fee.id;
                this.dataHolder.fee_head_amount = fee.fee_head_amount;
                this.dataHolder.fee_head_title = fee.fee_head_title;
            },
            assignDataandPushToFee(inde){
                let dataId = event.target.value;
                let fee = {};
                this.feeHeads.forEach(element => {
                    if (element.id == dataId) {
                        fee=element;
                        return;
                    }
                });
                this.form.fees[inde].id = fee.id;
                this.form.fees[inde].fee_head_title = fee.fee_head_title;
                this.form.fees[inde].fee_head_amount = fee.fee_head_amount;
            },

            loadSemisterFromFaculty(){
                this.form.semester_id="";
                this.form.batch_id="";
                this.semesters=[];
                axios.get(`/ajaxs/loadSemisterFromFaculty/${event.target.value}`).then((data)=>{
                    this.semesters = data.data;
                });
            },
            loadStudentFromFacultyAndSemester(){
                this.form.students=[];
                this.form.batch_id="";
                if(this.form.semester_id !=="" && this.form.semester_id !== undefined){
                    axios.get(`/ajaxs/loadStudentFromFacultyAndSemester/${this.form.faculty_id}/${event.target.value}`).then((data)=>{
                        this.form.students = data.data;
                        });
                }
            },
            changeDataBasedOnBatch(){
                if(this.form.batch_id !=="" && this.form.batch_id !== undefined){
                    if(this.form.semester_id !=="" && this.form.semester_id !== undefined){
                        let batch = this.form.batch_id;
                        let data = this.form.students;
                        let holder = [];
                        data.forEach(el => {
                            if (el.batch === batch) {
                                holder.push(el);
                            }
                        });
                        this.form.students = holder;
                    }else{
                        this.form.semester_id="";
                         this.form.batch_id="";
                    }
                }

            },
            removeDataInTable(index =""){
            	console.log('removeDataInTable');
                if (index !=="" && index !==undefined) {
                    this.form.fees.splice(index,1);
                } else {
                    this.resetDataHolder();
                }
            },

            removeStudentInTable(index, student){
                if (index) {
                    this.form.students.splice(index,1);
                }
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
                let data = {
                    id : "",
                    fee_due_date:"",
                    fee_head_title:"",
                    fee_head_amount:""
                }
                if (this.dataHolder.fee_due_date!=="" && this.dataHolder.fee_due_date!==undefined && this.dataHolder.fee_head_amount!=="" && this.dataHolder.fee_head_amount!==undefined) {
                    data.fee_head_title = this.dataHolder.fee_head_title;
                    data.fee_due_date = this.dataHolder.fee_due_date;
                    data.id = this.dataHolder.id;
                    data.fee_head_amount = this.dataHolder.fee_head_amount;
                    this.form.fees.push(data);
                   this.resetDataHolder();
                }
                if (this.form.students.length !== 0 && this.form.fees.length !== 0 && this.form.students.length !== undefined && this.form.fees.length !== undefined) {
                    this.$Progress.start();
                    this.form
                        .post(`/accountant/${this.urls}`)
                        .then((data) => {
                            if(data.data === false){
                                this.cancelUpdate();
                                Toast.fire({
                                    icon: "success",
                                    title: `${this.pagetitle} created successfully`
                                });
                            }
                             this.form.reset();
                            // this.angs.push(data.data);

                            this.$Progress.finish();
                        })
                        .catch(() => {
                            Toast.fire({
                                icon: "error",
                                title: `${this.pagetitle} did not created`
                            });
                        });
                }else{
                    Swal.fire("Ooohhps!!!..... !", "Fill all required Data!", "error");
                }
            },

            resetDataHolder(){
                this.dataHolder.id = "";
                this.dataHolder.fee_head_amount = "";
                this.dataHolder.fee_head_title = "";
                this.dataHolder.label = "";
                this.dataHolder.fee_due_date ="";
            },





        },

        computed: {
          isDisabled() {
            if (!this.form.semester_id ||  !this.form.faculty_id) {
              return !this.submitMode;
            }
          },
          isToDelete() {
            if (this.$page.user.role === "superadministrator") {
              return !this.optionValue.delete;
            }
            return this.optionValue.delete;
          },


        //   findingLength(){
        //       return this.angs.length;
        //   },
        //   dataDisplaying(){
        //       return this.angs.slice(this.initNo,this.currentNo);
        //   },


        },




        created(){



        }

}
</script>

<style lang="stylus" scoped>

</style>
