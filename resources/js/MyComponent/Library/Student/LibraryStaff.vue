

<template>
    <div>
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <h2 class="text-lg font-medium mr-auto">
                {{pagetitle}} Library
            </h2>
            <div  class="hidden md:block mx-auto text-gray-600">Showing {{ initNo + 1 }} to {{ currentNo }} of {{ findingLength }} entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input type="text" class="input w-56 box pr-10 placeholder-theme-13" @input="searchDataInTable" placeholder="Search...">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </div>
            </div>
        </div>


        <div class="grid grid-cols-1 gap-1">
            <!-- BEGIN: Daily Sales -->
            <div class="intro-y box lg:mt-5">
                <div class="overflow-x-auto">

                    <table class="table">
                        <thead>
                        <tr>
                            <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">No</th>
                            <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Staff No</th>
                            <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap"> Name </th>
                            <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Contact </th>
                            <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Gender </th>
                            <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Status </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="hover:bg-gray-200" v-for="(van,index) in dataDisplaying" style="cursor: pointer;" :key="index" @click="viewStudentBook(van.id,pagetitle)" >
                            <td class="border" >{{index+1 }}</td>
                            <td class="border" >{{ van.reg_no }}</td>
                            <td class="border" >{{ van.first_name }} {{ van.last_name }}</td>
                            <td class="border" v-if="van.home_phone">{{ van.home_phone }}</td>
                            <td class="border" v-else >{{ van.mobile_1 }}</td>
                            <td class="border" >{{ van.gender }}</td>
                            <td class="border" >
                                {{ van.status }}
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
                        <select v-model="dividerData"  @change="dividerDataChange" class="input w-30 border" aria-label="Page Size" title="Page Size">
                            <option value="2">2</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                            </select>
                    </div>
                </div>

            </div>
            <!-- END: Daily Sales -->
        </div>

    </div>
</template>

<script>

    import JetButton from '@/Jetstream/Button'
    import BtnButton from '@/Buttons/BtnButton'
    import OverlapModal from '@/Customers/OverlapModal'
    // import TablePagination from '@/Customers/TablePagination'
    // import SearchTable from '@/Customers/SearchTable'

    import tableCaseMixin from '@/Mixins/tableCaseMixin'
    // import 'vue-select/dist/vue-select.css';
    import DeleteButton from '@/Buttons/DeleteButton'
    import EditButton from '@/Buttons/EditButton'

    export default {
        props:['vans','urls','pagetitle','option'],
        components: {
            JetButton,
            BtnButton,
            OverlapModal,
            DeleteButton,
            EditButton,
            // TablePagination,
            // SearchTable


        },
        name: "LibraryStaff",
        mixins:[tableCaseMixin],
        data() {
            return {
                angs : this.vans,
                vangs : this.vans,

            }
        },

        methods: {
            viewStudentBook(id,type){
                window.location = `/library/studentLibrary/${id}/${type}`;
            },
        },

        computed: {
            findingLength(){
                return this.angs.length;
            },
            dataDisplaying(){
                return this.angs.slice(this.initNo,this.currentNo);
            },


        },


        created(){
            appBus.listen('paginated',this.dataToDisplay)
            appBus.listen('search-filter',this.searchFilterData)
            appBus.listen('data-search-show',this.dataToDisplay)
        }

    }
</script>

<style lang="stylus" scoped>

</style>

