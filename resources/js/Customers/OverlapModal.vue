<template>
    <div>
        
        <h2 class="text-lg font-medium mr-auto">
            Profile Layout
        </h2>
        <button type="button" @click="openModal" class="flex items-center p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md" data-toggle="modal" data-target="#superlarge-modal-size-preview" > <i data-feather="file" class="w-4 h-4 mr-2" ></i> Modal open </button>

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
                                <div class="mt-3">
                                    <label>Title</label>
                                    <input type="text" v-model="form.title" class="input w-full rounded-full border mt-2" placeholder="Title">
                                </div>
                                <div class="mt-3">
                                    <label>Status</label>

                                    <select v-model="form.status" class="input w-full border mt-2" placeholder="Select Status">
                                        <option value="" selected> Select Status</option>
                                        <option value="active"> Active</option>
                                        <option value="in-active"> Not Active</option>
                                    </select>

                                </div>
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
            

            <div class="col-span-12 lg:col-span-6 xxl:col-span-6">
                <div class="intro-y box lg:mt-5">
                    <div class="overflow-x-auto">
                     <table class="table">
                         <thead>
                             <tr>
                                 <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">No</th>
                                 <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">{{ pagetitle }} Title</th>
                                 <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Status </th>
                                 <th class="border border-b-2 dark:border-dark-5  whitespace-no-wrap">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr class="hover:bg-gray-200" v-for="(van,index) in angs" :key="index">
                                 <td class="border" >{{index+1 }}</td>
                                 <td class="border" v-if="van.title" >{{ van.title }}</td> 
                                 <td class="border" v-else >no Value</td>
                                 <td class="border" v-if="van.status">{{ van.status }}</td>
                                 <td class="border" v-else >No Status</td>
                                 <td class="border flex items-center">
                                        <edit-button  @editBtn="actionEdit(index,van)" ></edit-button>
                                        <delete-button  @deleteBtn="actionDelete(index,van.id)" ></delete-button>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
                    
                </div>
            </div>


        </div>
        <modal name="overlapping-modal-preview" height="auto" width="70%" >
            <div class="modal__content modal__content--xl p-10 text-center">
                <modal-crud></modal-crud>
            </div>
         </modal>
    </div>
</template>

<script>

    import JetButton from '@/Jetstream/Button'
    import BtnButton from '@/Buttons/BtnButton'
    import ModalCrud from '@/Customers/ModalCrud'
    import DeleteButton from '@/Buttons/DeleteButton'
    import EditButton from '@/Buttons/EditButton'

    export default {
       props:['vans','urls','pagetitle','option'],
        components: {
            JetButton,
            BtnButton,
            DeleteButton,
            EditButton,
            ModalCrud
        },
        
        data() {
            return {
                angs : this.vans,
                submitMode: false,
                statusShow:true,
                editmode:false,

                form: new Form({
                    title:"",
                    status:"active"
                }),

                dataHolder:{},
                indexValue:Number,
                id:Number,
            }
        },

        methods: {
          openModal(){
             this.$modal.show('overlapping-modal-preview');
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
                if(this.form.title === this.dataHolder.title && this.form.status === this.dataHolder.status ){
                    this.$Progress.fail();
                    Swal.fire("Something Wrong Happened !", "Nothing Changed Please try Again !", "error"); 
                } else {
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

                }
                
            },


            cancelUpdate(){
              this.form.reset();
              this.id = null;
              this.indexValue= null;
              this.dataHolder={};
              this.editmode = false;
            },

            //60201608698

            actionEdit(index,van){
              this.editmode = true;
              this.indexValue= index;
              this.dataHolder= van;
              this.id= van.id;
                this.form.reset();
                this.form.fill(van);
            }
            
        },

        computed: {
          isDisabled() {
            if (!this.form.title) {
              return !this.submitMode;
            }
          }
         
        },
    }
</script>