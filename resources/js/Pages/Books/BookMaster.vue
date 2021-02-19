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
            <book-list :vans ="vans" :urls="urls" :pagetitle="pagetitle" ></book-list>
        </div>
    </app-master> 
</template>

<script>
    import AppMaster from '@/Layouts/AppMaster'
    import AppLayout from '@/Layouts/AppLayout'
    import BookList from '@/MyComponent/Library/BookList'

    export default {
        props:['vans','urls','pagetitle'],

        name: "BookMaster",

        components: {
            AppLayout,
            AppMaster,
            BookList
        },
    }
</script>