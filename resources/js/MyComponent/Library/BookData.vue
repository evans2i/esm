<template>
    <div>


        <div class="intro-y flex flex-col sm:flex-row items-center mt-0 lg:mt-5  sm:mt-3 mt-5">
            <h2 class="text-lg font-medium mr-auto">
                Showing the Book Data

            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            </div>
        </div>

        <div class="grid grid-cols-1 gap-1 lg:mt-5" >
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="p-5" id="input">
                    <div class="preview">
                        <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                            <div class="flex flex-1 items-center justify-center lg:justify-start">
                                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative border ">
                                    <!-- rounded-full mx-auto  -->
                                    <img alt="School One" class="rounded-full" src="/dist/images/profile-10.jpg">
                                    <div class="absolute mb-1 mr-1 flex items-center bottom-0 right-0 bg-theme-1 rounded-full p-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera w-4 h-4 text-white"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg> </div>
                                </div>
                                <div class="ml-5">
                                    <div class="font-medium text-center lg:text-left lg:mt-5 text-4xl font-medium leading-none">Book</div>
                                    <div class="truncate sm:whitespace-normal text-lg font-medium">ISBN NO : {{ angs.isbn_number }}</div>
                                    <div class="text-gray-600 font-medium text-lg">BOOK CODE: {{angs.code}}</div>
                                    <div class="text-gray-600 font-medium text-lg">BOOK CATEGORY: {{angs.book_category}}</div>
                                </div>
                            </div>
                            <div class="flex mt-6 lg:mt-0 items-center lg:items-start flex-1 flex-col justify-center text-gray-600 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">
                                <div class="font-medium text-center lg:text-left lg:mt-5 text-4xl font-medium leading-none">Book Detail</div>
                                <div class="truncate sm:whitespace-normal flex font-medium text-lg">Editor: => {{ angs.editor }}</div>
                                <div class="truncate sm:whitespace-normal flex items-center text-lg font-medium"> Language: => {{ angs.language }}</div>
                                <div class="truncate sm:whitespace-normal flex items-center mt-3 text-lg font-medium"> Total Pages: => {{ angs.total_pages }} </div>
                            </div>
                            <div class="mt-6 lg:mt-0 flex-1 px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 pt-5 lg:pt-0">
                                <div class="font-medium text-center lg:text-left lg:mt-5 text-4xl font-medium leading-none">Book Structure</div>

                                <div class="flex items-center justify-center lg:justify-start mt-2">
                                    <div class="mr-2 w-60 flex text-lg font-medium">Edition:  {{angs.edition}} - {{angs.edition_year | myDateY}} </div>
                                </div>
                                <div class="flex items-center justify-center lg:justify-start mt-2">
                                    <div class="mr-2 w-60 flex text-lg font-medium">Publisher:  {{angs.publisher}} - {{angs.publish_year | myDateY}}</div>
                                </div>
                                <div class="flex items-center justify-center lg:justify-start mt-2">
                                    <div class="mr-2 w-60 flex text-lg font-medium">Author:  {{angs.author}}</div>
                                </div>
                                <div class="flex items-center justify-center lg:justify-start mt-2">
                                    <div class="mr-2 w-60 flex text-lg font-medium">Status: {{angs.status}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="table table--sm">
                                <thead>
                                    <tr>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">NO</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Book Category</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Isbn_number</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Name</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Book Code</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap"> Status </th>
<!--                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="(book,index) in angs.books" :key="index">
                                        <td class="border-b dark:border-dark-5">{{index + 1}}</td>
                                        <td class="border-b dark:border-dark-5">{{angs.book_category}}</td>
                                        <td class="border-b dark:border-dark-5">{{angs.isbn_number}}</td>
                                        <td class="border-b dark:border-dark-5">{{angs.title}}</td>
                                        <td class="border-b dark:border-dark-5">{{book.book_code}}</td>
                                        <td class="border-b dark:border-dark-5" >
                                            <select @change="changeStatusOfBook(index,book.id, )">
                                                <option selected>{{book.book_status}}</option>
                                                <option v-for="status in statuses" :key="status.id"  :class="status.display_class" :value="status.id">{{status.title}}</option>
                                            </select>
                                        </td>
<!--                                        <td class="border-b dark:border-dark-5">-->
<!--                                            <a>-->
<!--                                            <svg width="40" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="rgb(255, 255, 255)" class="w-8 h-8 text-cool-gray-800 dark:text-cool-gray-200 group-hover:text-purple-600 group-focus:text-purple-600 dark:group-hover:text-purple-50 dark:group-focus:text-purple-50">-->
<!--                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>-->
<!--                                            </svg>-->
<!--                                            </a>-->
<!--                                        </td> -->
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Input -->
        </div>
        <modal name="addstudentdata" height="auto" width="50%" >
             <action-modal :angs="angs" :urls="urls"></action-modal>
         </modal>

    </div>
</template>

<script>
    import CollectFee from '@/MyComponent/Account/Collect/CollectFee'
    import ActionModal from '@/MyComponent/Library/Modal/ActionModal'
    import ShowCollect from '@/MyComponent/Account/Collect/ShowCollect'


    export default {
        props:['vans','urls','pagetitle'],
        components: {
            CollectFee,
            ShowCollect,
            ActionModal
        },

        name: "BookData",

        data() {
            return {
                angs:this.vans.master.data,
                statuses:this.vans.status.data,
                form: new Form({book_status_id :""}),

            }
        },

        methods: {
            changeStatusOfBook(index, id){
                this.form.book_status_id = event.target.value;
                // this.currentIndex = this.angs.books[index].book_status_id;
                // let january = false;
                // if(event.target.value == 2){
                //     this.currentStatus = this.angs.books[index].book_status_id;
                //     this.angs.books[index].book_status_id = this.currentStatus;
                //     this.$modal.show("addstudentdata");
                // }else
                // }
                // if(january){
                    axios.put(`/library/books/${id}`, this.form)
                    .then((data) => {
                            this.angs.books[index].book_status_id = event.target.value;
                            Toast.fire({
                                icon: "success",
                                title: `Status Updated successfully`
                            });

                        this.$Progress.finish();
                    }).catch(() => {
                        this.$Progress.fail();
                        Toast.fire({
                            icon: "error",
                            title: `Status did not Updated successfully`
                        });
                    });
            },
        },

        computed: {

        },
         created(){

        }

}
</script>

<style lang="stylus" scoped>

</style>
