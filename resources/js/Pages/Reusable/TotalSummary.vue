<template>
    <div class="col-span-12 mt-8">
        <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">
                General Report
            </h2>
            <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10">
                <i class="feather icon-refresh-ccw w-4 h-4 mr-3"></i>Refresh
                <!-- <i class="feather icon-refresh-ccw" class="w-4 h-4 mr-3"></i>   -->
            </a>
        </div>
        <div  class="grid grid-cols-12 gap-6 mt-5">
            <inertia-link :href="data4.link" class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i class="feather icon-shopping-cart report-box__icon text-theme-20 w-10 h-10"></i>
                            <div class="ml-auto">
                            </div>
                        </div>
                        <div class="text-3xl font-bold leading-8 mt-6">{{data1.count}}</div>
                        <div class="text-base text-gray-600 mt-1">{{data1.name}}</div>
                    </div>
                </div>
            </inertia-link>
            <inertia-link :href="data2.link" class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i class="feather icon-credit-card report-box__icon text-theme-11" ></i>

                        </div>
                        <div class="text-3xl font-bold leading-8 mt-6">{{data2.count}}</div>
                        <div class="text-base text-gray-600 mt-1">{{data2.name}}</div>
                    </div>
                </div>
            </inertia-link>
            <inertia-link :href="data3.link"  class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i class="feather icon-monitor report-box__icon text-theme-12" ></i>

                        </div>
                        <div class="text-3xl font-bold leading-8 mt-6">{{data3.count}}</div>
                        <div class="text-base text-gray-600 mt-1">{{data3.name}}</div>
                    </div>
                </div>
            </inertia-link>
            <inertia-link :href="data4.link"  class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i class="feather icon-user report-box__icon text-theme-9"></i>

                        </div>
                        <div class="text-3xl font-bold leading-8 mt-6">{{data4.count}}</div>
                        <div class="text-base text-gray-600 mt-1">{{data4.name}}</div>
                    </div>
                </div>
            </inertia-link>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data1','data2','data3','data4'],

        name: "TotalSummary",
    }
</script>

<style scoped>

</style>
