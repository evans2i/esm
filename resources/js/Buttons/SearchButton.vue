<template>
    <a href="javascript:;" class="flex items-center text-theme-3 mr-3" @click="findButton()">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search mx-auto"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        <slot></slot>
    </a>
</template>

<script>
    export default {
        methods:{
            findButton(){
                this.$emit('searchbtn');
            },
        },

    }
</script>