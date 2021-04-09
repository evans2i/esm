<template>
    <div id="app">
        <div class="headering fixed w-full mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="toggleColour flex mr-auto">
                    <img alt="School" class="w-6" src="/dist/images/logo.svg">
                </a>
                <div class="block lg:hidden pr-4">
                    <button id="mobile-menu-toggler" class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                        <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Menu</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                        </svg>
                    </button>
                </div>
            </div>
            <mobile-vue/>
        </div>
        <!--Nav-->
        <nav class="headering w-full fixed top-nav top-0 text-white">
            <desk-vue/>
            <hr class="border-b border-gray-100 opacity-25 my-0 py-0 pr-4" />
        </nav>

            <slot></slot>
            <!--Footer-->
        <footer-front :van="van"/>

    </div>
</template>

<script>
    import MobileVue from "@/Layouts/Frontend/MobileVue";
    import DeskVue from "@/Layouts/Frontend/DeskVue";
    import FooterFront from "@/Layouts/Frontend/FooterFront";
    export default {
        name: "AppFronted",
        components: {FooterFront,DeskVue, MobileVue},


        data() {
            return {
                van: {},
                error:"",
            }
        },

        created() {
            axios.get(`/generalSetting`)
                 .then((data)=>{
                    this.van = data.data;
                    appBus.fire('generalsetting',data.data)
                 }).catch((e)=>{ this.error = e.message; });
        },

        mounted() {
            var scrollpos = window.scrollY;
            var header = document.querySelectorAll(".headering");
            var toToggle = document.querySelectorAll(".toggleColour");

            document.addEventListener("scroll", function () {
                scrollpos = window.scrollY;

                if (scrollpos > 10) {

                    for (let i = 0; i < header.length; i++) {
                        header[i].classList.add("gradient");
                        header[i].classList.add("text-white");
                        header[i].classList.add("shadow");
                    }
                    //Use to switch toggleColour colours
                    for (let i = 0; i < toToggle.length; i++) {
                        toToggle[i].classList.add("text-gray-800");
                        toToggle[i].classList.remove("text-white");
                    }
                } else {

                    for (let i = 0; i < toToggle.length; i++) {
                        toToggle[i].classList.add("text-white");
                        toToggle[i].classList.remove("text-gray-800");
                    }
                    for (let i = 0; i < header.length; i++) {
                        header[i].classList.remove("shadow");
                        header[i].classList.remove("gradient")
                        header[i].classList.remove("text-white");
                    }
                    ;
                }
            });
        }
    }

</script>

<style scoped>
    .gradient {
        background: linear-gradient(90deg, blue 0%, #A258DA 100%);
    }
</style>
