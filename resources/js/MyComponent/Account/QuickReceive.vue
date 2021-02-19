<template>
<div>
        <div class="p-5" id="input" v-show="!addingFee">
            <div class="preview">
                <v-select label="name" :filterable="false" v-model="student_id" :options="students" @search="onSearch" :reduce="student => student.id" @input="takeTotheStudentFeeData()">
                    <template slot="no-options">
                    type to search Student...
                    </template>
                    <template slot="option" slot-scope="option">
                    <div class="d-center">
                        <!-- <img :src='option.owner.avatar_url'/>  -->
                        {{ option.reg_no }}-{{ option.name }}
                        </div>
                    </template>
                    <!-- <template slot="selected-option" slot-scope="option">
                    <div class="selected d-center">
                        <img :src='option.owner.avatar_url'/>
                        {{ option.full_name }}
                    </div>
                    </template> -->
                </v-select>

            </div>
        </div>

        <div class="intro-y flex flex-col sm:flex-row items-center mt-0 lg:mt-5  sm:mt-3 mt-5">
            <h2 class="text-lg font-medium mr-auto">
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <button v-show=" addingFee " @click="findStudentData" class="button text-white shadow-md mr-2 bg-theme-1" >Find Student</button>
                <button v-show="addingFee" @click="printableFullDetail('printablefull')" class="button text-white shadow-md mr-2 bg-purple-400" >Print Data</button>
            </div>
        </div>
        <div v-show="addingFee">
            <loading-spinner v-if="Object.keys(studentData).length === 0">Fetching</loading-spinner>
        </div>
        <div v-if="Object.keys(studentData).length !== 0" >
            <div class="grid grid-cols-1 gap-1 gap-1 lg:mt-5" id="printablefull" v-show="addingFee">
                <div class="intro-y box px-5 pt-5" >
