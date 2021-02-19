<template>
    <div>
       <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                {{pagetitle}}
            </h2>
        </div>
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: Profile Menu -->
            <div class="col-span-12 lg:col-span-4 xxl:col-span-4 flex lg:block flex-col-reverse">


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
                            <div class="mt-3">
                                <div class="relative">
                                    <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Title</div>
                                    <input type="text" v-model="form.title" class="input pl-12 w-full border col-span-4" placeholder="Subject Code">
                                </div>
                            </div>

                            <div class="mt-3">
                                <div class="relative">
                                    <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Code</div>
                                    <input type="text" v-model="form.code" @keyup="changeCode" class="input pl-12 w-full border col-span-4" placeholder="Title">
                                </div>
                            </div>

                            <div class="mt-3 items-center w-full">
                                <div class="flex flex-col sm:flex-row items-center w-full divide-x divide-light-blue-400">
                                    <div class="sm:mt-4 mt-4  px-1 inline-block ring-2">
                                        <label class="text-center mr-auto">Class Type</label>
                                        <select class="input relative w-full input--sm border col-span-4" v-model="form.class_type" >
                                            <option value="Theory" selected>Theory</option>
                                            <option value="Practical">Prctical</option>
                                            <option value="Both">Both</option>
                                        </select>
                                    </div>
                                    <div class="sm:mt-4 mt-4   px-1 inline-block ring-2">
                                    <label class="text-center mr-auto">Subject Type</label>
                                        <select class="input relative w-full input--sm border col-span-4" v-model="form.sub_type">
                                            <option value="Compulsory" selected>Compulsory</option>
                                            <option value="Option">Option</option>
                                        </select>
                                    </div>
                                    <div class="sm:mt-4 mt-4   px-1 inline-block ring-2">
                                    <label class="text-center mr-auto">Status</label>
                                        <select class="input relative w-full input--sm border col-span-4" v-model="form.status">
                                            <option value="active" selected> Active</option>
                                            <option value="in-active"> Not Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="mt-3 grid grid-cols-12">
                                <div class="mt-2 col-span-12 lg:col-span-3 xxl:col-span-3">
                                <label>Staff</label>
                                </div>
                                <div class="mt-2 col-span-12 lg:col-span-9 xxl:col-span-9">
                                        <select  class="input w-full border col-span-4" v-model="form.staff_id">
                                            <option value="" selected> Select Teacher</option>
                                             <option v-for="(staff,index) in staffs"  :value="staff.id" :key="index"> {{ staff.first_name }} {{staff.last_name}}</option>
                                        </select>

                                </div>
                            </div>
                            <div class="mt-3">
                                <label>Theory</label>
                                <div class="sm:grid grid-cols-2 gap-2">
                                    <div class="relative mt-2">
                                        <div class="absolute top-0 left-0 rounded-l w-50 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Full-Mark(T)</div>
                                        <div class="pl-3">
                                            <input type="text" v-model="form.full_mark_theory" class="input pl-20 w-full border border-rounded col-span-4">
                                        </div>
                                    </div>
                                    <div class="relative mt-2">
                                        <div class="absolute top-0 left-0 rounded-l w-50 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Pass-Mark(T)</div>
                                        <div class="pl-3">
                                            <input type="text" v-model="form.pass_mark_theory" class="input pl-20 w-full border border-rounded col-span-4">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <label>Practicle</label>
                                <div class="sm:grid grid-cols-2 gap-2">
                                    <div class="relative mt-2">
                                        <div class="absolute top-0 left-0 rounded-l w-50 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Full-Mark(P)</div>
                                        <div class="pl-3">
                                            <input type="text" v-model="form.full_mark_practical" class="input pl-20 w-full border border-rounded col-span-4" >
                                        </div>
                                    </div>
                                    <div class="relative mt-2">
                                        <div class="absolute top-0 left-0 rounded-l w-50 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Pass-Mark(P)</div>
                                        <div class="pl-3">
                                            <input type="text" v-model="form.pass_mark_practical" class="input pl-20 w-full border border-rounded col-span-4" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="relative">
                                    <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Credit Hour</div>
                                    <input type="text" v-model="form.credit_hour" class="input pl-24 w-full border col-span-4" placeholder="Credit Hour">
                                </div>
                            </div>

                            <div class="mt-3">
                                <div class="relative">
                                    <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Note</div>
                                    <input type="text" v-model="form.description" class="input pl-12 w-full border col-span-4" placeholder="Description">
                                </div>
                            </div>

                             <div class="w-full border-t border-gray-200 dark:border-dark-5 border-dashed"></div>
                            <div class="w-full border-t border-gray-200 dark:border-dark-5 mt-5"></div>
                        </div>


                        <div class="p-5 border-t flex">
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
            <div class="col-span-12 lg:col-span-8 xxl:col-span-8">
                <!-- BEGIN: Daily Sales -->
                <div class="intro-y box lg:mt-5">
                    <div class="overflow-x-auto">
                     <table class="table">
                         <thead>
                             <tr>
                                 <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">No</th>
                                 <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">{{ pagetitle }}</th>
                                 <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Status </th>
                                 <th class="border border-b-2 dark:border-dark-5  whitespace-no-wrap">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr class="hover:bg-gray-200" v-for="(van,index) in angs" :key="index">
                                 <td class="border" >{{index+1 }}</td>
                                 <td class="border" v-if="van.title">
                                     <tr class="bg-gray-200 dark:bg-dark-1 ">
                                        <th class="border-b text-center" colspan="3">{{van.title}}</th>
                                    </tr>
                                    <tr >
                                        <th class="border-b">Credit Hour</th>
                                        <th class="border-b">{{ van.credit_hour }}</th>
                                        <th class="border-b">Marks</th>
                                     </tr>

                                        <tr class="bg-gray-200 dark:bg-dark-1 item-center">
                                            <td class="border-b dark:border-dark-5">SUBJECT TYPE</td>
                                            <td class="border-b dark:border-dark-5">{{ van.sub_type }}</td>
                                            <td class="border-b dark:border-dark-5" rowspan="2">
                                                <tr>
                                                    <td class="border-b dark:border-dark-5">FM (T) </td>
                                                    <td class="border-b dark:border-dark-5">{{ van.full_mark_theory}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="border-b dark:border-dark-5">PM (T) </td>
                                                    <td class="border-b dark:border-dark-5">{{ van.pass_mark_theory}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="border-b dark:border-dark-5">FM (P) </td>
                                                    <td class="border-b dark:border-dark-5">{{ van.full_mark_practical}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="border-b dark:border-dark-5">PM (P) </td>
                                                    <td class="border-b dark:border-dark-5">{{ van.pass_mark_practical}}</td>
                                                </tr>
                                            </td>
                                        </tr>
                                        <tr class="bg-gray-200 dark:bg-dark-1">
                                            <td class="border-b dark:border-dark-5">Class TYPE</td>
                                            <td class="border-b dark:border-dark-5">{{ van.class_type }}</td>
                                        
                                        </tr>
                                       
                                        
                                 </td>
                                 <td class="border" v-else >no Value</td>
                                 <td class="border" v-if="van.status">{{ van.status }}</td>
                                 <td class="border" v-else >No Status</td>
                                 <td class="border">
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
        <div class="grid grid-cols-12 gap-6">
        </div>

    </div>
</template>

<script>

    import JetButton from '@/Jetstream/Button'
    import BtnButton from '@/Buttons/BtnButton'
    import OverlapModal from '@/Customers/OverlapModal'

// import 'vue-select/dist/vue-select.css';
    import DeleteButton from '@/Buttons/DeleteButton'
    import EditButton from '@/Buttons/EditButton'

    export default {
        props:['vans','urls','pagetitle','option'],
        components: {
            JetButton,
            BtnButton,
            OverlapModal,
            DeleteButton,
            EditButton
        },
        data() {
            return {
                angs : this.vans['subject'],
                staffs:this.vans['staffs'],
                submitMode: false,
                editmode:false,

                optionValue:this.option,

                form: new Form({
                    title:"",
                    description:"",
                    code:"",
                    class_type:"",
                    sub_type:"",
                    full_mark_theory:"",
                    pass_mark_theory:"",
                    full_mark_practical:"",
                    pass_mark_practical:"",
                    credit_hour:"",
                    staff_id:"",
                    status:"active",
                }),
               
                indexValue:Number,
                id:Number,
            }
        },

        methods: {

            cancelDetail(){
              this.cancelUpdate();
              Toast.fire({ icon: "success", title: "reseted successfully" });
            },
            saveDetail(){
                    this.$Progress.start();
                    this.form
                        .post(`/manage/${this.urls}`)
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
            },
            updateDetail(){
                this.$Progress.start();
                this.form.put(`/manage/${this.urls}/${this.id}`)
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
            cancelUpdate(){
              this.form.reset();
              this.id = null;
              this.indexValue= null;
              this.dataHolder={};
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

            // changeTMarks(){
            //     const totalMarks =  100;
            //     if (this.form.full_mark_theory !== "" && this.form.full_mark_theory !== undefined  ) {
            //         this.form.full_mark_theory  = this.form.full_mark_theory
            //     }
            //     if (this.form.class_type = "both") {
            //        this.form.full_mark_practical = totalMarks-this.form.full_mark_theory
            //     }else {
                    
            //         if (this.form.full_mark_theory < totalMarks) {
            //             this.form.full_mark_theory  = this.form.full_mark_theory
            //         }else{

            //         }
            //     }
                
            // },
            changePMarks(){
                const totalMarks =  100;
            },

            changeCode(){this.form.code = this.form.code.toUpperCase(); }

        },


        computed: {
          isDisabled() {
            if (!this.form.title) {
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

}
</script>

<style lang="stylus" scoped>

</style>
