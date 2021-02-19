<template>
    <app-master>

        <template #header>
            <div class="-intro-x breadcrumb breadcrumb--light mr-auto">
                <a href="" class="">Testing</a>
                <i class="feather icon-chevron-right breadcrumb__icon" ></i> <a href="" class="breadcrumb--active">Dashboard</a>
            </div>
        </template>

        <template #navigation></template>
        <result-exam :vans ="vans" :urls="urls" :pagetitle="pagetitle"></result-exam>

    </app-master>
</template>

<script>
    import ResultExam from '@/MyComponent/Exams/ResultExam';
    import AppMaster from "@/Layouts/AppMaster";
    export default {
        props:['vans','urls','pagetitle'],
        components: {
            AppMaster,
            ResultExam
        },
             name: "ExamResult",

        data(){
            return {

            }

        }
    }
</script>

<style scoped>

</style>