<template>
    <div class="intro-y box">
        <div class="p-5" id="input">
            <div class="preview">
            
            </div>



            <!-- <div class="p-5 border-t flex">
                <button type="button" v-show="!editmode" :disabled="isDisabled" @click="cancelDetail" class="button button--sm border block text-dark">Reset Form</button>
                <button type="button" v-show="editmode" :disabled="isDisabled" @click="cancelUpdate" class="button button--sm border block  text-dark">Cancel Update</button>
                <button type="button" v-show="!editmode" :disabled="isDisabled" @click="saveDetail" class="button button--sm border text-white dark:border-dark-5 bg-theme-1 dark:text-gray-300 ml-auto">Submit</button>
                <button v-show="editmode" type="button" :disabled="isDisabled" @click="updateDetail" class="button button--sm border text-white dark:border-dark-5 bg-theme-1 dark:text-gray-300 ml-auto">Update changes</button>
            </div> -->

        </div>
    </div>

</template>

<script>
  

    export default {
        props:['categories','urls'],
        components: {
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
                }),
            }
        },

        methods: {
          
    
            saveDetail(){
                this.$Progress.start();
                this.form.post(`${this.urls}`)
                    .then((data) => {
                        this.angs.push(data.data);
                        this.cancelUpdate();
                        Toast.fire({
                            icon: "success",
                            title: `${this.pagetitle} created successfully`
                        });
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        Toast.fire({
                            icon: "error",
                            title: "van did not created successfully"
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
