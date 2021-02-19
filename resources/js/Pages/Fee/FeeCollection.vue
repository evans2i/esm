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
 
    <list-student :vans ="vans" :urls="urls" :pagetitle="pagetitle"></list-student>
    </app-master>
</template>

<script>
    import AppMaster from "@/Layouts/AppMaster";
    import ListStudent from "@/MyComponent/Account/ListStudent"

    export default {
        props:['vans','urls','pagetitle'],
        components: {
            AppMaster,
            ListStudent
        },
 

 

}
</script>

<style lang="stylus" scoped>

</style>
