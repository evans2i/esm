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

            <assigment-table :vans="vans" :dholder="holder" :urls="urls" v-if="!toggleview"></assigment-table>

            <add-assignment :adds="fuctionAdd" :vans="vans" :urls="urls" v-if="toggleview && !$role.IsSuperadministrator()"></add-assignment>
        </div>
    </app-master>
</template>



<script>
    import TotalButton from "@/Reusable/TotalButton";
    import AppMaster from "@/Layouts/AppMaster";
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
                    right: []
                },

                holder:{},

            }
        },
        methods: {

            togglerToFalse() {
                this.whereto = "feaching";
                this.toggleview = true;
            },
            togglerToTrue() {
                this.whereto = "adding";
                this.toggleview = false;
            },

            fuctionAdd(data){
                this.whereto = "adding";
                this.toggleview = false;
                this.holder= data;
            }

        },

        created(){
           
        }
    }
</script>

<style scoped>

</style>
