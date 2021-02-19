<template>

</template>

<script>
    export default {
        name: "LeftButton"
    }
</script>

<style scoped>

</style>

<template>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-0 lg:mt-5  sm:mt-3 mt-5">
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button v-show="addingFee" @click="printableFullDetail('printablefull')" class="button text-white shadow-md mr-2 bg-purple-400" >Print Data</button>
            <button v-show="addingFee" @click="changeToViewStudent" class="button text-white shadow-md mr-2" :class="addingTheme" >{{ txtDiplay }}</button>
        </div>
    </div>

</template>

<script>
    export default {
        props:[],
        name: "LeftButton"
    }
</script>

<style scoped>

</style>

