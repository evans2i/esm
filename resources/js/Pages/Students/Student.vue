<template>
    <div class="grid grid-cols-12 gap-6">
        <div v-if="$role.IsStudent()" class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6" >
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg  font-medium truncate mr-5">
                    General Report for <u class="block mt-1 font-extrabold">{{$page.user.name}}</u>
                </h2>
                <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10">
                    <i class="feather icon-refresh-ccw w-4 h-4 mr-3"></i>Refresh
                </a>
            </div>
        </div>


    </div>
</template>

<script>
    import BtnButton from '@/Buttons/BtnButton'
    import TotalSummary from "@/Pages/Reusable/TotalSummary";
    import SummaryData from "@/Pages/Reusable/SummaryData";

    export default {
        props: {
            vans: {
                type: Object,
                required: false
            },
        },
        components: {
            SummaryData,
            TotalSummary,
            BtnButton,
        },
        data() {
            return {


            }
        },

        methods: {


        },

        computed: {

        },
        mounted() {

        },
        created() {
        }
    }
</script>
