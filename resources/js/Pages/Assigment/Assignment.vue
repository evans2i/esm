<template>
    <app-master>
        <template #header>
            <div class="-intro-x breadcrumb breadcrumb--light mr-auto">
                <a href="" class="">Application</a>
                <i class="feather icon-chevron-right breadcrumb__icon"></i> <a href="" class="breadcrumb--active">{{pagetitle}}</a>
            </div>
        </template>
        <template #navigation> </template>
        <div class="py-12">
            <total-button :headerDetail="headerDetail"></total-button>

            <assigment-table :ans="angs"  :urls="urls" v-if="!toggleview"></assigment-table>

            <add-assigment :faculties="vans.faculty.data"
                :staffs="vans.staff.data"
                :years="vans.year.data"
                :urls="urls"
                :fetch="fetchstaffData"
                :whereto="whereto" v-if="toggleview && !$role.IsSuperadministrator()"></add-assigment>
        </div>
    </app-master>
</template>



<script>
    import TotalButton from "@/Reusable/TotalButton";
    import AppMaster from "@/Layouts/AppMaster";
    import FetchAssignment from "@/Pages/Assigment/Reusable/FetchAssignment";
    import AssigmentTable from "@/Pages/Assigment/Component/AssigmentTable";
    import AddAssignment from "@/Pages/Assigment/Component/AddAssignment";
    export default {
        props:{
            vans:{
                type:Object,
                required:true,
            },
            urls:{
                type:String,
                required:true,
            },
            pagetitle:{
                type:String,
                required:true,
            }
        },
        components:{
            AssigmentTable,
            FetchAssignment,
            AddAssignment,
            AppMaster,
            TotalButton
        },
        name: "Assignment",
        data() {
            return {
                toggleview: false,

                headerDetail: {
                    left: [
                        {
                            type: "toggle",
                            name: "Add Assigment",
                            modalink: this.togglerToFalse,
                        },
                        {
                            type: "toggle",
                            name: "View Assigment",
                            modalink: this.togglerToTrue,
                        },

                    ],

                    right: [
                        {
                            type: "links",
                            name: "Hostels",
                            modalink: "/hostel/hostels",
                        },
                        {
                            type: "links",
                            name: "Rooms Type",
                            modalink: "/manage/roomTypes",
                        },

                    ]
                },

            }
        },
        methods: {

            togglerToFalse() {
                this.whereto = "feaching";
                this.toggleview = false;
            },
            togglerToTrue() {
                this.whereto = "adding";
                this.toggleview = true;
            }
        },
    }
</script>

<style scoped>

</style>
