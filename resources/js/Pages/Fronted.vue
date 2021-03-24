
<template>
    <app-fronted>
        <view-one :van="van"></view-one>
        <ViewTwo></ViewTwo>


    </app-fronted>
</template>

<script>
    import AppFronted from '@/Layouts/AppFronted'
    import ViewOne from '@/Layouts/Frontend/FrontView/ViewOne'
    import ViewTwo from '@/Layouts/Frontend/FrontView/ViewTwo'
    import ViewThree from '@/Layouts/Frontend/FrontView/ViewThree'

    export default {
        name: "Fronted",
        components: {
            AppFronted,
            ViewOne,
            ViewTwo,
            ViewThree
        },
        props: {
            van: {
                type: Object,
                required: true,
            },
            urls:{
                type:String,
                required:true,
            }
        },




    }
</script>

