<template>
    <app-master>

        <template #header>
            <div class="-intro-x breadcrumb breadcrumb--light mr-auto">
                <a href="" class="">Testing</a>
                <i class="feather icon-chevron-right breadcrumb__icon" ></i> <a href="" class="breadcrumb--active">Dashboard</a>
            </div>
        </template>

        <template #navigation></template>

        <simple-crud :vans ="vans" :urls="urls" :pagetitle="pagetitle" :option="option"></simple-crud>

    </app-master>
</template>

<script>
    import SimpleCrud from '@/Customers/SimpleCrud'
    import AppMaster from "@/Layouts/AppMaster";
    export default {
        props:['vans','urls','pagetitle','option'],
        components: {
            AppMaster,
            SimpleCrud
        },
        name: "NewCrud",

        data(){
            return {

            }

        }
    }
</script>

<style scoped>

</style>
