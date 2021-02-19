<template>
    <button :type="type" :class="identity" @click="printTable('printTable')"><slot></slot></button>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                default:'button'
            },
            identity: {
                type: String,
            }
        },
    }
</script>