<template>
    <div>


        <div class="intro-y flex flex-col sm:flex-row items-center mt-0 lg:mt-5  sm:mt-3 mt-5">
            <h2 class="text-lg font-medium mr-auto">

            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <button @click="addBookData = !addBookData"  class="button text-white shadow-md mr-2 bg-theme-1" >{{ textDisplay }}</button>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-1 lg:mt-5" v-show="!addBookData">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="p-5" id="input">
                    <div class="preview">
                        <div class="overflow-x-auto">
                            <table class="table table--sm">
                                <thead>
                                    <tr>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">  No: </th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Book Category</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Isbn_number</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Name</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">code</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap"> Edition </th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Publisher</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap"> Author </th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap"> Status</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(book, inde) in angs" :key="inde">
                                        <td class="border-b dark:border-dark-5">
                                            {{ inde + 1 }}
                                        </td>
                                        <td class="border-b dark:border-dark-5">{{book.book_category}}</td>
                                        <td class="border-b dark:border-dark-5">{{book.isbn_number}}</td>
                                        <td class="border-b dark:border-dark-5">{{book.title}}</td>
                                        <td class="border-b dark:border-dark-5">{{book.code}}</td>
                                        <td class="border-b dark:border-dark-5">{{book.edition}} - {{book.edition_year | myDateY  }} </td>
                                        <td class="border-b dark:border-dark-5">{{book.publisher}} - {{book.publish_year | myDateY }}</td>
                                        <td class="border-b dark:border-dark-5">{{book.author}}</td>
                                        <td class="border-b dark:border-dark-5">{{book.status}}</td>
                                        <td class="border-b dark:border-dark-5 flex">

                                            <inertia-link :href="urls +'/'+book.id" class="bg-theme-1 text-white" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye mx-auto"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            </inertia-link>
<!--                                            <a class="bg-theme-12 text-white" @click="editFunction(inde,book)">-->
<!--                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit mx-auto"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>-->
<!--                                            </a>-->
                                            <a >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-filter mx-auto">
                                                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Input -->
        </div>
        <add-book :categories="categories" :book="book" :statuses="statuses" :urls="urls" v-show="addBookData"></add-book>
    </div>
</template>

<script>
    import AddBook from '@/MyComponent/Library/Modal/AddBook'


    export default {
        props:['vans','urls','pagetitle'],
        components: {
            AddBook,
        },

        name: "BookList",

        data() {
            return {
                angs:this.vans.books.data,
                statuses:this.vans.status.data,
                categories:this.vans.category.data,
                addBookData:false,
                book:{},
                indexBook:Number,
            }
        },

        methods: {
            addingBookFun(){

            },
            editFunction(index,book){
                this.indexBook = index;
                this.book = book;
                console.log(book);
                this.addBookData = !this.addBookData;
            }
        },

        computed: {
            textDisplay(){
                if (this.addBookData === false) {
                    return "Add Book";
                }else{
                    return "List Of Books";
                }
            }

        },
         created(){
            appBus.listen('book-add',(data)=>this.angs.push(data));
        }

}
</script>

<style lang="stylus" scoped>

</style>
