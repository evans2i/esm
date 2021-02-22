<template>
    <div class="grid grid-cols-1 gap-1" >
        <div class="intro-y box lg:mt-5">
            <div class="overflow-x-auto">

                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <a></a>
                    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <div class="w-56 relative text-gray-700 dark:text-gray-300">
                            <input type="text" class="input w-56 box pr-10 placeholder-theme-13" @input="searchDataInTable" placeholder="Search...">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        </div>
                    </div>
                </div>

                <div class="p-5 border border-b-3 tns-item" v-for="(van,index) in dataDisplaying" :key="index" id="important-notes-item1" aria-hidden="true" tabindex="-1">
                    <div class="font-medium truncate">{{ van.title}}</div>
                    <div class="font-medium truncate">{{ van.subject}}</div>
                    <div class="text-gray-500 mt-1">Statring: {{ van.publish_date | myDateF}}  End {{ van.end_date | myDateF }} </div>
                    <div class="text-gray-600 text-justify mt-1">{{ van.description}}</div>
                    <div class="font-medium flex mt-5">
                        <button type="button" class="button button--sm bg-gray-200 dark:bg-dark-5 text-gray-600 dark:text-gray-300">View Student Answers</button>
                        <button type="button" class="button button--sm border border-gray-300 dark:border-dark-5 text-gray-600 ml-auto">ReAssign</button>
                        <edit-link  @editlink="actionEdit(index,van)" > Edit</edit-link>
                        <delete-link @deletelink="actionDelete(index,van)"> Delete</delete-link>
                    </div>
                </div>

                <div class="intro-y  flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3" >
                    <!-- <table-pagination :totalData="findingLength" :dividerData="dividerData"></table-pagination> -->
                    <ul class="pagination items-center " v-if="last => 1">
                        <li v-show="isValueOne">
                            <a class="pagination__link" href="javascript:;" @click.prevent="changeFunctionValue(first)" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left w-4 h-4"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg> </a>
                        </li>
                        <li v-show="isValueOne">
                            <a class="pagination__link" href="javascript:;" @click.prevent="changeFunctionValue(previous)" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-4 h-4"><polyline points="15 18 9 12 15 6"></polyline></svg> </a>
                        </li>
                        <li> <a class="pagination__link" v-show="isValueOne"  href="javascript:;" @click.prevent="moveThirdToFirst()">...</a> </li>
                        <template v-if="last >= 3">
                            <li> <a class="pagination__link"  href="javascript:;"  @click="changeFunctionValue(valueOne)">{{valueOne}}</a> </li>
                            <li > <a class="pagination__link pagination__link--active"  href="javascript:;" @click.prevent="changeFunctionValue(valueTwo)" >{{valueTwo}}</a> </li>
                            <li> <a class="pagination__link"  href="javascript:;" @click.prevent="changeFunctionValue(valueThree)" >{{valueThree}}</a> </li>
                        </template>
                        <template v-if="last === 2">
                            <li> <a class="pagination__link"  href="javascript:;"  @click="changeFunctionValue(valueOne)">{{valueOne}}</a> </li>
                            <li > <a class="pagination__link pagination__link--active"  href="javascript:;" @click.prevent="changeFunctionValue(valueTwo)" >{{valueTwo}}</a> </li>
                        </template>
                        <template v-if="last === 1">
                            <li > <a class="pagination__link pagination__link--active"  href="javascript:;" @click.prevent="changeFunctionValue(valueOne)" >{{valueOne}}</a> </li>
                        </template>

                        <li> <a class="pagination__link" v-show="isValueOne" href="javascript:;"  @click.prevent="moveFirstToThird()" >...</a> </li>
                        <li v-show="isValueOne">
                            <a class="pagination__link" href="javascript:;"  @click.prevent="changeFunctionValue(next)" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-4 h-4"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        </li>
                        <li v-show="isValueOne">
                            <a class="pagination__link" href="javascript:;" @click.prevent="changeFunctionValue(last)" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right w-4 h-4"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg> </a>
                        </li>
                    </ul>
                    <select v-model="dividerData"  @change="dividerDataChange" class="input w-30 border" aria-label="Page Size" title="Page Size"><option value="2">2</option><option value="5">5</option><option value="10">10</option><option value="20">20</option><option value="30">30</option><option value="40">40</option><option value="50">50</option></select>
                </div>
            </div>

        </div>
        <!-- END: Daily Sales -->
    </div>
</template>

<script>
    import EditLink from "@/Buttons/EditLink";
    import DeleteLink from "@/Buttons/DeleteLink";
    import tableCaseMixin from "@/Mixins/tableCaseMixin";
    import FetchAssignment from "@/Pages/Assigment/Reusable/FetchAssignment";

    export default {
        components: {DeleteLink, EditLink,FetchAssignment},
        props: {
            ans: {
                type: Array,
                required:true
            },
            urls: {
                type: String,
                required:true
            },
        },

        mixins:[tableCaseMixin],
        name: "AssigmentTable",
        data() {
            return {
                angs:this.vans.assigns.data,
                vangs:this.vans.assigns.data,

                whereto:"feaching",

                indexValue:Number,
                id:Number,
                showSearch:true,
            }
        },
        methods: {
            fetchstaffData(data){
                if(data.whereto == "feaching" ){
                    axios.post(`/assignment/findAssignment`,data.form).then((res)=>{
                        if (res.data.error == true){
                            Swal.fire("I'm sorry I Can not Process Data",`${res.data.message}`,'error')
                        }else{
                            this.angs = res.data.subj;
                            this.vangs = res.data.subj;
                        }
                    })
                }
            },
        },

        computed: {
            dataDisplaying(){
                return this.angs.slice(this.initNo,this.currentNo);
            },
        },

        created() {
            appBus.listen('paginated',this.dataToDisplay)
            appBus.listen('search-filter',this.searchFilterData)
            appBus.listen('data-search-show',this.dataToDisplay)
        }
    }
</script>

<style scoped>

</style>
