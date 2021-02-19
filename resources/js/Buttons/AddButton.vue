
<template>
    <a href="javascript:;" class="flex items-center text-theme-3 mr-3" @click="addButton()">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mx-auto"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>

        <slot></slot>
    </a>
</template>

<script>
    export default {
        name: "AddButton",
        data(){
            return {

            }
        },
        methods:{
            addButton(){
                this.$emit('addbtn');

                // appBus.fire('showbtn');
            },
        },

    }
</script>
