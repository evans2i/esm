<template>
     <div class="overflow-x-auto">
     <table class="table">
         <thead>
             <tr>
                 <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">No</th>
                 <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Year</th>
                 <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Month</th>
                 <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Exams</th>
                 <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Class</th>
                 <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Semister</th>

                 <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Result Status</th>
                 <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Status</th>
                 <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Action</th>
             </tr>
         </thead>
         <tbody>
             <tr v-for="(van,index) in angs" :key="index">
                 <td class="border-b whitespace-no-wrap">{{ index+1}}</td>
                 <td class="border-b whitespace-no-wrap">{{ van.year }}</td>
                 <td class="border-b whitespace-no-wrap">{{ van.month }}</td>
                 <td class="border-b whitespace-no-wrap">{{ van.exam }}</td>
                 <td class="border-b whitespace-no-wrap">{{ van.faculty }}</td>
                 <td class="border-b whitespace-no-wrap">{{ van.semester }}</td>
                 <td class="border-b whitespace-no-wrap">{{ van.publish_status }}</td>
                 <td class="border-b whitespace-no-wrap">{{ van.status }}</td>
                 <td class="border-b whitespace-no-wrap flex">
                     <show-button @showbtn="actionShow(van)"></show-button>
                     <delete-button @deleteBtn="actionDelete(index,van)"></delete-button>
                 </td>
             </tr>
         </tbody>
     </table>
 </div>
</template>

<script>

    import JetButton from '@/Jetstream/Button'
    import DeleteButton from '@/Buttons/DeleteButton'
    import ShowButton from '@/Buttons/ShowButton'

    export default {
        props:['angss','urls'],
        components: {
            JetButton,
            DeleteButton,
            ShowButton

        },

        data() {
            return {
                angs:this.angss,
                
            }
        },

        methods: {
            actionDelete(index,van){
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
                            this.form.delete(`/accademic/${this.urls}/${van.id}`)
                                .then((data) => {
                                    let tr = this.angs.indexOf(van);
                                    Swal.fire("Deleted!", `${this.pagetitle} has been deleted.`, "success");
                                    this.angs.splice(tr,1);
                                    this.spinning=!this.spinning;

                                }).catch(() => {
                                    Swal.fire("Something Wrong Happened !", "Not Deleted Please try Again !", "error");
                                });
                        }else{

                        }
                    });
            },

            actionShow(van){
                console.log(van);
                // axios.get(`/accademic/showTimeTable/$`).then(()=>{

                // });
                // this.$modal('')
                    
            },
         
        },

        computed: {
            findingLength(){
              return this.angs.length;
          },
          dataDisplaying(){
              return this.angs.slice(this.initNo,this.currentNo);
          },
        }
       
}
</script>