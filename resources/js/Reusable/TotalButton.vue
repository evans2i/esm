<template>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-0 lg:mt-5  sm:mt-3 mt-5">
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0 mr-auto">
            <template v-for="head in headerDetail.left" >
                <inertia-link v-if="head.type == 'links'" :href="head.modalink"  class="button text-white shadow-md mr-2 bg-purple-400" >{{head.name}}</inertia-link>
                <button v-else-if="head.type == 'modal'" @click="$modal.show(`${head.modalink}`)"  class="button text-white shadow-md mr-2 bg-purple-400" >{{head.name}}</button>
                <button v-else-if="head.type == 'toggle'" @click="head.modalink"  class="button text-white shadow-md mr-2 bg-purple-400" >{{head.name}}</button>
                <h3 class="text-xl font-medium mr-auto text-big" v-else>{{head.name}}</h3>
            </template>
        </div>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0 ml-auto">
            <template v-for="head in headerDetail.right" >
                <inertia-link v-if="head.type == 'links'" :href="head.modalink"  class="button text-white shadow-md mr-2 bg-purple-400" >{{head.name}}</inertia-link>
                <button v-else-if="head.type == 'modal'" class="button text-white shadow-md mr-2 bg-purple-400" >{{head.name}}</button>
                <button v-else-if="head.type == 'toggle'" @click="head.modalink"  class="button text-white shadow-md mr-2 bg-purple-400" >{{head.name}}</button>
            </template>
        </div>
    </div>
</template>


<script>
    export default {
        props:['headerDetail'],
        name: "TotalButton"
    }
</script>

<style scoped>

</style>

