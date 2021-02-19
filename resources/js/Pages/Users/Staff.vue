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
            <app-staff :vans ="vans" :urls="urls" :pagetitle="pagetitle" :option="option"></app-staff>
        </div>
    </app-master> 
</template>

<script>
    import AppMaster from '@/Layouts/AppMaster'
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import AppStaff from '@/MyComponent/Users/AppStaff'

    export default {
        props:['vans','urls','pagetitle','option'],
        components: {
            AppLayout,
            AppMaster,
            Welcome,
            AppStaff
        },
    }
</script>