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
            <div class="col-span-12 lg:col-span-6 xxl:col-span-6 flex lg:block flex-col-reverse">


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
                            <!--
                            <div class="mt-3">
                                <label>Status</label>
                                <select v-model="form.status" class="input w-full border mt-2" placeholder="Select Status">
                                    <option value="" selected> Select Status</option>
                                    <option value="active"> Active</option>
                                    <option value="in-active"> Not Active</option>
                                </select>
                            </div>
                            -->
                             <div class="w-full border-t border-gray-200 dark:border-dark-5 border-dashed"></div>
                            <div class="w-full border-t border-gray-200 dark:border-dark-5 mt-5"></div>
                            

                            <div class="overflow-x-auto">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Name</th>
                                            <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">From(%)</th>
                                            <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">To(%) </th>
                                            <th class="border border-b-2 dark:border-dark-5  whitespace-no-wrap">Point</th>
                                            <th class="border border-b-2 dark:border-dark-5  whitespace-no-wrap">Remark</th>
                                            <th class="border border-b-2 dark:border-dark-5  whitespace-no-wrap">
                                                <button class="button bg-theme-1 text-white" @click="performFunction"> <span class="w-5 h-5 flex items-center justify-center"> <i  class="feather icon-plus"></i> Add </span> </button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="hover:bg-gray-200" v-for="(van,index) in form.scales" :key="index">
                                            <td class="border" ><input type="text" v-model="form.scales[index].name" class="input w-full rounded-full border mt-1" placeholder="A"></td>
                                            <td class="border" ><input type="text" v-model="form.scales[index].percentage_from" class="input w-full rounded-full border mt-1" placeholder="A"></td>
                                            <td class="border" ><input type="text" v-model="form.scales[index].percentage_to" class="input w-full rounded-full border mt-1" placeholder="A"></td>
                                            <td class="border" ><input type="text" v-model="form.scales[index].grade_point" class="input w-full rounded-full border mt-1" placeholder="A"></td>
                                            <td class="border" ><textarea  v-model="form.scales[index].description" class="input w-full border row-3"/></td>
                                            <td class="border ">
                                                <delete-button  @deleteBtn="removeScale(index,van.id)" ></delete-button>
                                            </td>
                                        </tr>
                                        <tr class="hover:bg-gray-200" v-show="addmode">
                                            <td class="border" ><input type="text" v-model="tempData.name" class="input w-full rounded-full border " placeholder="A"></td>
                                            <td class="border" ><input type="number" v-model="tempData.percentage_from" class="input w-full rounded-full border " placeholder="0"></td>
                                            <td class="border" ><input type="number" v-model="tempData.percentage_to" class="input w-full rounded-full border " placeholder="100"></td>
                                            <td class="border" ><input type="number" v-model="tempData.grade_point" class="input w-full rounded-full border " placeholder="1"></td>
                                            <td class="border" ><textarea  v-model="tempData.description" class="input w-full border" ></textarea></td>
                                            <td class="border ">
                                                <a class="items-center text-theme-6" @click="cancelScale()">
                                                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
                <!-- BEGIN: Daily Sales -->
                <div class="intro-y box lg:mt-5">
                    <div class="overflow-x-auto">
                     <table class="table">
                         <thead>
                             <tr>
                                 <th class="border border-b-2 dark:border-dark-2 whitespace-no-wrap">No</th>
                                 <th class="border border-b-2 dark:border-dark-2 whitespace-no-wrap">{{ pagetitle }}</th>
                                 <th class="border border-b-2 dark:border-dark-2 whitespace-no-wrap">Grading</th>
                                 <th class="border border-b-2 dark:border-dark-2 whitespace-no-wrap">Status </th>
                                 <th class="border border-b-2 dark:border-dark-2  whitespace-no-wrap">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr class="hover:bg-gray-200" v-for="(van,index) in angs" :key="index">
                                 <td class="border" >{{index+1 }}</td>
                                 <td class="border" v-if="van.title" >{{ van.title }}</td> 
                                 <td class="border" v-else >no Value</td>
                                 <td class="border" v-if="van.grading_scale">
                                    <span v-for="(grade , inde) in van.grading_scale" :key="inde">
                                        <i class="flex items-center text-dark">{{grade.name}} - {{grade.percentage_from}} to {{ grade.percentage_to }} %</i> 
                                    </span>
                                 </td>
                                 <td class="border" v-if="van.title">{{ van.status }}</td>
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
        <modal name="superlarge-modal-size-preview" height="auto" width="70%" >
            <div class="modal__content modal__content--xl p-10 text-center">
                <overlap-modal :vans="vans" :urls="urls" :pagetitle="pagetitle" :option="option"></overlap-modal>
            </div>
         </modal>


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
                angs : this.vans,
                submitMode: false,
                statusShow:true,
                editmode:false,
                addmode:false,

                optionValue:this.option,

                form: new Form({
                    title:"",
                    status:"active",
                    scales:[]
                }),
                tempData:{
                    id:"",
                    name:"",
                    percentage_from:"",
                    percentage_to:"",
                    grade_point:"",
                    description:""
                },
                dataHolder:{},
                indexValue:Number,
                id:Number,
            }
        },
 
        methods: {
            openModal(){
                this.$modal.show('superlarge-modal-size-preview');
            },
           

            performFunction(){
                if(this.addmode===false){
                    this.addmode = true;
                }else if(this.tempData.name ==="" || this.tempData.percentage_from ==="" || this.tempData.percentage_to ===""){
                    Swal.fire("Something Went Wrong!", "Please Fill all required Data!", "error");
                }else if(this.tempData.name !=="" && this.tempData.percentage_from !=="" && this.tempData.percentage_to !=="" ){
                    this.form.scales.push(this.tempData);
                    this.tempData={id:"",name:"",percentage_from:"",percentage_to:"",grade_point:"",description:""};
                }else{
                    Swal.fire("Something Went Wrong!", "Please Try Again Later!", "error");
                }
                
            },
            cancelScale(){
                this.addmode = false;
                this.tempData={id:"",name:"",percentage_from:"",percentage_to:"",grade_point:"",description:""};
            },

            removeScale(index,id){ 
                if(id===undefined || id==="" || id=== null){
                    
                }else{
                    axios.delete(`/manage/gradingScale/${id}`).then((data) => { this.angs.splice(index,1);});
                }
                this.form.scales.splice(index,1)
            },

            cancelDetail(){
              this.cancelUpdate();
              Toast.fire({ icon: "success", title: "reseted successfully" });
            },
            saveDetail(){
                if(this.tempData.name !=="" && this.tempData.percentage_from !=="" && this.tempData.percentage_to !=="" ){
                    this.form.scales.push(this.tempData);
                }
                this.cancelScale()
               
                if (this.form.scales === undefined || this.form.scales.length == 0) {
                    Swal.fire("Sorry I Can Not Process Data!", "Add atleast 1 grading Scale", "error");
                }else{
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
                }
            },
            updateDetail(){
                if(this.tempData.name !=="" && this.tempData.percentage_from !=="" && this.tempData.percentage_to !=="" ){
                    this.form.scales.push(this.tempData);
                } this.cancelScale()
                this.$Progress.start();
                // if(this.form.title === this.dataHolder.title && this.form.status === this.dataHolder.status && JSON.stringify(this.form.scales)==JSON.stringify(this.dataHolder.grading_scale)){
                    
                //     this.$Progress.fail();
                //     Swal.fire("Something Wrong Happened !", "Nothing Changed Please try Again !", "error"); 
                // } else {}
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

            //60201608698

            actionEdit(index,van){
              this.editmode = true;
              this.indexValue= index;
              this.dataHolder= van;
              this.id= van.id;
                this.form.reset();
                this.form.fill(van);
                if(van.grading_scale){
                    this.form.scales=van.grading_scale;
                }
                
            }

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
