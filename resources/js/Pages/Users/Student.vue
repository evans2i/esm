<template>
    <app-master>

        <template #header> 
           <div class="-intro-x breadcrumb breadcrumb--light mr-auto"> 
                <a href="" class="">Application</a> 
                <i class="feather icon-chevron-right breadcrumb__icon" ></i> <a href="" class="breadcrumb--active">Dashboard</a> 
            </div>
        </template> 
        <template #navigation> </template> 
        <div class="py-12">
            <app-student :vans ="vans" :urls="urls" :pagetitle="pagetitle" :option="option"></app-student>
        </div>
    </app-master> 
</template>

<script>
    import AppMaster from '@/Layouts/AppMaster'
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import AppStudent from '@/MyComponent/Users/AppStudent'

    export default {
        props:['vans','urls','pagetitle','option'],
        components: {
            AppLayout,
            AppMaster,
            Welcome,
            AppStudent
        },
    }
</script>