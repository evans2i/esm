<template>
    <div class="intro-y box">
        <div class="p-5" id="input">
            <div class="preview">

                <div class="intro-y box px-5 pt-2 mt-5">
                    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-26 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Isbn Number</div>
                            <input type="text" v-model="form.isbn_number" class="input pl-28 w-full border" placeholder="Isbn Number">
                        </div>
                    </div>
                </div>

                <div class="intro-y box px-5">
                    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">code</div>
                            <input type="text" v-model="form.code" class="input pl-24 w-full border" placeholder="code">

                        </div>
                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-24 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Start Code</div>
                            <input type="number" v-model="form.start_code"  class="input pl-28 w-full border"  placeholder="Start Code">

                        </div>
                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">End Code</div>
                            <input type="number"  v-model="form.end_code" class="input pl-24 w-full border"  placeholder="End Code">
                        </div>
                    </div>
                </div>


                <div class="intro-y box px-5 ">
                    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-24 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Book Name</div>
                            <input type="text" v-model="form.title" class="input pl-28  w-full border" placeholder="Book Name">
                        </div>
                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-24 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Sub Title</div>
                            <input type="text" v-model="form.sub_title" class="input pl-28  w-full border" placeholder="Sub Title">
                        </div>
                    </div>
                </div>

                <div class="intro-y box px-5 ">
                    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <v-select  v-model="form.book_category_id" :options="categories" :reduce="category => category.id" :filterable="false" class="input w-full border"></v-select>
                        </div>

                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-20 h-8 flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Language</div>
                            <input type="text" v-model="form.language" class="input pl-24 w-full border" placeholder="Language">
                        </div>
                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-12 h-8 flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Series</div>
                            <input type="text" v-model="form.series" class="input pl-16 w-full border" placeholder="Series">
                        </div>
                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-12 h-8 flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Price</div>
                            <input type="text" v-model="form.price" class="input pl-16 w-full border" placeholder="Price">
                        </div>
                    </div>
                </div>
                <div class="w-full border-t border-bold border-gray-200 dark:border-dark-5 border-dashed" ></div>


                <div class="intro-y box px-5 pt-2 mt-5">
                    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-20 h-9 flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Publisher</div>
                            <input type="text" v-model="form.publisher" class="input pl-24 w-full border" placeholder="Publisher" required>

                        </div>
                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-20 h-9 flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Publish Year</div>
                            <!-- <input type="text" v-model="form.publish_year" class="input pl-28 w-full border" placeholder="Publish Year" required> -->
                            <date-picker type="date" class="input pl-20 relative h-full w-full border" v-model="form.publish_year" lang="eng" format="YYYY-MM-DD"></date-picker>

                        </div>
                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-20 h-9 flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Edition</div>
                            <input type="text" v-model="form.edition" class="input pl-24 w-full border" placeholder="Edition" required>
                        </div>
                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-20 h-9 flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Edition Year</div>
                            <!-- <input type="text" v-model="form.edition_year" class="input pl-24 w-full border" placeholder="Edition Year"> -->
                            <date-picker type="date" class="input pl-20 relative h-full w-full border" v-model="form.edition_year" lang="eng" format="YYYY-MM-DD"></date-picker>
                        </div>
                    </div>
                </div>

                <div class="intro-y box px-5 pt-2 mt-5">
                    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Author</div>
                            <input type="text" v-model="form.author" class="input pl-24 w-full border" placeholder="Author" required>

                        </div>
                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-24 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Rack Location</div>
                            <input type="text" v-model="form.rack_location" class="input pl-28 w-full border" placeholder="Rack Location">

                        </div>
                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Source</div>
                            <input type="text" v-model="form.source" class="input pl-24 w-full border" placeholder="Source">
                        </div>

                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Pages</div>
                            <input type="number" v-model="form.total_pages" class="input pl-24 w-full border" placeholder="pages" >
                        </div>
                    </div>
                </div>

                <div class="w-full border-t border-bold border-gray-200 dark:border-dark-5 border-dashed"></div>
                <div class="intro-y box px-5 pt-2 mt-5">
                    <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                <select class="input w-full border" v-model="form.book_status_id" required >
                                    <option value="" selected>Select Book Status</option>
                                    <option v-for="status in statuses" :key="status.id" :value="status.id" >{{status.title}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                            <textarea class="input w-full border" v-model="form.notes" name="notes" cols="30" rows="4" placeholder="Descriptions"></textarea>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="w-full border-t border-gray-200 dark:border-dark-5 mt-5"></div>
            </div>


            <div class="p-5 border-t flex">
                <button type="button" v-show="!editmode" :disabled="isDisabled" @click="cancelDetail" class="button button--sm border block text-dark">Reset Form</button>
                <button type="button" v-show="editmode" :disabled="isDisabled" @click="cancelUpdate" class="button button--sm border block  text-dark">Cancel Update</button>
                <button type="button" v-show="!editmode" :disabled="isDisabled" @click="saveDetail" class="button button--sm border text-white dark:border-dark-5 bg-theme-1 dark:text-gray-300 ml-auto">Submit</button>
                <button v-show="editmode" type="button" :disabled="isDisabled" @click="updateDetail" class="button button--sm border text-white dark:border-dark-5 bg-theme-1 dark:text-gray-300 ml-auto">Update changes</button>
            </div>

        </div>
    </div>

</template>

<script>
    import AddBook from '@/MyComponent/Library/Modal/AddBook'
    import DatePicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';


    export default {
        props:['categories','book','statuses','urls','pagetitle'],
        components: {
            AddBook,
            DatePicker
        },

        name: "BookList",

        data() {
            return {
                submitMode:false,
                editmode:false,
                form : new Form({
                    id : "",
                    book_category_id : "",
                    start_code:"",
                    end_code :"",
                    total_book:"",
                    isbn_number : "",
                    code : "",
                    title : "",
                    sub_title : "",
                    image : "",
                    language : "",
                    editor : "",
                    edition : "",
                    edition_year : "",
                    publisher : "",
                    publish_year : "",
                    series : "",
                    author : "",
                    price : "",
                    total_pages : "",
                    source : "",
                    notes : "",
                    status : "1",
                    book_status_id:"",
                    rack_location:"",
                }),
            }
        },

        methods: {

            updateDetail(){
                this.$Progress.start();
                this.form.put(`${this.urls}/${this.id}`)
                    .then((data) => {
                        this.angs.splice(this.indexValue, 1, data.data);
                        this.cancelUpdate();
                        Toast.fire({
                            icon: "success",
                            title: `${this.pagetitle} Updated successfully`
                        });
                        this.$Progress.finish();
                    }).catch(() => {
                        this.$Progress.fail();
                        Toast.fire({
                            icon: "error",
                            title: `${this.pagetitle} did not Updated successfully`
                        });
                    });
            },
            saveDetail(){
                this.$Progress.start();
                this.form.post(`${this.urls}`)
                    .then((data) => {
                        this.cancelUpdate();
                        Toast.fire({
                            icon: "success",
                            title: `Book created successfully`
                        });
                        appBus.fire('book-add',data.data);
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        Toast.fire({
                            icon: "error",
                            title: "Book did not created successfully"
                        });
                    });
            },
            cancelDetail(){
              this.cancelUpdate();
              Toast.fire({ icon: "success", title: "reseted successfully" });
            },
            cancelUpdate(){
              this.form.reset();
              this.editmode = false;
            },

            totalBook(){
                if (this.form.end_code !=="" && this.form.start_code !=="") {
                    this.form.total_book = eval(this.form.end_code - this.form.start_code) + 1;
                }
            }
        },

        computed: {
            isDisabled() {
                if (!this.form.title && !this.form.publisher && !this.form.code && !this.form.isbn_number) {
                return !this.submitMode;
                }
            },


        },
         created(){
            // console.log(this.book);
            this.form.fill(this.book);
        }

}
</script>

<style lang="stylus" scoped>

</style>
