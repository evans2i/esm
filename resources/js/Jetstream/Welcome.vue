<template>
   <div class="grid grid-cols-12 gap-6">
                <div v-if="$role.IsSuperadministrator()" class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
                    <!-- BEGIN: General Report -->
                    <total-summary :data1="data1" :data2="data2" :data3="data3" :data4="data4"></total-summary>
                    <!-- END: General Report -->
                    <summary-data :vans="vans.students.slice(0,4)" title="Student" link="/users/students"> </summary-data>
                    <summary-data :vans="vans.staffs.slice(0,4)" title="Staff" link="/users/staffs"> </summary-data>
                    <summary-data :vans="vans.books" title="Books" link="/library/bookMasters"> </summary-data>
                </div>
                <div v-if="$role.IsStudent()" class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6" >
                   <div class="intro-y flex items-center h-10">
                       <h2 class="text-lg  font-medium truncate mr-5">
                           General Report for <u class="block mt-1 font-extrabold">{{$page.user.name}}</u>
                       </h2>
                       <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10">
                           <i class="feather icon-refresh-ccw w-4 h-4 mr-3"></i>Refresh
                       </a>
                   </div>
                   <div class="grid grid-cols-12 gap-6 mt-5">

                       <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                           <div class="report-box zoom-in justify-center">
                               <div class="box p-5 justify-center">
                                   <div class="text-3xl font-bold leading-8 mt-6 text-center">{{vans.book.data.length}}</div>
                                   <div class="text-base text-gray-600 mt-1 text-center">Books</div>
                               </div>
                           </div>
                       </div>
                       <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                           <div class="report-box zoom-in justify-center">
                               <div class="box p-5 justify-center">
                                   <div class="text-3xl font-bold leading-8 mt-6 text-center">{{vans.assignment.data.length}}</div>
                                   <div class="text-base text-gray-600 mt-1 text-center">Assigment</div>
                               </div>
                           </div>
                       </div>

                   </div>
               </div>


            </div>
</template>

<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'
    import JetButton from '@/Jetstream/Button'
    import BtnButton from '@/Buttons/BtnButton'
    import TotalSummary from "@/Pages/Reusable/TotalSummary";
    import SummaryData from "@/Pages/Reusable/SummaryData";

    export default {
        props: {
            vans: {
                type: Object,
                required: false
            },
        },
        components: {
            SummaryData,
            TotalSummary,
            JetApplicationLogo,
            JetButton,
            BtnButton,
        },
        data() {
            return {
                data1:{
                    name: "Fee Received This Month",
                    count:this.vans.feeamount,
                    link:"/accountant/feeCollections"
                },
                data2:{
                    name: "Book In Our School",
                    count:this.vans.booksNo,
                    link:"/library/bookMasters"
                },
                data3:{
                    name: "Student In Our School",
                    count:this.vans.students.length,
                    link:"/users/students"
                },
                data4:{
                    name: "Staff In Our School",
                    count:this.vans.staffs.length,
                    link:"/users/staffs"
                },

            }
        },

        methods: {
            actionApplied(){
               alert("Action has been Triggled");
            },
            printTable(print){

                // Get HTML to print from element
                    const prtHtml = document.getElementById(`${print}`).innerHTML;
                    // Get all stylesheets HTML
                    let stylesHtml = '';
                    for (const node of [...document.querySelectorAll('link[rel="stylesheet"], style')]) {
                      stylesHtml += node.outerHTML;
                    }

                    // Open the print window
                    const WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');

                    WinPrint.document.write(`<!DOCTYPE html>
                    <html>
                      <head>
                        ${stylesHtml}
                      </head>
                      <body>
                        ${prtHtml}
                      </body>
                    </html>`);

                    WinPrint.document.close();
                    WinPrint.focus();
                    WinPrint.print();
                    WinPrint.close();

            },

        },

        computed: {

        },
         mounted() {

        },
        created() {
            // console.log(this.$page)
            // console.log(this.$dayjs)
        }
    }
</script>
