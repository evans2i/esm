<template>
    <app-master>

        <template #header>
            <div class="-intro-x breadcrumb breadcrumb--light mr-auto">
                <a href="" class="">Testing</a>
                <i class="feather icon-chevron-right breadcrumb__icon" ></i> <a href="" class="breadcrumb--active">Dashboard</a>
            </div>
        </template>

        <template #navigation></template>
        <grading-scale :vans ="vans" :urls="urls" :pagetitle="pagetitle" :option="option"></grading-scale>

    </app-master>
</template>

<script>
    import GradingScale from '@/MyComponent/GradingScale'
    import AppMaster from "@/Layouts/AppMaster";
    export default {
        props:['vans','urls','pagetitle','option'],
        components: {
            AppMaster,
            GradingScale
        },
        name: "Grading",

        data(){
            return {

            }

        }
    }
</script>

<style scoped>

</style>
