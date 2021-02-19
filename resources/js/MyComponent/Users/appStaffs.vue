<template>
    <div>
       <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Profile Layout
            </h2>
            <button type="button" @click="openModal" class="flex items-center p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md" data-toggle="modal" data-target="#superlarge-modal-size-preview" > <i data-feather="file" class="w-4 h-4 mr-2" ></i> Modal open </button>
        </div>
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: Profile Menu -->
            <div class="col-span-12 lg:col-span-5 xxl:col-span-5 flex lg:block flex-col-reverse">


                <!-- BEGIN: Input -->
                <div class="intro-y box">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">

                        <div class="w-full items-center sm:ml-auto mt-3 sm:mt-0">
                            <h1 class="font-bold text-xl  text-center mr-auto">
                                Adding {{pagetitle}}
                            </h1>
                        </div>
                    </div>
                    <div class="p-5" id="input">
                        <div class="preview">
                            <div class="mt-3  relative items-center border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                <div class="absolute rounded-l w-24 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Faculty Name</div>
                                <input type="text" v-model="form.faculty" class="input pl-28 w-full border" placeholder="Faculty Name">
                            </div>

                            <div class="mt-3  relative items-center border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                <div class="absolute rounded-l w-24 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Faculty Code</div>
                                <input type="text" @blur="changeCode" v-model="form.faculty_code" class="input pl-28 w-full border" placeholder="Faculty Code">
                            </div>

                             <div class="w-full border-t border-gray-200 dark:border-dark-5 border-dashed"></div>
                            <div class="w-full border-t border-gray-200 dark:border-dark-5 mt-5"></div>
                            <div class="overflow-x-auto" v-show="showTableNeeded">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">No </th>
                                            <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Semesters</th>
                                            <th class="border border-b-2 dark:border-dark-5  whitespace-no-wrap">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="hover:bg-gray-200" v-for="(van,index) in form.semesters" :key="index">
                                            <td class="border" >{{index + 1}}</td>
                                            <td class="border" >{{form.semesters[index].semester}}</td>
                                            <td class="border ">
                                                <delete-button  @deleteBtn="removeScale(index,van.id)" ></delete-button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="overflow-x-auto">
                                <div class="flex flex-col sm:flex-row mt-2">
                                  
                                </div>
                            </div>
                            <v-select v-model="semesterHolder" :options="semesters" @input="selectedOption" :filterable="true" class="input w-full border mt-2" ></v-select>
                        </div>
                        <div class="p-5 border-t flex mt-2">
                            <button type="button" v-show="!editmode" :disabled="isDisabled" @click="cancelDetail" class="button button--sm block bg-theme-1 text-white">Reset Form</button>
                            <button type="button" v-show="editmode" :disabled="isDisabled" @click="cancelUpdate" class="button button--sm block bg-theme-1 text-white">Cancel Update</button>
                            <button type="button" v-show="!editmode" :disabled="isDisabled" @click="saveDetail" class="button button--sm border text-gray-700 dark:border-dark-5 dark:text-gray-300 ml-auto">Submit</button>
                            <button v-show="editmode" type="button" :disabled="isDisabled" @click="updateDetail" class="button button--sm border text-gray-700 dark:border-dark-5 dark:text-gray-300 ml-auto">Update changes</button>
                        </div>

                    </div>
                </div>
                <!-- END: Input -->


            </div>
            <!-- END: Profile Menu -->
            <div class="col-span-12 lg:col-span-7 xxl:col-span-7">
                <!-- BEGIN: Daily Sales -->
                <div class="intro-y box lg:mt-5">
                    <div class="overflow-x-auto">
                     <table class="table">
                         <thead>
                             <tr>
                                 <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">No</th>
                                 <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">{{ pagetitle }}</th>
                                 <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Semesters</th>
                                 <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Status </th>
                                 <th class="border border-b-2 dark:border-dark-5  whitespace-no-wrap">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr class="hover:bg-gray-200" v-for="(van,index) in angs" :key="index">
                                 <td class="border" >{{index+1 }}</td>
                                 <td class="border" v-if="van.faculty" >{{ van.faculty_code }}-{{  van.faculty  }}</td> 
                                 <td class="border" v-else >no Value</td>
                                 <td class="border" v-if="van.semesters">
                                    <span v-for="(semester , inde) in van.semesters" :key="inde">
                                        <i class="flex items-center text-dark">{{semester.semester}}</i> 
                                    </span>
                                 </td>
                                 <td class="border" v-if="van.status">{{ van.status }}</td>
                                 <td class="border" v-else >No Status</td>
                                 <td class="border flex items-center">
                                        <edit-button v-if="isToEdit"  @editBtn="actionEdit(index,van)" ></edit-button>
                                        <delete-button v-if="isToDelete"  @deleteBtn="actionDelete(index,van.id)" ></delete-button>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                    </div>
                    
                </div>
                <!-- END: Daily Sales -->
            </div>
        </div>


    </div>
