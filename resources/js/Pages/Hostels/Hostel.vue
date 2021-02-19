<template>
    <app-master>

        <template #header>
            <div class="-intro-x breadcrumb breadcrumb--light mr-auto">
                <a href="" class="">Application</a>
                <i class="feather icon-chevron-right breadcrumb__icon" ></i> <a href="" class="breadcrumb--active">{{pagetitle}}</a>
            </div>
        </template>

        <template #navigation> </template>

        <div class="py-12">

              <van-hostel :vans="vans" :urls="urls" :pagetitle="pagetitle"/>

        </div>
    </app-master>
</template>

<script>
    import AppMaster from '@/Layouts/AppMaster'
    import VanHostel from '@/MyComponent/Hostels/VanHostel'
    export default {
        props:['vans','urls','pagetitle'],
        name: "Hostel",
        components: {
            AppMaster,
            VanHostel
        },
    }
</script>

<style scoped>

</style>
