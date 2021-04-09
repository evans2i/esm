<template>
    <app-fronted>
        <ViewFive/>
        <ViewThree/>
        <ViewTwo/>
    </app-fronted>
</template>

<script>
    import AppFronted from '@/Layouts/AppFronted';
    import ViewFive from '@/Layouts/Frontend/FrontView/ViewFour';
    import ViewTwo from '@/Layouts/SVGHelper/ViewTwo';
    import ViewThree from '@/Layouts/SVGHelper/VueUsable';
    import AboutPage from "@/Pages/Frontend/Components/AboutPage";
    export default {
        name: "Event",
        components: {
            AboutPage,
            AppFronted,
            ViewTwo,
            ViewThree,
            ViewFive
        },
        data() {
            return {
                van: {}
            }
        },

        created() {
            appBus.listen('generalsetting',(data) =>{
                this.van = data
            })
        }

    }
</script>