</template>

<script>

    import JetButton from '@/Jetstream/Button'
    import BtnButton from '@/Buttons/BtnButton'

// import 'vue-select/dist/vue-select.css';
    import DeleteButton from '@/Buttons/DeleteButton'
    import EditButton from '@/Buttons/EditButton'
import Label from '../Jetstream/Label.vue'

    export default {
        props:['vans','urls','pagetitle','option'],
        components: {
            JetButton,
            BtnButton,
            DeleteButton,
            EditButton,
            Label
        },
        name: "AppClass",
        data() {
            return {
                angs : this.vans,
                submitMode: false,
                statusShow:true,
                editmode:false,
                addmode:false,
                semesters:[],
                semesterHolder:{},
                search: '',
                offset: 0,
                limit: 5,

                checkValue:false,

                optionValue:this.option,

                form: new Form({
                    faculty:"",
                    faculty_code:"",
                    status:"active",
                    semesters:[]
                }),
               
                indexValue:Number,
                id:Number,
            }
        },
 
        methods: {
            openModal(){
                this.$modal.show('superlarge-modal-size-preview');
            },
           


            removeScale(index,id){ 
                this.form.semesters.splice(index,1)
            },

            cancelDetail(){
              this.cancelUpdate();
              Toast.fire({ icon: "success", title: "reseted successfully" });
            },
            saveDetail(){
                if (this.form.semesters === undefined || this.form.semesters.length == 0) {
                    Swal.fire("Sorry I Can Not Process Data!", "Please Fill all Required Data", "error");
                }else{
                    this.$Progress.start();
                    this.form.post(`/manage/${this.urls}`)
                        .then((data) => {
                            this.angs.push(data.data);
                            this.cancelUpdate();
                            Toast.fire({
                                icon: "success",
                                title: `${this.pagetitle} created successfully`
                            });
                            this.$Progress.finish();
                        })
                        .catch(() => {
                            Toast.fire({
                                icon: "error",
                                title: "van did not created successfully"
                            });
                        });
                }
            },
            updateDetail(){
                this.$Progress.start();
                this.form.put(`/manage/${this.urls}/${this.id}`)
                    .then((data) => {
                        this.angs.splice(this.indexValue, 1, data.data);
                        this.cancelUpdate();
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
            cancelUpdate(){
              this.form.reset();
              this.id = null;
              this.semesterHolder={};
              this.editmode = false;
            },
            actionDelete(index,id){

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
                            this.form.delete(`/manage/${this.urls}/${id}`)
                                .then((data) => {
                                    Swal.fire("Deleted!", `${this.pagetitle} has been deleted.`, "success");
                                this.angs.splice(index,1);
                                this.spinning=!this.spinning;

                                }).catch(() => {
                                    Swal.fire("Something Wrong Happened !", "Not Deleted Please try Again !", "error"); 
                                });
                        }else{
                            
                        }
                    });
            },
            actionEdit(index,van){
              this.editmode = true;
              this.indexValue= index;
              this.dataHolder= van;
              this.id= van.id;
                this.form.reset();
                this.form.fill(van);
                if(van.grading_scale){
                    this.form.semesters=van.grading_scale;
                }
            },
            selectedOption(){
                this.form.semesters.push(this.semesterHolder);
                this.semesterHolder = {};
            },
            changeCode(){this.form.faculty_code = this.form.faculty_code.toUpperCase(); },
            getsemisters(){ 
               axios.get(`/ajaxs/semester`).then((data) => { 
                   this.semesters = data.data;
                   });
            },
    
        },

        computed: {
            isDisabled() {
                if (!this.form.faculty && !this.form.code  ) {
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
            showTableNeeded(){
                if (this.form.semesters === undefined || this.form.semesters.length == 0) {
                    return false
                }
                return true
            }
        },

        mounted () {
            this.getsemisters();
        },

}
</script>

<style scoped>
  .pagination {
    display: flex;
    margin: .25rem .25rem 0;
  }
  .pagination button {
    flex-grow: 1;
  }
  .pagination button:hover {
    cursor: pointer;
  }
</style>