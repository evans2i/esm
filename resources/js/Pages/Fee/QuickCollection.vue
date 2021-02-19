<template>
    <app-master>

        <template #header>
            <div class="-intro-x breadcrumb breadcrumb--light mr-auto">
                <a href="" class="">Accountant</a>
                <i class="feather icon-chevron-right breadcrumb__icon" ></i> <a href="" class="breadcrumb--active">{{ pagetitle }}</a>
            </div>
        </template>

        <template #navigation></template>

        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                {{ pagetitle }}
            </h2>
        </div>
    <quick-receive :urls="urls" :pagetitle="pagetitle"></quick-receive>
    </app-master>
</template>

<script>
    import AppMaster from "@/Layouts/AppMaster";
    import QuickReceive from "@/MyComponent/Account/QuickReceive"

    export default {
        props:['urls','pagetitle'],
        components: {
            AppMaster,
            QuickReceive
        },




}
</script>

<style  scoped>

</style>
