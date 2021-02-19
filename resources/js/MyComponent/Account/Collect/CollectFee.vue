<template>
        <div>
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto flex">
                    {{ payFee.fee_head  }} | {{ payFee.faculty  }} || {{ payFee.student }}
                </h2>
                <button @click="$modal.hide('super-large')" class="button border items-center text-gray-700 dark:border-dark-5 dark:text-gray-300 hidden sm:flex" >  
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                </button>

            </div>
            <form @submit.prevent="saveFeeDetail">
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="col-span-12 sm:col-span-12">
                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Date</div>
                            <input type="date" v-model="form.date" class="datepicker input w-56 pl-24 w-full border block mx-auto" placeholder="Date" required>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Amount</div>
                            <input type="number" v-model="form.paid_amount" class="input pl-24 w-full border" placeholder="Amount" required>
                        </div>
                    </div>


                    <div class="col-span-12 sm:col-span-6">
                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Discount</div>
                            <input type="number" v-model="form.discount" class="input pl-24 w-full border" placeholder="Discount">
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Fine</div>
                            <input type="number" v-model="form.fine" class="input pl-24 w-full border" placeholder="Fine">
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-12 ">
                        <div class="mt-3 flex">
                            <div class="flex flex-col sm:flex-row mt-2 mx-2">
                                <label>Payment Mode</label>
                            </div>
                            <div class="flex flex-col sm:flex-row mt-2 mx-2">
                                <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2">
                                    <input type="radio" v-model="form.payment_mode" value="Cash" class="input border mr-2" id="horizontal-radio-chris-evans" name="horizontal_radio_button">
                                    <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">BY CASH</label>
                                </div>
                                <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2 mt-2 sm:mt-0">
                                    <input type="radio" v-model="form.payment_mode" value="Cheque" class="input border mr-2" id="horizontal-radio-liam-neeson" name="horizontal_radio_button">
                                    <label class="cursor-pointer select-none" for="horizontal-radio-liam-neeson">BY CHEQUE</label>
                                </div>
                                <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2 mt-2 sm:mt-0">
                                    <input type="radio" v-model="form.payment_mode" value="Bank" class="input border mr-2" id="horizontal-radio-daniel-craig" name="horizontal_radio_button">
                                    <label class="cursor-pointer select-none" for="horizontal-radio-daniel-craig">BY BANK</label>
                                </div>
                            </div>
                        </div>
    
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <textarea type="textarea" v-model="form.note" row="20" class=" w-full border" placeholder="Payment Note"> </textarea>
                    </div>
                    <div class="col-span-12 sm:col-span-12" v-if="form.payment_mode=='Bank'">
                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Receipt No</div>
                            <input type="text" v-model="form.receipt_no" class="input pl-24 w-full border">
                        </div>
                    </div>
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
                    <button type="button"  @click="$modal.hide('super-large')" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button>
                    <button type="submit" :disabled="isDisabled"  class="button w-20 bg-theme-1 text-white">Add Fee</button>
                </div>
            </form>
        </div>
</template>

<script>
    import DeleteButton from '@/Buttons/DeleteButton'
    import EditButton from '@/Buttons/EditButton'

    export default {
        props:['payFee','urls','pagetitle'],
        components: {
            DeleteButton,
            EditButton,
        },

        name: "CollectFee",

        data() {
            return {
   
                form: new Form({
                    fee_master_id:this.payFee.id,
                    student_id:this.payFee.student_id,
                    date:"",
                    paid_amount:this.payFee.balance,
                    discount:0,
                    fine:0,
                    payment_mode:"",
                    payment_no:"",
                    note:"",
                    response:"",
                    receipt_no:"",
                }),
            }
        },

        methods: {
            saveFeeDetail(){
                    this.$Progress.start();
                    this.form
                        .post(`${this.urls}`)
                        .then((data) => {
                            appBus.fire('fee-push',data.data);
                             this.form.reset();
                             this.$modal.hide('super-large');
                            this.$Progress.finish();
                        })
                        .catch(() => {
                            Toast.fire({
                                icon: "error",
                                title: `${this.pagetitle} did not created`
                            });
                        });
                
            },


        },
        mounted(){

        },

        computed: {
          isDisabled() {
            if (!this.form.payment_mode ||  !this.form.paid_amount ||  !this.form.fee_master_id ||  !this.form.date) {
              return !this.submitMode;
            }
          },
        },
  

}
</script>

<style lang="stylus" scoped>

</style>