<template>
    <div class="intro-y box px-5 pt-2 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                <label>Hostels </label>
                <select class="input w-full border" v-model="form.hostel_id" @change="selectHostels()" >
                    <option value="" selected>Select Hostels</option>
                    <option v-for="hostel in hostels" :value="hostel.id" :key="hostel.id" >{{ hostel.name}}</option>
                </select>
            </div>
            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                <label>Rooms </label>
                <select class="input w-full border" v-model="form.room_id" @change="selectRooms()">
                    <option value="" selected>Select Room</option>
                    <option v-for="(room,index) in rooms" :value="room.id" >{{room.name}}</option>
                </select>
            </div>
            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                <label>Beds</label>
                <select class="input w-full border" v-model="form.bed_id" @change="selectBeds()">
                    <option value="" disabled selected>Select Beds</option>
                    <option v-for="bed in beds" :value="bed.id" :key="bed.id">{{bed.name}}</option>
                </select>
            </div>
            <search-button class="mt-6 relative flex-1 flex items-center px-5"  @searchbtn="fetchResident()" ></search-button>
        </div>
    </div>
</template>

<script>
    import SearchButton from "@/Buttons/SearchButton";
    export default {
        props: {
            hostels: {
                type: Array,
            },
            fetch: {
                type: Function,
                required:true
            },
        },
        name: "ResidentSearch",
        components: {
            SearchButton
        },
        data() {
            return {
                rooms:[],
                beds:[],
                form:new Form({
                    hostel_id:"",
                    room_id:"",
                    bed_id:""
                })
            }
        },
        methods: {
            selectHostels() {

                axios.get(`/hostel/findRooms/${this.form.hostel_id}`)
                .then((data)=>{
                    this.rooms = data.data;
                })
                this.form.room_id="";
                this.form.bed_id="";
            },
            selectRooms() {
                this.form.bed_id="";
                let iD = this.form.room_id;
                let roomData = this.rooms;
                console.log(iD);
                roomData.forEach((ele)=>{
                    if (ele.id == iD){
                        this.beds = ele.beds;
                        return;
                    }
                })
            },
            selectBeds() {
                // axios.get(`${this.urls}/${this.form.hostel_id}/${this.form.room_id}/${this.form.bed_id}`)
                //     .then((data)=>{
                //
                // })
            },

            fetchResident(){
                this.fetch(this.form);
            }
        },
    }
</script>

<style scoped>

</style>
