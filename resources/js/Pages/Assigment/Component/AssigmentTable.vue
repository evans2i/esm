<template>
    <div class="grid grid-cols-1 gap-1" >
        <!-- BEGIN: Daily Sales -->
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

                <table class="table">
                    <thead>
                    <tr>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">No</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Faculty</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap"> Semester </th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Subject </th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Title </th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Date </th>
                        <th class="border border-b-2 dark:border-dark-5  whitespace-no-wrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="hover:bg-gray-200" v-for="(van,index) in dataDisplaying" :key="index">
                        <td class="border" >{{index+1 }}</td>
                        <td class="border" >{{ van.faculty }}</td>
                        <td class="border" >{{ van.semester }}</td>
                        <td class="border" >{{ van.subject }}</td>
                        <td class="border"  >{{ van.title}}</td>
                        <td class="border" >{{ van.publish_date }} To {{ van.end_date }}</td>
                        <td class="border flex items-center">
                            <edit-link  @editlink="actionEdit(index,van)" > </edit-link>
                            <delete-link @deletelink="actionDelete(index,van)"> </delete-link>
                        </td>
                    </tr>
                    </tbody>
                </table>
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
    export default {
        components: {DeleteLink, EditLink},
        props: {
            angss: {
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
                angs : this.angss,
                vangs : this.angss,

                indexValue:Number,
                id:Number,
                showSearch:true,
            }
        },

        computed: {
            dataDisplaying(){
                return this.angss.slice(this.initNo,this.currentNo);
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
