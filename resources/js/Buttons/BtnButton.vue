<template>
    <button :type="normalizedSize" :class="[classUsed]" @click="actionApplied" ><slot></slot></button>
</template>

<script>
    export default {
        props: ['types','identity'],

        methods: {
            actionApplied(){
                this.$emit('applied')
            }
        },
        computed: {
            normalizedSize: function () {
                return this.types.trim().toLowerCase()
            },

            classUsed: function () {

                if(this.identity==="btn-primary"){
                       return "ml-3 button box flex items-center bg-theme-1 text-white"
                } else if(this.identity==="btn-secondary") {
                    return "ml-3 button box flex items-center text-gray-700 dark:text-gray-300"
                }else if(this.identity==="btn-success") {
                    return "ml-3 button box flex items-center text-gray-700 bg-theme-9 text-white"
                }else if(this.identity==="btn-warning") {
                    return "ml-3 button box flex items-center text-gray-700 bg-theme-12 text-white"
                }else if(this.identity==="btn-danger") {
                    return "ml-3 button box flex items-center text-gray-700 bg-theme-6 text-white"
                }else if(this.identity==="btn-dark") {
                    return "ml-3 button box flex items-center text-gray-700 bg-gray-200"
                }else {
                    return "ml-3 button box flex items-center text-gray-700 dark:text-gray-300"
                }

            }
        },

    }
</script>