<template>

        <div class="p-5 border-t flex">
            <button type="button" v-show="!editmode" :disabled="isDisabled" @click="cancelD" class="button button--sm border block text-dark">Reset Form</button>
            <button type="button" v-show="editmode" :disabled="isDisabled" @click="cancelU" class="button button--sm border block  text-dark">Cancel Update</button>
            <button type="submit" v-show="!editmode" :disabled="isDisabled" class="button button--sm border text-white dark:border-dark-5 bg-theme-1 dark:text-gray-300 ml-auto">Submit Data</button>
            <button v-show="editmode" type="submit" :disabled="isDisabled" class="button button--sm border text-white dark:border-dark-5 bg-theme-1 dark:text-gray-300 ml-auto">Update changes</button>
        </div>

</template>

<script>
    export default {
        props:{
            editmode:{
                type: Boolean,
                required: true,
            },
            isDisabled: {
                type: Boolean,
                required:true
            },
            cancelD:{
                type: Function,
                required:true
            },
            cancelU:{
                type: Function,
                required:true
            },
        },
        name: "SubmitLink"
    }
</script>

<style scoped>

</style>
