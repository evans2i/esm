<template>
    <app-master>

        <template #header>
           <div class="-intro-x breadcrumb breadcrumb--light mr-auto">
                <a href="" class="">Application</a>
                <i class="feather icon-chevron-right breadcrumb__icon" ></i> <a href="" class="breadcrumb--active">{{pagetitle}}</a>
            </div>
        </template>
         <template #navigation> </template>

        <div class="py-12">
            <welcome v-if="$role.IsSuperadministrator() || $role.IsAdministrator() || $role.IsOwner()"  :vans="vans" />

            <dashboard-student v-else-if="$role.IsStudent()"  :vans="vans" />

            <dashboard-student v-else :vans="vans" />
        </div>
    </app-master>
</template>

<script>
    import AppMaster from '@/Layouts/AppMaster'
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import DashboardStudent from '@/Pages/Students/Student'

    export default {
        props: {
            vans: {
                type: Object,
                required: true,
            },
            pagetitle:{
                type:String,
                required:true,
            }
        },
        components: {
            AppLayout,
            AppMaster,
            DashboardStudent,
            Welcome,
        },
    }
</script>
