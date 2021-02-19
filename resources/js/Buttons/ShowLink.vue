<template>
    <inertia-link :href="href" class="flex items-center text-theme-3 ml-3" >
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye mx-auto"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
        <template><slot></slot></template>
    </inertia-link>
</template>

<script>
    export default {
        props: {
            href: {
                type: String,
                default: "/"
            },
        },
        name: "ShowLink"
    }
</script>

<style scoped>

</style>
