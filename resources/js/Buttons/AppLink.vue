<template>
    <a :class="classes" class="w-full" v-if="as == 'button'">
        <slot></slot>
    </a>

    <inertia-link :href="href" :class="classes" v-else>
        <slot></slot>
    </inertia-link>
</template>

<script>
    export default {
        props: ['active', 'href', 'as'],

        computed: {
            classes() {
                if(this.active==="logout"){
                    return "flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"
                } else if(this.active==="btn-secondary") {
                    return "ml-3 button box flex items-center text-gray-700 dark:text-gray-300"
                }else if(this.active==="btn-success") {
                    return "ml-3 button box flex items-center text-gray-700 bg-theme-9 text-white"
                }else if(this.active==="btn-warning") {
                    return "ml-3 button box flex items-center text-gray-700 bg-theme-12 text-white"
                }else if(this.active==="btn-danger") {
                    return "ml-3 button box flex items-center text-gray-700 bg-theme-6 text-white"
                }else if(this.active==="btn-dark") {
                    return "ml-3 button box flex items-center text-gray-700 bg-gray-200"
                }else {
                    return "ml-3 button box flex items-center text-gray-700 dark:text-gray-300"
                }
            }
        }
    }
</script>

<style scoped>

</style>
