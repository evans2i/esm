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
            <library-student v-if="pagetitle === 'Students'" :vans ="vans" :urls="urls" :pagetitle="pagetitle" ></library-student>
            <library-staff v-if="pagetitle === 'Staff'" :vans ="vans" :urls="urls" :pagetitle="pagetitle" ></library-staff>
        </div>
    </app-master>
</template>

<script>
    import AppMaster from '@/Layouts/AppMaster'
    import LibraryStudent from '@/MyComponent/Library/Student/LibraryStudent.vue'
    import LibraryStaff from '@/MyComponent/Library/Student/LibraryStaff.vue'

    export default {
        props:['vans','urls','pagetitle'],

        name: "BookPage",

        components: {
            AppMaster,
            LibraryStudent,
            LibraryStaff,
        },

    }
</script>
