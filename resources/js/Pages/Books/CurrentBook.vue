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
            <book-data :vans ="vans" :urls="urls" :pagetitle="pagetitle" ></book-data>
        </div>
    </app-master> 
</template>

<script>
    import AppMaster from '@/Layouts/AppMaster'
    import AppLayout from '@/Layouts/AppLayout'
    import BookData from '@/MyComponent/Library/BookData.vue'

    export default {
        props:['vans','urls','pagetitle'],

        name: "BookPage",

        components: {
            AppLayout,
            AppMaster,
            BookData,
        },
    }
</script>