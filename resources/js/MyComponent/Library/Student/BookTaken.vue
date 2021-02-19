<template>
    <div>
        <div class="grid grid-cols-1 gap-1 gap-1 lg:mt-5">
            <div class="intro-y box px-5 pt-5" >
                <div class="preview">
                    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5 w-full">
                        <table class="table table--sm">
                            <thead>
                            <tr>
                                <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">NO</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Ref No</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">BOOK NAME</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">CATEGORIES</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">ISSUED ON</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">DUE DATE</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">DAY</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">ACTION</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr v-for="(book, index) in bookTakens" :key="index" >
                                    <td class="border-b dark:border-dark-5">{{ index + 1}}</td>
                                    <td class="border-b dark:border-dark-5">{{ book.code }}</td>
                                    <td class="border-b dark:border-dark-5">{{ book.title }}</td>
                                    <td class="border-b dark:border-dark-5">{{ book.category }}</td>
                                   <td class="border-b dark:border-dark-5">{{ book.issued_on }}</td>
                                   <td class="border-b dark:border-dark-5">{{ book.due_date }}</td>
                                   <td class="border-b dark:border-dark-5" v-if="book.return_date !== null">{{ book.return_date | myDateFN }}</td>
                                   <td class="border-b dark:border-dark-5" v-if="book.return_date== null">{{ book.days }}</td>
                                    <td class="border-b dark:border-dark-5 flex" v-if="book.return_date == null">
                                        <a @click="returnBook(book,index)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left mx-auto"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div >
</template>

<script>
    export default {
        props:['bookTaken','member'],

        name: "BookTaken",

        data(){
            return{
                bookTakens : this.bookTaken,
            }
        },

        methods :{
            returnBook(book,index){
                axios.get(`/library/bookIssueReturn/${this.member.id}/${book.book_id}`).then((data)=>{
                    this.bookTakens.splice(index, 1);
                    appBus.fire('book-taken',[book,data.data]);
                })
            }
        }
    }
</script>

<style scoped>

</style>
