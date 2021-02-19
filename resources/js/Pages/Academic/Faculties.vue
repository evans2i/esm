<template>
    <app-master>

        <template #header>
            <div class="-intro-x breadcrumb breadcrumb--light mr-auto">
                <a href="" class="">Testing</a>
                <i class="feather icon-chevron-right breadcrumb__icon" ></i> <a href="" class="breadcrumb--active">Dashboard</a>
            </div>
        </template>

        <template #navigation></template>
        <app-class :vans ="vans" :urls="urls" :pagetitle="pagetitle" :option="option"></app-class>

    </app-master>
</template>

<script>
    import AppClass from '@/MyComponent/AppClass';
    import AppMaster from "@/Layouts/AppMaster";
    export default {
        props:['vans','urls','pagetitle','option'],
        components: {
            AppMaster,
            AppClass
        },
        name: "Faculty",

        data(){
            return {

            }

        }
    }
</script>

<style scoped>

</style>