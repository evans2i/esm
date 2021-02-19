<template>
    <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
        <div class="intro-y box lg:mt-5">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">No</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Name </th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Reg No </th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Hostel</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Room</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Beds </th>
                        <th class="border border-b-2 dark:border-dark-5  whitespace-no-wrap">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="hover:bg-gray-200" v-for="(van,index) in angs" :key="index">
                        <td class="border" >{{index+1 }}</td>
                        <td class="border"  >{{ van.student}}</td>
                        <td class="border" >{{van.reg_no }}</td>
                        <td class="border"  >{{ van.hostel }}</td>
                        <td class="border"  >{{van.room}}</td>
                        <td class="border" > {{van.bed}}</td>
                        <td class="border flex items-center">
                            <a class=" lg:flex items-right text-gray-700 mx-2" @click="shiftbed(index,van)">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat mx-auto"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>
                                Shift
                            </a>
                            <a class="lg:flex items-right bg-theme-9 text-white mx-2" @click="leavebed(index,van.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-move mx-auto"><polyline points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line></svg>
                                Leave
                            </a>
                            <a class="lg:flex items-right bg-theme-12 text-white mx-2" @click="compbed(index,van.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-move mx-auto"><polyline points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line></svg>
                                Final
                            </a>
                            <a class="lg:flex items-right bg-theme-6 text-white " @click="dlt(index,van.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mx-auto"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            vangs: {
                type: Array,
            },
            angs: {
                type: Array,
            },
            dlt:{
                type:Function,
                required:true
            },
            leavebed:{
                type:Function,
                required:true
            },
            compbed:{
                type:Function,
                required:true
            },
            shiftbed:{
                type:Function,
                required:true
            },
            urls: {
                type: String,
                default:`/hostel/residents`,
            },
        },
        name: "ResidentTable"
    }
</script>

<style scoped>

</style>
