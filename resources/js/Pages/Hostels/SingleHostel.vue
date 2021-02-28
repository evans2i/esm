<template>
    <app-master>

        <template #header>
            <div class="-intro-x breadcrumb breadcrumb--light mr-auto">
                <a href="" class="">Application</a>
                <i class="feather icon-chevron-right breadcrumb__icon" ></i> <a href="" class="breadcrumb--active">{{pagetitle}}</a>
            </div>
        </template>

        <template #navigation> </template>

        <div class="py-12">

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
                                <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap"> Room Name </th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Types</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Total Beds</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="hover:bg-gray-200" v-for="(van,index) in rooms" style="cursor: pointer;" :key="index" >
                                <td class="border" >{{index+1 }}</td>
                                <td class="border" >{{ van.name }}</td>
                                <td class="border" >{{ van.type }}</td>
                                <td class="border" >{{ van.bedsCount }}</td>
                                <td class="border flex">
                                    <add-button @addbtn="addBedsTakeData(index, van)"></add-button>
                                    <show-link :href="`${urls}/${van.id}`">Shows</show-link>
                                    <delete-button @deleteBtn="deleteButton(index,van.id)">Delete</delete-button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- END: Daily Sales -->
            </div>

            <modal name="adding-hostel-bed" height="auto" class=" overflow-y-auto show" id="header-footer-modal-preview" style="margin-top: 0px; margin-left: 0px; padding-left: 0px; z-index: 53;">
                <div class="modal__content">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Add Beds
                        </h2>
                        <button @click="$modal.hide('adding-hostel-bed')" class="button border items-center text-gray-700 dark:border-dark-5 dark:text-gray-300 hidden sm:flex"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file w-4 h-4 mr-2"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> Close</button>

                    </div>
                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-12 sm:col-span-6">
                            <label>From</label>
                            <input type="number" v-model="beds.start" class="input w-full border mt-2 flex-1" placeholder="Room Start Number">
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label>To</label>
                            <input type="number" v-model="beds.end" class="input w-full border mt-2 flex-1" placeholder="Room End Number">
                        </div>
                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                        <button type="button" @click="$modal.hide('adding-hostel-bed')" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button>
                        <button type="button" @click="addBedData" class="button w-20 bg-theme-1 text-white">Send</button>
                    </div>
                </div>

            </modal>

        </div>
    </app-master>
</template>

<script>
    import ShowLink from "@/Buttons/ShowLink";
    import DeleteButton from "@/Buttons/DeleteButton";
    import EditButton from "@/Buttons/EditButton";
    import AppMaster from '@/Layouts/AppMaster'
    import VanHostel from '@/MyComponent/Hostels/VanHostel'
    import AddButton from "@/Buttons/AddButton";
    import HostelHeader from '@/Pages/Hostels/Reusable/Header'
    export default {
        props:['vans','urls','pagetitle'],
        name: "SingleHostel",
        components: {
            AddButton,
            AppMaster,
            VanHostel,
            DeleteButton,
            ShowLink,
            EditButton,
            HostelHeader
        },

        data() {
            return {
                rooms: this.vans.rooms.data,
                hostels: this.vans.hostel.data,

                beds:new Form({
                    hostel_id:"",
                    room_id:"",
                    start : "",
                    end:"",
                }),

                headerDetail:{
                    left:[
                        // {
                        //     type:"modal",
                        //     name:"Add Rooms",
                        //     modalink:"adding-room",
                        // },
                    ],


                    right:[
                        {
                            type:"links",
                            name:"Hostels",
                            modalink:"/hostel/hostels",
                        },
                        {
                            type:"links",
                            name:"Rooms Type",
                            modalink:"/manage/roomTypes",
                        },

                    ]
                },

                indexId:Number,
            }
        },

        methods: {
            editButton(index,van){

            },
            addBedData(){
                if (eval(this.beds.end) < eval(this.beds.start)){
                    Swal.fire(
                         "Can not Process",
                        "Starting Number is Greater than the Ending Number",
                        "error",
                    );
                }else{
                    this.$Progress.start();
                    this.beds
                        .post(`/hostel/beds`)
                        .then((data) => {
                            this.rooms.splice(this.indexId,1,data.data);
                            Toast.fire({
                                icon: "success",
                                title: `${this.pagetitle} created Successfully`
                            });
                            this.beds.reset();
                            this.$modal.hide('adding-hostel-bed');
                            this.$Progress.finish();

                        })
                        .catch(() => {
                            Toast.fire({
                                icon: "error",
                                title: "Room did not created Successfully"
                            });
                        });

                }
            },
            addBedsTakeData(index,van){
                this.indexId = index;
                this.beds.reset();
                this.beds.hostel_id = van.hostel_id;
                this.beds.room_id = van.id;
                this.$modal.show('adding-hostel-bed');
            },
            deleteButton(index,id) {
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

                                this.rooms.splice(index,1);
                                Swal.fire("Deleted!", `room with its Bed has been deleted.`, "success");

                            }).catch((e) => {
                            Swal.fire("Something Wrong Happened !", `${e.message}`, "error");
                        });
                    }else{

                    }
                });
            }
        },
    }
</script>

<style scoped>

</style>
