<template>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700 dark:text-gray-300">
                <input type="text" class="input w-56 box pr-10 placeholder-theme-13" @input="searchDataInTable" placeholder="Search...">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> 
            </div>
        </div>

</template>

<script>


    export default {
        props:['angs','dividerData'],
    
        data() {
            return {
                arry: this.angs,
                currentData:[],
                searchQuery:"",
            }
        },

        methods: {
            searchDataInTable(){
                const arrData = this.arry;
                let searchQuery= event.target.value;
                let searchStr = searchQuery.toLowerCase();

                console.log(searchQuery);
                this.currentData=[];
                let m =false;
                arrData.forEach(obj => {
                    let matches = Object.entries(obj).filter(([i, v]) =>{
                        m =false;
                        if(v !== null && isNaN(v) && v !== undefined){
                            v= v.toLowerCase();
                            if(v.includes(searchStr)){
                                m = true;
                            }
                        }if(m){return true;}
                    });
                    if (matches === undefined || matches.length == 0) {
                    }else{
                        this.currentData.push(obj);
                        
                    }
                });

                appBus.fire('search-filter',this.currentData);
                // appBus.fire('paginated');
            }

            
        },

        mounted() {
            
        },
       
    }
</script>
