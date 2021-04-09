<template>
    <app-fronted>
        <contact-page :van="van"/>
        <ViewThree/>
        <ViewTwo/>
    </app-fronted>
</template>

<script>
    import AppFronted from '@/Layouts/AppFronted'
    import ContactPage from '@/Pages/Frontend/Components/ContactPage'
    // import ViewOne from '@/Layouts/Frontend/FrontView/ViewSix'
    import ViewTwo from '@/Layouts/SVGHelper/ViewTwo'
    import ViewThree from '@/Layouts/SVGHelper/VueUsable'
    import ColourOne from '@/Layouts/SVGHelper/ColourOne'
    export default {
        name: "Contact",
        components: {
            AppFronted,
            ContactPage,
            ViewTwo,
            ViewThree,
            ColourOne
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
