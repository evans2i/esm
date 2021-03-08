<template>

            <div >
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto flex "> Add Hostel
                    </h2>
                    <button @click="$modal.hide('adding-hostel')" class="button border items-center text-gray-700 dark:border-dark-5 dark:text-gray-300 hidden flex sm:flex" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </button>
                </div>
                <div class="col-span-12 sm:col-span-12">
                    <div class="preview">
                        <div class="intro-y box px-5 pt-2 mt-1">
                            <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                                <div class="mt-2 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                    <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Name</div>
                                    <input type="text" v-model="form.name" class="input pl-24 w-full border" placeholder="Name">
                                </div>

                                <div class="mt-2 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                    <select class="input w-full border" v-model="form.type" required>
                                        <option value="" selected>Hostel Type</option>
                                        <option value="Boys" >Boys</option>
                                        <option value="Girls" >Girls</option>
                                        <option value="Both" >Both</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="w-full border-t border-bold border-gray-200 dark:border-dark-5 border-dashed" ></div>

                        <div class="intro-y box px-5 pt-0 mt-1">
                            <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                                <div class="mt-2 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                    <select class="input w-full border" v-model="form.room_type" required>
                                        <option value="" selected>Room Type</option>
                                        <option v-for="(roomtype,ind) in roomtypes" :key="ind" :value="roomtype.id">{{ roomtype.title }}</option>

                                    </select>
                                </div>

                                <div class="mt-2 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                    <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Rooms/Cubes</div>
                                    <input type="number" v-model="form.roomsCount" class="input pl-24 w-full border" placeholder="Rooms/Cubes">
                                </div>

                            </div>
                        </div>
                        <div class="intro-y box px-5">
                            <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">

                                <div class="mt-2 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                    <select class="input w-full border" v-model="form.staff_id">
                                        <option value="" selected>Select Warden</option>
                                        <option v-for="(staff,ind) in staffs" :key="ind" :value="staff.id">{{ staff.label }}</option>
                                    </select>
                                </div>

                                <div class="mt-2 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                    <div class="absolute rounded-l w-24 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Warden Contact</div>
                                    <input type="text" v-model="form.warden_contact" class="input pl-24 w-full border" placeholder="warden contact">
                                </div>

                                <div class="mt-2 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                    <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Address</div>
                                    <input type="text" v-model="form.address" class="input pl-24 w-full border" placeholder="Hostel Address">
                                </div>
                            </div>
                        </div>
                        <div class="intro-y box px-5 ">
                            <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                                <div class="mt-2 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                    <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Contact Detail</div>
                                    <textarea type="text" v-model="form.contact_detail" class="input pl-24 w-full border" placeholder="Contact Detail"/>

                                </div>
                                <div class="mt-2 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                    <div class="absolute rounded-l w-26 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Description</div>
                                    <textarea type="text" v-model="form.description" class="input pl-28 w-full border" placeholder="Description"/>
                                </div>
                            </div>
                        </div>
                        <div class="w-full border-t border-bold border-gray-200 dark:border-dark-5 border-dashed" ></div>

                    </div>
                </div>

                <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                    <button :disabled="isDisabled" type="button" @click="submitFunction">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-navigation mx-auto"><polygon points="3 11 22 2 13 21 11 13 3 11"></polygon></svg>
                    </button>
                </div>
            </div>




</template>

<script >
    export default{
        props:['van','roomtypes','staffs','urls','pagetitle'],
        data() {
            return {
                submitMode:false,
                form: new Form({
                    id:"",
                    name:"",
                    type:"",
                    address:"",
                    room_type:"",
                    contact_detail:"",
                    warden_contact:"",
                    staff_id:"",
                    description:"",
                    roomsCount:"",
                }),
            }
        },
        methods:{
            submitFunction(){
                this.$Progress.start();
                if(this.form.id == undefined || this.form.id == ""){
                        this.form
                        .post(`${this.urls}`)
                        .then((data) => {
                            appBus.fire('hostels',data.data);
                            Toast.fire({
                                icon: "success",
                                title: `${this.pagetitle} created successfully`
                            });
                            this.form.reset();
                            this.$Progress.finish();
                        })
                        .catch((e) => {
                            Swal.fire("Something Wrong Happened !", `${e.message}!`, "error");
                        });
                }else{
                    this.form.put(`${this.urls}/${this.form.id}`)
                        .then((data) => {
                            appBus.fire('hostels-update',data.data);
                            Toast.fire({
                                icon: "success",
                                title: `${this.pagetitle} created successfully`
                            });
                            this.form.reset();
                            this.$Progress.finish();
                        })
                        .catch((e) => {
                            Swal.fire("Something Wrong Happened !", `${e.message}!`, "error");
                        });
                    
                }

            },
        },
        computed: {
            isDisabled() {
                if (!this.form.name ||  !this.form.type || !this.form.staff_id || !this.form.roomsCount) {
                    return !this.submitMode;
                }
            },
        },

        created(){
            this.form.fill(this.van);
        }

    }
</script>

<style scoped>

</style>