<!--                    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">-->
<!--                        <div class="flex flex-1 items-center justify-center lg:justify-start">-->
<!--                            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative border ">-->
<!--                                &lt;!&ndash; rounded-full mx-auto  &ndash;&gt;-->
<!--                                <img alt="School One" class="rounded-full" src="/organization/logo.jpg">-->
<!--                                <div class="absolute mb-1 mr-1 flex items-center bottom-0 right-0 bg-theme-1 rounded-full p-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera w-4 h-4 text-white"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg> </div>-->
<!--                            </div>-->
<!--                            <div class="ml-5">-->
<!--                                <div class="truncate sm:whitespace-normal font-medium text-lg">{{ studentData.name }}</div>-->
<!--                                <div class="text-gray-600">{{ studentData.reg_no }}</div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="flex mt-6 lg:mt-0 items-center lg:items-start flex-1 flex-col justify-center text-gray-600 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">-->
<!--                            <div class="truncate sm:whitespace-normal flex font-medium text-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user mx-auto"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>{{ studentData.name }}</div>-->
<!--                            <div class="truncate sm:whitespace-normal flex items-center"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail w-4 h-4 mr-2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> {{ studentData.email }}</div>-->
<!--                            <div class="truncate sm:whitespace-normal flex items-center mt-3"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram w-4 h-4 mr-2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg> {{ studentData.reg_no }} </div>-->
<!--                            &lt;!&ndash; <div class="truncate sm:whitespace-normal flex items-center mt-3"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter w-4 h-4 mr-2"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg> Twitter Kevin Spacey </div> &ndash;&gt;-->
<!--                        </div>-->
<!--                        <div class="mt-6 lg:mt-0 flex-1 px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 pt-5 lg:pt-0">-->
<!--                            <div class="font-medium text-center lg:text-left lg:mt-5">Current Class</div>-->
<!--                            <div class="flex items-center justify-center lg:justify-start mt-2">-->
<!--                                &lt;!&ndash; <span class="ml-3 font-medium text-theme-9"> </span> &ndash;&gt;-->
<!--                                <div class="mr-2 w-20 flex"> {{ studentData.facultyName }} </div>-->
<!--                                <div class="w-32 lg:w-40"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>-->
<!--                                    <canvas class="simple-line-chart-1 chartjs-render-monitor" height="80" width="320" style="display: block; width: 160px; height: 40px;"></canvas>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="flex items-center justify-center lg:justify-start">-->
<!--                                <div class="mr-2 w-20 flex"> {{ studentData.semesterName }}</div>-->
<!--                                <div class="w-32 lg:w-40"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>-->
<!--                                    <canvas class="simple-line-chart-2 chartjs-render-monitor" height="80" width="320" style="display: block; width: 160px; height: 40px;"></canvas>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                    <user-printer :studentId="studentData.id"></user-printer>



                    <div class="preview">
                        <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5 w-full">
                            <table class="table table--sm">
                                <thead>
                                    <tr>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Faculty</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Semester</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Fee Head</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">DueDate</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Amount</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">PayID</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Mode</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Date</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">DI</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">FI</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Paid</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Balance</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Remark</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Actions</th>
                                    </tr>
                                </thead>
                                <tbody v-for="(feeD ,index) in studentMaster" :key="index">
                                        <tr class="border-b bg-gray-200">
                                            <td class="border-b dark:border-dark-5">{{ feeD.faculty }}</td>
                                            <td class="border-b dark:border-dark-5">{{ feeD.semester }}</td>
                                            <td class="border-b dark:border-dark-5">{{ feeD.fee_head }}</td>
                                            <td class="border-b dark:border-dark-5">{{ feeD.fee_due_date | myDateFND }}</td>
                                            <td class="border-b dark:border-dark-5">{{ feeD.fee_amount }}</td>
                                            <td class="border-b dark:border-dark-5"> -- </td>
                                            <td class="border-b dark:border-dark-5">-- </td>
                                            <td class="border-b dark:border-dark-5"> -- </td>
                                            <td class="border-b dark:border-dark-5"> --</td>
                                            <td class="border-b dark:border-dark-5"> -- </td>
                                            <td class="border-b dark:border-dark-5"> {{ feeD.paid }}</td>
                                            <td class="border-b dark:border-dark-5"> {{ feeD.balance }}</td>
                                            <td class="border-b dark:border-dark-5"> {{ feeD.remark }}</td>
                                            <td class="border-b dark:border-dark-5 flex">
                                                <a v-if="feeD.fee_amount > feeD.paid" class="bg-theme-1 text-white" @click="addSchoolFeeToTable(index,feeD)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                </a>
                                                <a v-if="$role.IsSuperadministrator()" class="bg-theme-12 text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                                </a>
                                                <a class="bg-gray-200 text-gray-600" @click="printDataAtThisFee(feeD)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer mx-auto"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                                                </a>
                                                <a @click="hideAndToggleToShow(index)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter mx-auto">
                                                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        <template v-if="feeD.fees.length != 0 && feeD.toggle">
                                            <tr v-for="(fes, idf) in feeD.fees" :key="idf" >
                                                <td class="border-b dark:border-dark-5"></td>
                                                <td class="border-b dark:border-dark-5"></td>
                                                <td class="border-b dark:border-dark-5"></td>
                                                <td class="border-b dark:border-dark-5"></td>
                                                <td class="border-b dark:border-dark-5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right mx-auto"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                                </td>
                                                <td class="border-b dark:border-dark-5">{{fes.payment_no}}</td>
                                                <td class="border-b dark:border-dark-5">{{fes.payment_mode}}</td>
                                                <td class="border-b dark:border-dark-5">{{fes.date | myDateFND}}</td>
                                                <td class="border-b dark:border-dark-5">{{fes.discount}}</td>
                                                <td class="border-b dark:border-dark-5">{{fes.fine}}</td>
                                                <td class="border-b dark:border-dark-5">{{fes.paid_amount}}</td>
                                                <td class="border-b dark:border-dark-5">--</td>
                                                <td class="border-b dark:border-dark-5">{{fes.accountant}}</td>
                                                <td class="border-b dark:border-dark-5 flex">
                                                    <a>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer mx-auto"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                                                    </a>
                                                    <a class="bg-theme-6 text-white" @click="deletethisPayment(fes.id, idf, index)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        </template>
                                </tbody>
                                <tr class="border-b bg-theme-6 text-white">
                                    <td class="border-b dark:border-dark-5 bg-theme-6" colspan="4">Total</td>
                                    <td class="border-b dark:border-dark-5"> {{ feeAmount }} </td>
                                    <td class="border-b dark:border-dark-5"> </td>
                                    <td class="border-b dark:border-dark-5"> </td>
                                    <td class="border-b dark:border-dark-5"> </td>
                                    <td class="border-b dark:border-dark-5"> </td>
                                    <td class="border-b dark:border-dark-5"> </td>
                                    <td class="border-b dark:border-dark-5">{{ paidAmount }} </td>
                                    <td class="border-b dark:border-dark-5"> {{ balance }} </td>
                                    <td class="border-b dark:border-dark-5" v-if="balance == 0"> Paid</td>
                                    <td class="border-b dark:border-dark-5" v-else>Partial </td>
                                    <td class="border-b dark:border-dark-5 "> </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div >


        <modal name="super-large" height="auto" width="40%" >
             <collect-fee :payFee="payFee" :urls="urls" :pagetitle="pagetitle"></collect-fee>
         </modal>
         <modal name="super-large-show" height="auto" width="78%" >
             <show-collect :payFee="showFee" :urls="urls" :pagetitle="pagetitle"></show-collect>
         </modal>
    </div>
