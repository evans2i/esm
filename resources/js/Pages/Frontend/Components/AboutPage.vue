<template>
    <div class="pt-14">
        <section class="bg-white border-b py-8 md:rounded-t-lg rounded-t-lg">
            <div class=" max-w-5xl mx-auto m-1">
                <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                    Title
                </h1>
                <div class="w-full mb-4">
                    <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
                </div>
                <div class="flex flex-wrap">
                    <div class="w-5/6 sm:w-1/2 p-1">
                        <h3 class="text-3xl text-gray-800 font-bold leading-none text-3xl mb-3">
                            Vision Of Our School
                        </h3>
                        <p class="text-gray-600 text-2xl mb-2">
                            {{van.vision}}
                        </p>

                        <p class="text-gray-600 mb-2 text-2xl">
                            If there is any more You wish to Add
                        </p>

                    </div>
                    <div class="w-full sm:w-1/2 p-1">
                        <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                            Mission
                        </h3>
                        <p class="text-gray-600 mb-2 text-3xl">
                            {{van.mission}}
                        </p>
                        <p class="text-gray-600 mb-2 text-2xl">
                            Any More Mission of the School
                        </p>


                    </div>
                </div>
                <div class="flex flex-wrap flex-col-reverse sm:flex-row">
                    <div class="w-full sm:w-1/2 p-6 mt-6">
                        <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">

                        </h3>


                    </div>
                    <div class="w-full sm:w-1/2 p-6 mt-6">
                        <div class="align-middle">

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import ViewSix from '@/Layouts/Frontend/FrontView/ViewSix';
    export default {
        name: "AboutPage",
        props: {
            van: {
                type: Object,
                required: true,
            },
        },
        components: {
            ViewSix,
        },

        data() {
            return {
                form : new Form({
                    name: "",
                    email: "",
                    note: "",
                }),

            }
        },

        methods: {

        },

        computed: {


        },


    }
</script>

<style scoped>

</style>
