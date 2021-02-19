<template>
        <div >
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto flex ">
                    {{ payFee.fee_head  }} | {{ payFee.faculty  }} || {{ payFee.student }}
                </h2>
                <button @click="$modal.hide('super-large-show')" class="button border items-center text-gray-700 dark:border-dark-5 dark:text-gray-300 hidden sm:flex" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                </button>
            </div>
            <div id="printable" class="col-span-12 sm:col-span-12">
                <div class="items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                    <h1 class="text-2xl font-medium text-base flex text-theme-1 mr-auto justify-center">
                        Name:  {{ payFee.student }}
                    </h1>
                    <h2 class="font-medium text-base mr-auto flex text-gray-700 justify-center">
                      Class:  {{ payFee.fee_head  }} | {{ payFee.faculty  }}
                    </h2>
                </div>

                <div class="pl-5 grid grid-cols-12 gap-4 row-gap-3  m-5">
                    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5  w-full">
                        <table class="table table--sm border-5">
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
                                </tr>
                            </thead>
                            <tbody>
                                    <tr class="border-b bg-gray-200">
                                        <td class="border-b dark:border-dark-5">{{ payFee.faculty }}</td>
                                        <td class="border-b dark:border-dark-5">{{ payFee.semester }}</td>
                                        <td class="border-b dark:border-dark-5">{{ payFee.fee_head }}</td>
                                        <td class="border-b dark:border-dark-5">{{ payFee.fee_due_date | myDateFND }}</td>
                                        <td class="border-b dark:border-dark-5">{{ payFee.fee_amount }}</td>
                                        <td class="border-b dark:border-dark-5"> -- </td>
                                        <td class="border-b dark:border-dark-5">-- </td>
                                        <td class="border-b dark:border-dark-5"> -- </td>
                                        <td class="border-b dark:border-dark-5"> --</td>
                                        <td class="border-b dark:border-dark-5"> -- </td>
                                        <td class="border-b dark:border-dark-5"> {{ payFee.paid }}</td>
                                        <td class="border-b dark:border-dark-5"> {{ payFee.balance }}</td>
                                        <td class="border-b dark:border-dark-5"> {{ payFee.remark }}</td>
                                    </tr>
                                    <template v-if="payFee.fees.length != 0">
                                        <tr v-for="(fes, idf) in payFee.fees" :key="idf" >
                                            <td class="border-b dark:border-dark-5"></td>
                                            <td class="border-b dark:border-dark-5"></td>
                                            <td class="border-b dark:border-dark-5"></td>
                                            <td class="border-b dark:border-dark-5"></td>
                                            <td class="border-b dark:border-dark-5">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right mx-auto"><polyline points="15 14 20 9 15 4"></polyline><path d="M4 20v-7a4 4 0 0 1 4-4h12"></path></svg>
                                            </td>
                                            <td class="border-b dark:border-dark-5">{{fes.payment_no}}</td>
                                            <td class="border-b dark:border-dark-5">{{fes.mode}}</td>
                                            <td class="border-b dark:border-dark-5">{{fes.date | myDateFND}}</td>
                                            <td class="border-b dark:border-dark-5">{{fes.discount}}</td>
                                            <td class="border-b dark:border-dark-5">{{fes.fine}}</td>
                                            <td class="border-b dark:border-dark-5">{{fes.paid_amount}}</td>
                                            <td class="border-b dark:border-dark-5"></td>
                                            <td class="border-b dark:border-dark-5">{{fes.accountant}}</td>
                                        </tr>
                                    </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                <button type="button"  @click="$modal.hide('super-large-show')" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button>
               <button type="button" @click="printDiv('printable')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer mx-auto"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                </button>
            </div>
        </div>
</template>

<script>
    import DeleteButton from '@/Buttons/DeleteButton'
    import EditButton from '@/Buttons/EditButton'

    export default {
        props:['payFee','urls','pagetitle'],
        components: {
            DeleteButton,
            EditButton
        },

        name: "ShowCollect",

        data() {
            return {


            }
        },

        methods: {
            printDiv(printable) {
            let contents = document.getElementById(`${printable}`).innerHTML;
                let frame1 = document.createElement('iframe');
                frame1.name = "frame1";
                frame1.style.position = "absolute";
                frame1.style.top = "-1000000px";
                document.body.appendChild(frame1);
                let frameDoc = frame1.contentWindow ? frame1.contentWindow : frame1.contentDocument.document ? frame1.contentDocument.document : frame1.contentDocument;
                frameDoc.document.open();
                frameDoc.document.write('<html lang="en"><head><title>Fiche Client</title>');
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
            }


        },

        computed: {

        },
        mounted(){

        }


}
</script>

<style lang="stylus" scoped>

</style>