</template>


<script>
    import StudentDetail from '@/MyComponent/Account/Student/StudentDetail'
    import CollectFee from '@/MyComponent/Account/Collect/CollectFee'
    import ShowCollect from '@/MyComponent/Account/Collect/ShowCollect'
    import DeleteButton from '@/Buttons/DeleteButton'
    import LoadingSpinner from '@/Customers/LoadingSpinner'
    import EditButton from '@/Buttons/EditButton'
    import UserPrinter from '@/Reusable/UserPrinter'

    export default {
        props:['urls','pagetitle'],
        components: {
            CollectFee,
            DeleteButton,
            EditButton,
            StudentDetail,
            ShowCollect,
            LoadingSpinner,
            UserPrinter
        },

        name: "QuickReceive",

        data() {
            return {
                payFee:{},
                showFee:{},
                studentData:[],
                studentMaster:[],
                feeAmount:"",
                discount:"",
                fine:"",
                paidAmount:"",
                balance:"",
                students:[],
                student_id:"",

                submitMode: false,
                editmode:false,
                txtDiplay:"Student List",
                addingTheme:"bg-theme-1",
                addingFee:false,
                check:false,
                indexID:"",
            }
        },

        methods: {

            deletethisPayment(id,idf,index){
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
                                .then(()=> {
                                    Swal.fire("Deleted!", `${this.pagetitle} Has been deleted.`, "success");
                                    this.studentMaster[index].fees.splice(idf,1);
                                }).catch(() => {
                                    Swal.fire("Something Wrong Happened !", "Not Deleted Please try Again !", "error");
                                });
                        }
                    });

            },
            addSchoolFeeToTable(index, feeD){
                this.indexID = index;
                this.payFee = feeD;
                this.$modal.show('super-large');
            },
            takeTotheStudentFeeData(){
                let stdId = this.student_id;
                this.addingFee = !this.addingFee;
                axios.get(`/ajaxs/loadStudentFeeMaster/${stdId}`).then((data)=>{
                    this.studentData = data.data.student;
                    this.studentMaster = data.data.master;
                    this.feeAmount = data.data.fee_amount;
                    this.discount = data.data.discount;
                    this.fine = data.data.fine;
                    this.paidAmount = data.data.paid_amount;
                    this.balance = data.data.balance;
                });

                this.students = [];
            },
           onSearch(search, loading) {
                if(search.length) {
                    loading(true);
                    this.search(loading, search, this);
                }
            },
            search: _.debounce((loading, search, vm) => {
                axios.get(`/users/students/findStudentDetails/${search}`)
                // fetch(
                //     `https://api.github.com/search/repositories?q=${escape(search)}`
                //     // `https://api.github.com/search/repositories?q=${escape(search)}`
                // )
                .then(res => {
                   vm.students = res.data;
                    loading(false);
                });
                }, 350),


            addFeeInCollection(data){
                this.studentMaster[this.indexID].fees.push(data);
                this.studentMaster[this.indexID].paid =eval(this.studentMaster[this.indexID].paid) + eval(data.paid_amount);
                this.studentMaster[this.indexID].balance -= data.paid_amount;
                this.balance  -= data.paid_amount;
                if(this.studentMaster[this.indexID].fee_amount == this.studentMaster[this.indexID].paid){
                    this.studentMaster[this.indexID].remark ="Paid"
                }
                this.indexID ="";
                this.payFee ={};
            },
            printDataAtThisFee(feeD){
                this.showFee = feeD;
                this.$modal.show('super-large-show');
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
            hideAndToggleToShow(index){
                this.studentMaster[index].toggle = !this.studentMaster[index].toggle;
            },
            findStudentData(){
                this.studentData={},
                this.student_id = "";
                this.students = [];
                this.addingFee = !this.addingFee;


            }
        },

        computed: {

        },
         created(){
           appBus.listen('fee-push',this.addFeeInCollection);
        }

}
</script>

<style  scoped>

</style>
