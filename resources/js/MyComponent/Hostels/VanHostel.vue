<template>
    <div>
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <h2 class="text-lg font-medium mr-auto">
                {{pagetitle}}
            </h2>
        </div>

        <hostel-header :headerDetail="headerDetail"></hostel-header>

        <div class="grid grid-cols-1 gap-1">
            <!-- BEGIN: Daily Sales -->
            <div class="intro-y box lg:mt-5">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">No</th>
                            <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap"> Name </th>
                            <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Types</th>
                            <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Warden</th>
                            <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap"> Total Room </th>
                            <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Total Beds</th>
                            <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="hover:bg-gray-200" v-for="(van,index) in hostels" style="cursor: pointer;" :key="index" >
                            <td class="border" >{{index+1 }}</td>
                            <td class="border" > <inertia-link :href="`${urls}/${van.id}`">{{ van.name }}</inertia-link></td>
                            <td class="border" >{{ van.type }}</td>
                            <td class="border">{{ van.staff }}</td>
                            <td class="border" >{{ van.roomsCount }}</td>
                            <td class="border" >{{ van.bedsCount }}</td>
                            <td class="border flex item-center text-center">
                                <add-link @addlink="addDataToForm(index,van.id)"></add-link>
                                <show-link :href="`${urls}/${van.id}`"></show-link>
                                <edit-link @editlink="editFunction(index,van)"></edit-link>
                                <delete-link @deletelink="deleteFunction(index,van.id)" ></delete-link>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- END: Daily Sales -->
        </div>
        <modal name="adding-hostel" height="auto" width="78%">
             <add-hostel :van="editvan" :roomtypes="roomtypes" :staffs="staffs" :urls="urls" :pagetitle="pagetitle"></add-hostel>
         </modal>

        <modal name="adding-hostel-room" height="auto" class=" overflow-y-auto show" id="header-footer-modal-preview" style="margin-top: 0px; margin-left: 0px; padding-left: 0px; z-index: 53;">
                <div class="modal__content">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Add Rooms
                        </h2>
                        <button @click="$modal.hide('adding-hostel-room')" class="button border items-center text-gray-700 dark:border-dark-5 dark:text-gray-300 hidden sm:flex"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file w-4 h-4 mr-2"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> Close</button>

                    </div>
                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-12 sm:col-span-6">
                            <label>From</label>
                            <input type="number" v-model="form.start" class="input w-full border mt-2 flex-1" placeholder="Room Start Number">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label>To</label>
                            <input type="number" v-model="form.end" class="input w-full border mt-2 flex-1" placeholder="Room End Number">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label>Room Type</label>
                            <select class="input w-full border" v-model="form.room_type" required>
                                <option value="" selected>Room Type</option>
                                <option v-for="(roomtype,ind) in roomtypes" :key="ind" :value="roomtype.id">{{ roomtype.title }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                        <button type="button" @click="$modal.hide('adding-hostel-room')" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button>
                        <button type="button" @click="addRoomHostelsData" class="button w-20 bg-theme-1 text-white">Send</button>
                    </div>
                </div>

            </modal>

    </div>
</template>

<script>
    import ShowLink from "@/Buttons/ShowLink";
    import ShowButton from "@/Buttons/ShowButton";
    import TotalButton from '@/Reusable/TotalButton';
    import AddHostel from '@/MyComponent/Hostels/Modals/AddHostel';
    import HostelHeader from "@/Pages/Hostels/Reusable/Header";
    import DeleteLink from "@/Buttons/DeleteLink";
    import AddLink from "@/Buttons/AddLink";
    import EditLink from "@/Buttons/EditLink";

    export default {
        props:['vans','urls','pagetitle'],
        name: "VanHostel",
        components: {
            EditLink,
            AddLink,
            ShowButton,
            TotalButton,
            AddHostel,
            ShowLink,
            HostelHeader,
            DeleteLink,
        },

        data(){
            return {
                staffs:this.vans.staff.data,
                roomtypes:this.vans.roomtypes.data,
                hostels:this.vans.hostels.data,
                editvan:{},
                headerDetail:{
                    left:[
                        {
                            type:"modal",
                            name:"Add Hostel",
                            modalink:"adding-hostel",
                        },
                    ],


                    right:[
                        {
                            type:"links",
                            name:"Rooms Type",
                            modalink:"/manage/roomTypes",
                        },

                    ]
                },

                form:new Form({
                    hostel_id:"",
                    start : "",
                    room_type : "",
                    end:"",
                }),

                indexIdH:Number,


            }
        },

        methods:{

            deleteFunction(index,id) {
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
                        axios.delete(`${this.urls}/${id}`)
                            .then(() => {
                                this.hostels.splice(index,1);
                                Swal.fire("Deleted!", `${this.pagetitle} with  its Room and Bed has been deleted.`, "success");

                            }).catch((e) => {
                            Swal.fire("Something Wrong Happened !", `${e.message}`, "error");
                        });
                    }else{

                    }
                });
            },
            editFunction(index, van){
                this.indexIdH = index;
                this.editvan = van;
                this.$modal.show('adding-hostel');
            },
            addDataToForm(index,id){
                this.indexIdH = index;
                this.form.hostel_id = id;
                this.$modal.show('adding-hostel-room')
            },

            addRoomHostelsData(){
                if (eval(this.form.end) < eval(this.form.start)){
                    Swal.fire(
                        "Can not Process",
                        "Starting Number is Greater than the Ending Number",
                        "error",
                    );
                }else{
                    this.$Progress.start();
                    this.form
                        .post(`/hostel/rooms`)
                        .then((data) => {
                            this.hostels.splice(this.indexIdH,1,data.data);
                            Toast.fire({
                                icon: "success",
                                title: `${this.pagetitle} created Successfully`
                            });
                            this.form.reset();
                            this.$modal.hide('adding-hostel-room');
                            this.$Progress.finish();

                        })
                        .catch((e) => {
                            Toast.fire({
                                icon: "error",
                                title: `${e.message} did not created Successfully`
                            });
                        });

                }
            },


        },

        created() {
            appBus.listen('hostels', (data)=> {
                this.editvan = {};
                this.indexIdH = "";
                this.hostels.push(data);
                this.$modal.hide('adding-hostel');
            })
            appBus.listen('hostels-update', (data)=>{
                this.editvan = {};
                this.indexIdH = "";
                this.hostels.splice(this.indexIdH,1,data);
                this.$modal.hide('adding-hostel');
            })
        }
    }
</script>

<style scoped>

</style>
