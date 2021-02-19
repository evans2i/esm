<template>
    <!-- BEGIN: Weekly Best Sellers -->
    <div class="col-span-12 xl:col-span-4 mt-6">
        <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">
                {{title}}
            </h2>
        </div>
        <div class="mt-5">
            <div class="intro-y" v-for="(van,index) in vans">
                <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                    <div class="ml-4 mr-auto">
                        <div v-if="van.first_name" class="font-medium">{{van.first_name}} {{van.last_name}}</div>
                        <div v-else-if="van.title"  class="font-medium">{{van.title}}</div>
                        <div v-else  class="font-medium">{{title}}</div>
                        <div v-if="van.join_date" class="text-gray-600 text-xs">{{van.join_date | myDateF}}</div>
                        <div v-else-if="van.reg_date" class="text-gray-600 text-xs">{{van.reg_date | myDateF}}</div>
                        <div v-else-if="van.code" class="text-gray-600 text-xs">{{van.isbn_number }}| {{ van.publish_year | myDateF}}</div>
                        <div v-else class="text-gray-600 text-xs"></div>
                    </div>
                </div>
            </div>
            <inertia-link :href="link" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-theme-15 dark:border-dark-5 text-theme-16 dark:text-gray-600">View {{title}}</inertia-link>
        </div>
    </div>
    <!-- END: Weekly Best Sellers -->
</template>

<script>
    export default {
        props: ['vans','title','link'],
        name: "SummaryData"
    }
</script>

<style scoped>

</style>
