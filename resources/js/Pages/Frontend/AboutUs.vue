<template>
    <app-fronted>
        <about-page :van="van"/>
        <ViewThree/>
        <ViewTwo/>
    </app-fronted>
</template>

<script>
    import AppFronted from '@/Layouts/AppFronted';
    import ViewTwo from '@/Layouts/SVGHelper/ViewTwo';
    import ViewThree from '@/Layouts/SVGHelper/VueUsable';
    import AboutPage from "@/Pages/Frontend/Components/AboutPage";
    export default {
        name: "AboutUs",
        components: {
            AboutPage,
            AppFronted,
            ViewTwo,
            ViewThree,
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
