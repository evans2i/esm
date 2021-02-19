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
 
    <fee-add :vans ="vans" :urls="urls" :pagetitle="pagetitle"></fee-add>
    </app-master>
</template>

<script>
    import AppMaster from "@/Layouts/AppMaster";
    import FeeAdd from "@/MyComponent/Account/FeeAdd"

    export default {
        props:['vans','urls','pagetitle'],
        components: {
            AppMaster,
            FeeAdd
        },
 

 

}
</script>

<style lang="stylus" scoped>

</style>
