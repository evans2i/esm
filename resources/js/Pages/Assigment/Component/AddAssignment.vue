<template>
    <div class="grid grid-cols-1 gap-1" >
        <div class="intro-y box lg:mt-5">
            <form  @submit.prevent="editmode ? updateDataFunction() : saveDataFunction()" enctype="multipart/form-data">
                <div class="overflow-x-auto">
                <fetch-assignment :faculties="vans.faculty.data"
                                  :staffs="vans.staff.data"
                                  :years="vans.year.data"
                                  :fetch="fetchstaffData"
                                  :urls="urls"
                                  :whereto="whereto">
                </fetch-assignment>
                <div class="mt-3 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                    <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Qn Title</div>
                    <input type="text" v-model="form.title" placeholder="Question Title" class="input pl-24 w-full border">
                </div>



                <div   class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 mx-0">
                    <div  class="mt-3 lg:mt-3 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 ">
                        <div class="absolute rounded-l w-full h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Starting And Ending Date</div>
                    </div>
                    <div  class="mt-3 lg:mt-3 relative flex-1 items-center  border-t lg:border-0 border-gray-200 dark:border-dark-5 ">
                        <v-date type="date" class="w-full pl-10 pr-6 flex items-center justify-center" range lang="en" v-model="form.daterange" format="YYYY-MM-DD" confirm></v-date>
                    </div>
                </div>

                <div data-editor="document" class="mt-3 lg:mt-3 editor document-editor mx-5">
                    <div class="document-editor__toolbar"></div>
                    <ckeditor :editor="editor" class="document-editor__editable-container document-editor__editable" v-model="form.description" :config="editorConfig"></ckeditor>
                </div>

                <div class="mt-3 lg:mt-3 relative flex-1 flex items-center px-5 fallback text-lg font-medium" data-dz-message>
                    <input name="file" @change="uploadFile" class="dropzone w-full border-gray-200 border-dashed dz-message" type="file"/>
                </div>

            </div>

                <div class="p-5 border-t flex">
                    <button type="button" v-show="!editmode" @click="cancelData" class="button button--sm border block text-dark">Reset Form</button>
                    <button type="button" v-show="editmode" :disabled="isDisabled" @click="cancelUpdateData" class="button button--sm border block  text-dark">Cancel Update</button>
                    <button type="submit" v-show="!editmode" :disabled="isDisabled" class="button button--sm border text-white dark:border-dark-5 bg-theme-1 dark:text-gray-300 ml-auto">Submit Data</button>
                    <button v-show="editmode" type="submit" :disabled="isDisabled" class="button button--sm border text-white dark:border-dark-5 bg-theme-1 dark:text-gray-300 ml-auto">Update changes</button>
                </div>



            </form>


        </div>
        <!-- END: Daily Sales -->
    </div>
</template>

<script>
    import FetchAssignment from "@/Pages/Assigment/Reusable/FetchAssignment";
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    import SubmitLink from "@/Reusable/SubmitLink";

    export default {
        props: {
            vans: {
                type: Object,
                required:true
            },
            urls: {
                type: String,
                required:true
            },
            adds: {
                type: Function,
                required:true
            },
        },
        components:{SubmitLink, FetchAssignment},
        name: "AddAssignment",
        data() {
            return {
                whereto: "adding",
                submitMode:false,
                editmode:false,
                form:new Form({
                    id:"",
                    faculty_id:"",
                    semester_id:"",
                    subject_id:"",
                    daterange:"",
                    description: '<p>Helo! For Description.</p>',
                    file:"",
                    title:"",
                }),
                editor: ClassicEditor,
                editorConfig: {

                },
            }
        },
        methods: {
            fetchstaffData(data) {
                if (data.whereto == "adding") {
                    this.form.faculty_id = data.form.faculty_id;
                    this.form.semester_id = data.form.semester_id;
                    this.form.subject_id = data.form.subject_id;
                }
            },
            uploadFile(e) {
                let file = e.target.files[0];
                if (file['size'] < 2048000) {
                    this.file = e.target.files[0];
                }
                else {
                    Swal.fire("I'm sorry I Can not Process Data","The file your uploading is large than 2 Mb Won't process",'error')
                }
            },

            saveDataFunction(){
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
                let formData = new FormData();
                formData.append('file', this.file);
                formData.append('faculty_id', this.form.faculty_id);
                formData.append('semester_id', this.form.semester_id);
                formData.append('subject_id', this.form.subject_id);
                formData.append('publish_date', moment(this.form.daterange[0]).format('MM/DD/YYYY'));
                formData.append('end_date', moment(this.form.daterange[1]).format('MM/DD/YYYY'));
                formData.append('description', this.form.description);
                formData.append('title', this.form.title);
                formData.append('faculty_id', this.form.faculty_id);
                axios.post(`${this.urls}`,formData,config).then((res)=>{
                    Object.entries(this.form).filter(([i, v]) =>{this.form[i] = ""; });
                    this.adds(res.data);
                }).catch((e)=>{
                    Swal.fire("I'm sorry I Can not Process Data",`${e.message}`,'error')
                });
            },
            updateDataFunction(){
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
                let formData = new FormData();
                formData.append('file', this.file);
                formData.append('faculty_id', this.form.faculty_id);
                formData.append('semester_id', this.form.semester_id);
                formData.append('subject_id', this.form.subject_id);
                formData.append('publish_date', moment(this.form.daterange[0]).format('MM/DD/YYYY'));
                formData.append('end_date', moment(this.form.daterange[1]).format('MM/DD/YYYY'));
                formData.append('description', this.form.description);
                formData.append('title', this.form.title);
                formData.append('faculty_id', this.form.faculty_id);
                axios.put(`${this.urls}/${this.form.id}`,formData,config).then((res)=>{
                    Object.entries(this.form).filter(([i, v]) =>{this.form[i] = ""; });
                    this.adds(res.data);
                }).catch((e)=>{
                    Swal.fire("I'm sorry I Can not Process Data",`${e.message}`,'error')
                });
            },
            cancelData(){
                this.file =  "";
                this.form.reset()
            },
            cancelUpdateData(){
                this.file =  "";
                this.form.reset()
            },


        },

        computed: {
            isDisabled() {
                if (!this.form.faculty_id || !this.form.semester_id || !this.form.subject_id
                    || !this.form.daterange || !this.form.title ) {
                    return !this.submitMode;
                }else{
                    return this.submitMode;
                }
            },
        },
    }
</script>


<style scoped>
    .input :focus{
        border: 2px;
    }
</style>
