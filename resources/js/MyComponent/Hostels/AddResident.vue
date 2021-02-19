<template>
    <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
        <div class="intro-y box lg:mt-5 col-span-12">
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
            </div>
            <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                    <label>Beds</label>
                    <select class="input w-full border" v-model="form.bed_id" @change="selectBeds()">
                        <option value="" disabled selected>Select Beds</option>
                        <option v-for="bed in beds" :value="bed.id" :key="bed.id">{{bed.name}}</option>
                    </select>
                </div>
                <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                    <label>Student </label>
                    <v-select class="input w-full border" label="name" :filterable="false" v-model="form.student_id" :options="students" @search="onSearch" :reduce="student => student.id">
                        <template slot="no-options">
                            type to search Student...
                        </template>
                        <template slot="option" slot-scope="option">
                            <div class="d-center">
                                {{ option.reg_no }}-{{ option.name }}
                            </div>
                        </template>

                    </v-select>
                </div>
            </div>
            <div class="text-right mt-5">
                <button type="button" @click="form.reset()" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1">Cancel</button>
                <button type="button" @click="addingFormData" class="button w-24 bg-theme-1 text-white">Assign Bed</button>
            </div>
        </div>

    </div>
</template>

<script>
    import AddButton from "@/Buttons/AddButton";
    export default {
        name: "AddResident",
        components: {AddButton},
        props: {
            hostels: {
                type: Array,
            },
            adddata: {
                type: Function,
                required:true,
            },
        },
        data() {
            return {
                rooms:[],
                beds:[],
                students:[],
                form:new Form({
                    hostel_id:"",
                    room_id:"",
                    bed_id:"",
                    student_id:"",
                }),
                bedIndex:Number,

                isSubmit:false,
            }
        },
        methods: {
            selectHostels() {
                axios.get(`/hostel/findRooms/${this.form.hostel_id}`)
                    .then((data)=>{
                        this.rooms = data.data;
                    })
            },
            selectRooms() {
                axios.get(`/hostel/findBeds/${this.form.hostel_id}/${this.form.room_id}`)
                    .then((data)=>{ this.beds = data.data; })
            },
            selectBeds() {
                let arry= this.beds;
                arry.forEach((ele,index)=>{
                    if (ele.id == this.form.bed_id){
                        this.bedIndex = index;

                    }
                })
            },

            addingFormData(){

                if (!this.form.bed_id || !this.form.student_id){
                    Swal.fire("Ooooooh","Fill all Required data, Bed and Student" ,"error")
                }else{
                    this.adddata(this.form)
                }


            },

            onSearch(search, loading) {
                if(search.length) {
                    loading(true);
                    this.search(loading, search, this);
                }
            },
            search: _.debounce((loading, search, vm) => {
                axios.get(`/users/students/findStudentDetails/${search}`)
                    .then(res => {
                        vm.students = res.data;
                        loading(false);
                    });
            }, 350),

        },

        computed: {
            isDisabled() {
                if (!this.form.bed_id || !this.form.student_id){
                    return !this.isSubmit;
                }else{
                    return this.isSubmit;
                }
            }
        },

        created() {
            appBus.listen("remove-bed",()=>{this.beds.splice(this.bedIndex,1); this.form.student_id = ""});
        }
    }
</script>

<style scoped>

</style>
