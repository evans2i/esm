<template>
    <div class="intro-y box px-5 pt-2 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
            <div v-if="$role.IsSuperadministrator() || $role.IsAcademic()" class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                <label>Staff </label>
                <select class="input w-full border" v-model="form.staff_id">
                    <option value="" selected>Select Staff</option>
                    <option v-for="staff in staffs" :value="staff.id" :key="staff.id" >{{ staff.label}}</option>
                </select>
            </div>
            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                <label>Faculty</label>
                <select class="input w-full border" v-model="form.faculty_id" @change="selectFaculty()" >
                    <option value="" selected>Select Faculty</option>
                    <option v-for="faculty in faculties" :value="faculty.id" :key="faculty.id" >{{ faculty.faculty}}</option>
                </select>
            </div>
            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                <label>Semester </label>
                <select class="input w-full border" v-model="form.semester_id" @change="selectSemester()">
                    <option value="" selected>Select Semester</option>
                    <option v-for="(semester,index) in semesters" :value="semester.id" >{{semester.semester}}</option>
                </select>
            </div>

            <div v-if="whereto=='adding'" class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                <label>Subject</label>
                <select class="input w-full border" v-model="form.subject_id" @change="fetchingData()">
                    <option value="" disabled selected>Select Subject</option>
                    <option v-for="subject in subjects" :value="subject.id" :key="subject.id">{{subject.label}}</option>
                </select>
            </div>
        </div>

        <div  v-if="whereto=='fetching'" class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
            <div  class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                <label>Year </label>
                <select class="input w-full border" v-model="form.year_id" >
                    <option value="" selected>Select Year</option>
                    <option v-for="year in years" :value="year.id" :key="year.id" >{{ year.title}}</option>
                </select>
            </div>
            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                <label>Subject</label>
                <select class="input w-full border" v-model="form.subject_id">
                    <option value="" disabled selected>Select Subject</option>
                    <option v-for="subject in subjects" :value="subject.id" :key="subject.id">{{subject.label}}</option>
                </select>
            </div>
            <div  class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                <label>Search</label>
                <search-button class="mt-6 relative flex-1 flex items-center px-5"  @searchbtn="fetchingData()" ></search-button>
            </div>

        </div>

    </div>
</template>

<script>
    import SearchButton from "@/Buttons/SearchButton";
    export default {
        props: {
            faculties: {
                type: Array,
                required:true
            },
            years: {
                type: Array,
                required:true
            },
            staffs: {
                type: Array,
                required:true
            },
            fetch: {
                type: Function,
                required:true
            },
            urls: {
                type: String,
                required:true
            },
            whereto:{
                type: String,
                required:true
            }
        },
        name: "FetchAssignment",
        components: {
            SearchButton
        },
        data() {
            return {
                semesters:[],
                subjects:[],
                form:{
                    staff_id:"",
                    year_id:"",
                    faculty_id:"",
                    semester_id:"",
                    subject_id:""
                },
            }
        },
        methods: {
            selectFaculty() {
                axios.get(`/ajaxs/loadSemisterFromFaculty/${this.form.faculty_id}`)
                    .then((data)=>{
                        this.semesters = data.data;
                    })
                this.form.semester_id="";
                this.form.subject_id="";
            },
            selectSemester() {
                if(this.form.staff_id){
                    axios.get(`/assignment/loadSubjectForStaff/${this.form.staff_id}/${this.form.semester_id}`)
                        .then((data)=>{
                            if(data.data){
                                this.subjects = data.data;
                            }
                        })
                    this.form.subject_id="";
                }else {
                    axios.get(`/assignment/loadSubjectForStaffCurrent/${this.form.semester_id}`)
                        .then((data)=>{
                            if(data.data){ this.subjects = data.data; }
                        })
                    this.form.subject_id="";
                }

            },
            fetchingData(){
                this.fetch({whereto:this.whereto ,form:this.form});
            }

        },
    }
</script>

<style scoped>

</style>

