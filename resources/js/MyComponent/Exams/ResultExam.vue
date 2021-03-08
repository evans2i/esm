<template>
    <div>
        <div class="pt-5">
            <fetching-exam :vans="vans"></fetching-exam>
        </div>
        <div class="intro-y flex flex-col sm:flex-row items-center mt-0 lg:mt-5  sm:mt-3 mt-5">
            <h2 class="text-lg font-medium mr-auto"> Result For All Student In Semister</h2>
        </div>
        <div>
<!--            <loading-spinner v-if="Object.keys(studentData).length === 0">Fetching</loading-spinner>-->
        </div>
<!--        v-if="Object.keys(studentData).length != 0"-->
        <div>
            <div class="grid grid-cols-1 gap-1 gap-1 lg:mt-5">
                <div class="intro-y box px-5 pt-5" v-for="(student,index) in students" :key="index" >
                    <div class="preview">
                        <div class="intro-y flex flex-col sm:flex-row items-center mt-0 lg:mt-5  sm:mt-3 mt-5">
                            <h2 class="text-lg font-medium mr-auto">
                            </h2>
                            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                                <button @click="printableFullDetail(`printablefull-${index}`)" class="button button--sm w-24 mr-1 mb-2 border text-gray-700 text-white shadow-md mr-2 bg-purple-400" >Print Data</button>
                            </div>
                        </div>
                        <div :id="`printablefull-${index}`"  class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5 w-full">

                            <table class="table table--sm">
                                <thead>
                                    <tr>
                                        <th colspan="7" class=" border border-b text-center dark:border-dark-5">{{student.name}}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3" class="border border-b text-center dark:border-dark-5">{{student.reg_no}}</th>
                                        <th colspan="2" class="border border-b text-center dark:border-dark-5">Current Class: {{student.faculty}}</th>
                                        <th colspan="2" class="border border-b text-center dark:border-dark-5">Current Class: {{student.semester}}</th>
                                    </tr>
                                    <tr>
                                        <th class="border border-b dark:border-dark-5">Subjects</th>
                                        <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap" :colspan="2*(Object.keys(exams).length)" >Examination</th>
                                        <th class="border border-b dark:border-dark-5">Total</th>
                                        <th class="border border-b dark:border-dark-5"> Avarage </th>
                                    </tr>
                                    <tr>
                                        <th class="border border-b dark:border-dark-5">Subjects</th>
                                        <th class="border border-b-2 dark:border-dark-5" :colspan="Object.keys(exams).length" v-for="(exam,index) in exams" :key="exam.id" >{{exam.title}}</th>
                                        <th class="border border-b dark:border-dark-5">Total</th>
                                        <th class="border border-b dark:border-dark-5"> Avarage </th>
                                    </tr>
                                </thead>
<!--                                v-for="(feeD ,index) in studentMaster" :key="index"-->
                                <tbody>
                                <tr class="hover:bg-gray-200" v-for="subject in subjects">
                                    <td class="border" >{{subject.title }}</td>
                                    <template v-for="(exam) in exams">
                                        <td class="border" >{{chopingMarkData(student.student_id,subject.id,exam.id,"theory")}}</td>
                                        <td class="border" >{{chopingMarkData(student.student_id,subject.id,exam.id,"practical")}}</td>
                                    </template>

                                    <td class="border" >{{findTotal(student.student_id,subject.id)}}</td>
                                    <td class="border" >{{findTotal(student.student_id,subject.id)/( Object.keys(exams).length)}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div >


<!--        <modal name="super-large" height="auto" width="40%" >   -->
<!--            <collect-fee :payFee="payFee" :urls="urls" :pagetitle="pagetitle"></collect-fee>    -->
<!--        </modal>    -->
<!--        <modal name="super-large-show" height="auto" width="78%" >-->
<!--            <show-collect :payFee="showFee" :urls="urls" :pagetitle="pagetitle"></show-collect> -->
<!--        </modal>    -->
    </div>
</template>


<script>
    import DeleteButton from '@/Buttons/DeleteButton'
    import LoadingSpinner from '@/Customers/LoadingSpinner'
    import EditButton from '@/Buttons/EditButton'
    import FetchingExam from "@/Customers/FetchingExam";

    export default {
        props:['vans','urls','pagetitle'],
        components: {
            FetchingExam,
            DeleteButton,
            EditButton,
            LoadingSpinner
        },

        name: "ResultExam",

        data() {
            return {
                subjects:[],
                students:[],
                exams:[],
                marks:[],

                summark: [],
            }
        },

        methods: {

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


            chopingMarkData(std,subj,exam,type){
                let mark=0;
                let arry = this.marks;
                arry.forEach((ele)=>{
                    if(ele.student_id == std && ele.subject_id == subj && ele.exam_id == exam){
                        if (type == "theory"){
                            mark = ele.obtain_mark_theory? ele.obtain_mark_theory: 0;
                        }else if(type == "practical"){
                            mark = ele.obtain_mark_practical? ele.obtain_mark_practical: 0;
                        }else{
                            mark = 0;
                        }
                    }
                })
                return mark
            },

            findTotal(std,subj){
                let merk = 0;
                let marks = this.marks;
                marks.forEach((ele)=>{
                    if (ele.student_id == std &&  ele.subject_id == subj){
                        merk += (eval(ele.obtain_mark_theory) + eval(ele.obtain_mark_practical))
                    }
                });
                return merk;
            },


            viewResutInCollection(results){
                this.subjects= results.subjects;
                this.marks = results.marks;
                this.students = results.students;
                this.exams = results.exams;
            },


            printableFullDetail(printable){
                let contents = document.getElementById(`${printable}`).innerHTML;
                let frame1 = document.createElement('iframe');
                frame1.name = "frame1";
                frame1.style.position = "absolute";
                frame1.style.top = "-1000000px";
                document.body.appendChild(frame1);
                let frameDoc = frame1.contentWindow ? frame1.contentWindow : frame1.contentDocument.document ? frame1.contentDocument.document : frame1.contentDocument;
                frameDoc.document.open();
                frameDoc.document.write('<html lang="en"><head><title>Receipt</title>');
                frameDoc.document.write('<link rel="stylesheet" type="text/css" href="/vendors/css/vendors.min.css"/>');
                frameDoc.document.write('<link rel="stylesheet" type="text/css" href="/dist/css/app.css"/>');
                frameDoc.document.write('<link rel="stylesheet" type="text/css" href="/css/app.css"/>');
                frameDoc.document.write('</head><body>');
                frameDoc.document.write(contents);
                frameDoc.document.write('</body></html>');
                frameDoc.document.close();
                setTimeout(function () {
                    window.frames["frame1"].focus();
                    window.frames["frame1"].print();
                    document.body.removeChild(frame1);
                }, 500);
                return false;
            },


        },

        computed: {

        },
        created(){
            appBus.listen('fetching-exam',this.viewResutInCollection);
        }

    }
</script>

<style  scoped>

</style>
>
