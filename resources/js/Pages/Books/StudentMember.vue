<template>
    <app-master>

        <template #header>
            <div class="-intro-x breadcrumb breadcrumb--light mr-auto">
                <a href="" class="">Application</a>
                <i class="feather icon-chevron-right breadcrumb__icon" ></i> <a href="" class="breadcrumb--active">{{pagetitle}} Library</a>
            </div>
        </template>
        <template #navigation> </template>
        <div class="py-12">
            <detail-student v-if="pagetitle === 'Students'" :vans ="vans" :urls="urls" :pagetitle="pagetitle" ></detail-student>
            <staff-detail v-if="pagetitle === 'Staff'" :vans ="vans" :urls="urls" :pagetitle="pagetitle" ></staff-detail>
        </div>
    </app-master>
</template>

<script>
    import AppMaster from "@/Layouts/AppMaster";
    import LibraryStudent from "@/MyComponent/Library/Student/LibraryStudent";
    import DetailStudent from "@/MyComponent/Library/Student/DetailStudent";
    import StaffDetail from "@/MyComponent/Library/Student/StaffDetail";

    export default {
        name: "StudentMember",
        props:['vans','urls','pagetitle'],

        components: {
            AppMaster,
            LibraryStudent,
            DetailStudent,
            StaffDetail,
        },
    }
</script>

<style scoped>

</style>
