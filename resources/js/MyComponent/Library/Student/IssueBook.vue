<template>
    <div>
        <div class="p-5" id="input">
            <div class="preview">
                <v-select label="title" :filterable="false" v-model="takeData"  :options="books" @search="onSearch"  @input="takeBookData()">
                    <template slot="no-options">
                        type to search Student...
                    </template>
                    <template slot="option" slot-scope="option">
                        <div class="d-center">
                            {{ option.isbn_number }}-{{ option.title }}
                        </div>
                    </template>
                </v-select>

            </div>
        </div>

        <div class="grid grid-cols-1 gap-1 gap-1 lg:mt-5">
                <div class="intro-y box px-5 pt-5" >
                    <div class="preview">
                        <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5 w-full">
                            <table class="table table--sm">
                                <thead>
                                    <tr>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Book Name</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Book Code</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Author</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Edition</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Book Category</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Total Book</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Available</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">To Be Taken</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Action</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <tr class="border-b bg-gray-200" v-for="(book,index) in form.dataBooks" :key="index">
                                        <td class="border-b dark:border-dark-5">{{ book.title }}</td>
                                        <td class="border-b dark:border-dark-5">{{ book.code }}</td>
                                        <td class="border-b dark:border-dark-5">{{ book.author }}</td>
                                        <td class="border-b dark:border-dark-5">{{ book.edition }}</td>
                                        <td class="border-b dark:border-dark-5"> {{ book.book_category }} </td>
                                        <td class="border-b dark:border-dark-5"> {{book.totalbook}} </td>
                                        <td class="border-b dark:border-dark-5"> {{book.availablebook}} </td>
                                        <td class="border-b dark:border-dark-5"> {{book.book.book_code}} </td>
                                        <td class="border-b dark:border-dark-5"> 
                                            <button @click="removeDatainCollection(index)" class="button px-2 mr-1 mb-2 bg-theme-6 text-white"> <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4 feather icon-trash"></i> </span> </button>
  </td>
                                        <!-- <td class="border-b dark:border-dark-5"> <input @input="checkAndValidateData(index)" v-model="form.dataBooks[index].idadi" required/> </td> -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <button v-show="this.form.dataBooks.length > 0" @click="submitBookToBeTaken" class="button w-26 inline-block mr-1 mb-2 bg-theme-1 text-white inline-flex items-center justify-end"> Save Detail </button>
    </div>
</template>


<script>
    import StudentDetail from '@/MyComponent/Account/Student/StudentDetail'
    import CollectFee from '@/MyComponent/Account/Collect/CollectFee'
    import ShowCollect from '@/MyComponent/Account/Collect/ShowCollect'
    import DeleteButton from '@/Buttons/DeleteButton'
    import LoadingSpinner from '@/Customers/LoadingSpinner'
    import EditButton from '@/Buttons/EditButton'
    import Input from "@/Jetstream/Input";

    export default {
        props:['member'],
        components: {
            Input,
            CollectFee,
            DeleteButton,
            EditButton,
            StudentDetail,
            ShowCollect,
            LoadingSpinner
        },

        name: "IssueBook",

        data() {
            return {
                books:[],
                book_id:"",
                takeData:{},
                form: new Form({
                    member_id:this.member.id,
                    dataBooks :[],
                }),

            }
        },

        methods: {
            removeDatainCollection(index){
                this.form.dataBooks.splice(index,1);
            },

            submitBookToBeTaken(){
                if (this.form.dataBooks.length == 0 || this.form.dataBooks == undefined) {
                    Swal.fire("Sorry I Can Not Process Data!", `Please Add Book To it `, "error");
                } else {
                    this.form.post('/library/bookIssue').then((data)=>{
                    })
                }
                window.location.reload();
            },
            checkAndValidateData(index){
                this.form.dataBooks[index].idadi;
                let arry = this.form.dataBooks;
                let total = 0;
                arry.forEach((element)=>{
                    total = eval(total + eval(element.idadi));
                });

                if(total > 5){
                    this.form.dataBooks[index].idadi = "";
                    Swal.fire("Sorry I Can Not Process Data!", `Cant Add More than 5 `, "error");
                }
                if(this.form.dataBooks[index].availablebook < this.form.dataBooks[index].idadi){
                    this.form.dataBooks[index].idadi = "";
                    Swal.fire("Sorry I Can Not Process Data!", `Available Book is less than given `, "error");
                }

            },
            takeBookData(){
                this.form.dataBooks.push(this.takeData);

            },
            onSearch(search, loading) {
                if(search.length) {
                    loading(true);
                    this.search(loading, search, this);
                }
            },
            search: _.debounce((loading, search, vm) => {
                axios.get(`/library/findBookDetails/${search}`)
                    .then(res => {
                        vm.books = res.data;
                        loading(false);
                    });
            }, 350),

        },

        computed: {

        },
        created(){

        }

    }
</script>

<style  scoped>

</style>
