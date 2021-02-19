<template>

    <app-master>

        <template #header>
            <div class="-intro-x breadcrumb breadcrumb--light mr-auto">
                <a href="" class="">Application</a>
                <i class="feather icon-chevron-right breadcrumb__icon" ></i> <a href="" class="breadcrumb--active">Dashboard</a>
            </div>
        </template>
        <template #navigation> </template>
        <div class="py-12">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    {{pagetitle}}
                </h2>

            </div>
            <hostel-header :headerDetail="headerDetail"></hostel-header>
            <resident-search v-show="!addview" :hostels="vans.hostels.data" :fetch="fetchResident"></resident-search>

            <div class="grid grid-cols-12" v-show="!addview">
                <!-- END: Profile Menu -->
                <resident-table :compbed="completedBed" :shiftbed="shiftBed" :leavebed="leaveBed" :dlt="deleteData" :angs="angs" :vangs="vangs" :urls="urls"></resident-table>
            </div>

            <div class="grid grid-cols-12" v-show="addview">
                <add-resident :hostels="vans.hostels.data" :adddata="submitData"></add-resident>
            </div>
        </div>

        <modal name="shift-bed" height="auto"  class=" overflow-y-auto show" id="header-footer-modal-preview" style="margin-top: 0px; margin-left: 0px; padding-left: 0px; z-index: 53;">
            <div class="modal__content">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Changing Bed For {{shiftData.student}}
                    </h2>
                    <button @click="$modal.hide('shift-bed')" class="button border items-center text-gray-700 dark:border-dark-5 dark:text-gray-300 hidden sm:flex"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file w-4 h-4 mr-2"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> Close</button>

                </div>
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="col-span-12 sm:col-span-12">
                        <label>Hostels </label>
                        <select class="input w-full border" v-model="shiftform.hostel_id" @change="selectHostels()" >
                            <option value="" selected>Select Hostels</option>
                            <option v-for="hostel in vans.hostels.data" :value="hostel.id" :key="hostel.id" >{{ hostel.name}}</option>
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label>Rooms </label>
                        <select class="input w-full border mt-2 flex-1" v-model="shiftform.room_id" @change="selectRooms()">
                            <option value="" selected>Select Room</option>
                            <option v-for="(room,index) in bedrooms" :value="room.id" >{{room.name}}</option>
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label>Bed</label>
                        <select class="input w-full border mt-2 flex-1" v-model="shiftform.bed_id" >
                            <option value="" disabled selected>Select Beds</option>
                            <option v-for="bed in hostelbeds" :value="bed.id" :key="bed.id">{{bed.name}}</option>
                        </select>

                    </div>
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                    <button type="button" @click="$modal.hide('shift-bed')" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button>
                    <button type="button" :disabled="isDisabled"  @click="shiftingStudentBed(shiftIndex, shiftform.id)" class="button w-20 bg-theme-1 text-white">Send</button>
                </div>
            </div>
        </modal>

    </app-master>


</template>

<script>

    import AppMaster from '@/Layouts/AppMaster'
    import ResidentSearch from "@/Reusable/ResidentSearch";
    import HostelHeader from "@/Pages/Hostels/Reusable/Header";
    import ResidentTable from "@/MyComponent/Hostels/ResidentTable";
    import AddResident from "@/MyComponent/Hostels/AddResident";
    export default {
        props: {
            vans: {
                type: Object,
            },
            pagetitle: {
                type: String,
                default:"Resident",
            },
            urls: {
                type: String,
                default:`/hostel/residents`,
            },
        },
        components: {
            AddResident,
            ResidentTable,
            ResidentSearch,
            AppMaster,
            HostelHeader
        },
        name: "Resident",
        data() {
            return {
                angs:this.vans.residents.data,
                vangs:this.vans.residents.data,
                addview:false,
                headerDetail:{
                    left:[
                        {
                            type:"toggle",
                            name:"Add/View Resident",
                            modalink:this.togglerData,
                        },

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
                bedrooms:[],
                hostelbeds:[],

                shiftIndex:Number,
                shiftData:{},
                shiftId:Number,

                shiftform: new Form({
                    id:Number,
                    hostel_id:"",
                    room_id:"",
                    bed_id:""
                }),
                isSubmit:false,
            }
        },
        methods: {
            fetchResident(data){
                axios.post(`/hostel/findResident`,data).then((res)=>{
                    this.angs = res.data;
                    this.vangs = res.data;
                })
            },
            togglerData(){
                this.addview = !this.addview;
            },
            completedBed(index,id){
                axios.get(`${this.urls}/final/${id}`,data).then((res)=>{
                        this.angs.splice(index,1);
                        this.vangs.splice(index,1);
                })

            },

            shiftBed(index,van){
                this.shiftIndex = index;
                this.shiftData = van;
                this.shiftform.id = van.id;
                this.$modal.show('shift-bed');
            },
            shiftingStudentBed(index,id){
                this.shiftform.put(`${this.urls}/${id}`).then((res)=>{
                    this.angs.splice(index,1,res.data);
                    this.vangs.splice(index,1,res.data);
                    this.shiftform.reset();
                    this.$modal.hide('shift-bed');
                })
            },
            selectHostels() {
                axios.get(`/hostel/findRooms/${this.shiftform.hostel_id}`)
                    .then((data)=>{
                        this.bedrooms = data.data;
                    })
            },
            selectRooms() {
                axios.get(`/hostel/findBeds/${this.shiftform.hostel_id}/${this.shiftform.room_id}`)
                    .then((data)=>{ this.hostelbeds = data.data; })
            },

            leaveBed(index,id){
                axios.get(`${this.urls}/leave/${id}`).then((res)=>{
                    this.angs.splice(index,1,res.data);
                    this.vangs.splice(index,1,res.data);
                })
            },
            deleteData(index,id){
                axios.delete(`${this.urls}/${id}`).then((res)=>{
                    this.angs.splice(index,1);
                    this.vangs.splice(index,1);
                })
            },

            submitData(data){
                axios.post(`${this.urls}`,data).then((res)=>{
                    if (res.data[1].status == false){
                        this.angs.push(res.data[0]);
                        this.vangs.push(res.data[0]);
                        appBus.fire("remove-bed");
                    }else{
                        Swal.fire("Somthing Went Wrong",`${res.data[1].message}`,"warning")
                    }
                    // this.addview = false;
                })
            }
        },
        computed: {
            isDisabled() {
                if (!this.shiftform.bed_id || !this.shiftform.room_id){
                    return !this.isSubmit;
                }else{
                    return this.isSubmit;
                }
            }
        },
    }
</script>

<style scoped>

</style>
