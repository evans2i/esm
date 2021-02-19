<template>
    <app-master>

        <template #header>
            <div class="-intro-x breadcrumb breadcrumb--light mr-auto">
                <a href="" class="">Testing</a>
                <i class="feather icon-chevron-right breadcrumb__icon" ></i> <a href="" class="breadcrumb--active">Dashboard</a>
            </div>
        </template>

        <template #navigation></template>
        <add-schedule :vans ="vans" :urls="urls" :pagetitle="pagetitle" :option="option"></add-schedule>

    </app-master>
</template>

<script>
    import AddSchedule from '@/MyComponent/Examination/AddSchedule';
    import AppMaster from "@/Layouts/AppMaster";
    export default {
        props:['vans','urls','pagetitle','option'],
        components: {
            AppMaster,
            AddSchedule
        },
       
             name: "ExamSchedule",

        data(){
            return {

            }

        }
    }
</script>

<style scoped>

</style>