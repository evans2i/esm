<template>
    <div class="pt-10">
        <div class=" px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <!--Left Col-->
            <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left ">
                <h1 class="uppercase tracking-loose font-bold my-0 w-full text-white text-3xl">{{van.institute}}</h1>
                <h3 class="my-4 text-3xl font-medium  text-gray-400 leading-tight">
                    <q v-if="van.salogan">{{van.salogan}}</q>
                    <q v-else>Performance Depend On Good Education and Love From Parents and Teachers</q>

                </h3>
                <div >
                    <p class="leading-normal text-white text-2xl mb-8">We Promise Your Child will be Better than Expected <img class="" class=""text-white src="/dist/images/iconmonstr-pencil-thin.svg" /></p>

                </div>
                <button class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    Subscribe
                </button>
            </div>
            <!--Right Col-->
            <div class="w-full md:w-3/5 py-6 text-center">
                <img class="w-full md:w-4/5 z-50" src="/organization/images/hero.png" />
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ViewOne",
        props: {
            van: {
                type: Object,
                required: true,
            },
        },
    }
</script>

<style scoped>

</style>
