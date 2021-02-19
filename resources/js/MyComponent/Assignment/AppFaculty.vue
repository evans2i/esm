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
                                Assign CLasses To Staffs
                            </h1>
                        </div>
                    </div>
                    <div class="p-5" id="input">
                        <div class="preview">
                             <div class="w-full border-t border-gray-200 dark:border-dark-5 mt-1 border-dashed"></div>
                             <label for="staff_if" class=""> Select Class</label>
                            <v-select v-model="form.faculty_id" :options="faculties" :reduce="faculty => faculty.id" :filterable="true" class="input w-full border mt-2" ></v-select>

                            <div class="w-full border-t border-gray-200 dark:border-dark-5 mt-1 border-dashed"></div>
                            <div class="w-full border-t border-gray-200 dark:border-dark-5 mt-2"></div>
                            <label for="staff_if" class=""> Select Year</label>
                            <v-select v-model="form.year_id" :options="years" :reduce="year => year.id" :filterable="true" class="input w-full border mt-2" ></v-select>

                            <div class="w-full border-t border-gray-200 dark:border-dark-5 mt-1 border-dashed"></div>
                            <div class="w-full border-t border-gray-200 dark:border-dark-5 mt-2"> </div>
                            <label for="staff_if" class=""> Select Staff</label>
                            <v-select v-model="form.staff_id" :options="staffs" :reduce="staff => staff.id" :filterable="true" class="input w-full border mt-2" ></v-select>
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
                                 <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Classes</th>
                                 <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Year</th>
                                 <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Staff</th>
                                 <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Status </th>
                                 <th class="border border-b-2 dark:border-dark-5  whitespace-no-wrap">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr class="hover:bg-gray-200" v-for="(van,index) in angs" :key="index">
                                 <td class="border" >{{index+1 }}</td>
                                 <td class="border" v-if="van.faculty" >{{ van.faculty_code }}-{{  van.faculty  }}</td>
                                 <td class="border" v-else >no Value</td>
                                 <td class="border" v-if="van.year">{{ van.year }}</td>
                                 <td class="border" v-else >no Year</td>
                                 <td class="border" v-if="van.staff">{{ van.staff }}</td>
                                 <td class="border" v-else >no Staff</td>
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


    export default {
        props:['vans','urls','pagetitle','option'],
        components: {
            JetButton,
            BtnButton,
            DeleteButton,
            EditButton,

        },
        name: "AppFaculty",
        data() {
            return {
                angs : this.vans.assign.data,
                staffs:this.vans.staff.data,
                years:this.vans.year.data,
                faculties:this.vans.faculty.data,

                submitMode: false,
                statusShow:true,
                editmode:false,
                addmode:false,

                checkValue:false,

                optionValue:this.option,

                form: new Form({
                    faculty_id:"",
                    year_id:"",
                    staff_id:"",
                    status:"active",
                }),

                indexValue:Number,
                id:Number,
            }
        },

        methods: {
            openModal(){
                this.$modal.show('superlarge-modal-size-preview');
            },



            cancelDetail(){
              this.cancelUpdate();
              Toast.fire({ icon: "success", title: "reseted successfully" });
            },
            saveDetail(){
                if (this.form.facult_id === "" || this.form.staff_id === "" || this.form.year_id === "") {
                    Swal.fire("Sorry I Can Not Process Data!", "Please Fill all Required Data", "error");
                }else{
                    this.$Progress.start();
                    this.form.post(`/manage/${this.urls}`)
                        .then((data) => {
                            let arr = this.angs;
                            let tr = "";
                            arr.forEach((index,element) => {
                                if(element.id === data.data[0].id){tr = index; }
                            });
                            if(data.data[1] === "replace"){
                                this.angs.splice(tr, 1, data.data[0]);
                            }else{
                                this.angs.push(data.data[0]);
                            }

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
              this.id= van.id;
                this.form.reset();
                this.form.fill(van);

            },


        },

        computed: {
            isDisabled() {
                if (!this.form.faculty_id && !this.form.staff_id && !this.form.year_id ) {
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

        },

        mounted () {

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
