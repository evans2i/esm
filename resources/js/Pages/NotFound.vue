<template>
    <app-fronted>
        <div class="pt-20">
            <div class="px-3 items-center flex justify-center">
                <!--Left Col-->
                <div class="page404 justify-self-center">
                  <img class="mx-auto" src="/dist/images//404.png">
                    <h2 class="my-4 text-3xl font-medium  text-gray-400 leading-tight">Page not found</h2>
                    <p class="my-6 text-xl font-medium  text-gray-900">I'm Sorry..... ! Seems You are Looking for Something I dont have..</p>

                    <inertia-link href="/" class="mx-auto mt-20 button lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-8 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                        Go to Home
                    </inertia-link>

                </div>
            </div>
        </div>
        <ViewTwo></ViewTwo>
    </app-fronted>
</template>

<script>
    import AppFronted from "@/Layouts/AppFronted";
    import ViewTwo from '@/Layouts/Frontend/FrontView/ViewTwo'

    export default {
        name: "NotFound",
        components: {
            AppFronted,
            ViewTwo,
        },
    }
</script>

<style scoped>

</style>
