<template>
    <app-master>

        <template #header>
            <div class="-intro-x breadcrumb breadcrumb--light mr-auto">
                <a href="" class="">Testing</a>
                <i class="feather icon-chevron-right breadcrumb__icon" ></i> <a href="" class="breadcrumb--active">Dashboard</a>
            </div>
        </template>

        <template #navigation></template>
        <app-semester :vans ="vans" :urls="urls" :pagetitle="pagetitle" :option="option"></app-semester>

    </app-master>
</template>

<script>
    import AppSemester from '@/MyComponent/AppSemester'
    import AppMaster from "@/Layouts/AppMaster";
    export default {
        props:['vans','urls','pagetitle','option'],
        components: {
            AppMaster,
            AppSemester
        },
        name: "Semester",

        data(){
            return {

            }

        }
    }
</script>

<style scoped>

</style>
