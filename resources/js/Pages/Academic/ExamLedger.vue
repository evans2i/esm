<template>
    <app-master>

        <template #header>
            <div class="-intro-x breadcrumb breadcrumb--light mr-auto">
                <a href="" class="">Exam Ledger</a>
                <i class="feather icon-chevron-right breadcrumb__icon" ></i> <a href="" class="breadcrumb--active">Dashboard</a>
            </div>
        </template>

        <template #navigation></template>
        <exam-result :vans ="vans" :urls="urls" :pagetitle="pagetitle" :option="option"></exam-result>

    </app-master>
</template>

<script>
    import ExamResult from '@/MyComponent/Examination/ExamResult';
    import AppMaster from "@/Layouts/AppMaster";
    export default {
        props:['vans','urls','pagetitle','option'],
        components: {
            AppMaster,
            ExamResult
        },
             name: "ExamLedger",

        data(){
            return {

            }

        }
    }
</script>

<style scoped>

</style>