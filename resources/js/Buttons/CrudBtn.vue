<template>
    <div class="flex">
        <template v-if="spinning" class="flex lg:justify-center items-center mr-3">
            <a v-if="isToEdit" href="javascript:;" class="flex items-center mr-3 ml-3" @click="editFunction()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Edit
            </a>
            <a v-if="isToDelete" href="javascript:;" class="flex items-center text-theme-6 ml-3 mr-3" @click="deleteFunction()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete
            </a>
        </template>

        <template v-else class="flex lg:justify-center items-center">
            <svg width="30" viewBox="0 0 45 45" xmlns="http://www.w3.org/2000/svg" stroke="rgb(45, 55, 72)" class="w-8 h-8">
                <g fill="none" fill-rule="evenodd" transform="translate(1 1)" stroke-width="3">
                    <circle cx="22" cy="22" r="6" stroke-opacity="0">
                        <animate attributeName="r" begin="1.5s" dur="3s" values="6;22" calcMode="linear" repeatCount="indefinite"></animate>
                        <animate attributeName="stroke-opacity" begin="1.5s" dur="3s" values="1;0" calcMode="linear" repeatCount="indefinite"></animate>
                        <animate attributeName="stroke-width" begin="1.5s" dur="3s" values="2;0" calcMode="linear" repeatCount="indefinite"></animate>
                    </circle>
                    <circle cx="22" cy="22" r="6" stroke-opacity="0">
                        <animate attributeName="r" begin="3s" dur="3s" values="6;22" calcMode="linear" repeatCount="indefinite"></animate>
                        <animate attributeName="stroke-opacity" begin="3s" dur="3s" values="1;0" calcMode="linear" repeatCount="indefinite"></animate>
                        <animate attributeName="stroke-width" begin="3s" dur="3s" values="2;0" calcMode="linear" repeatCount="indefinite"></animate>
                    </circle>
                    <circle cx="22" cy="22" r="8">
                        <animate attributeName="r" begin="0s" dur="1.5s" values="6;1;2;3;4;5;6" calcMode="linear" repeatCount="indefinite"></animate>
                    </circle>
                </g>
            </svg>
        </template>
    </div>

</template>

<script>
    export default {
        props: ['deletegate', 'editgate'],

        data(){
            return {
                deleteMode:false,
                editMode:false,
                spinning:true,
                id:this.value
            }
        },
        methods:{
            deleteFunction(){
                this.spinning = !this.spinning;
                this.$emit('delete',this.id);
            },
            editFunction(){
                this.$emit('edit');
            }
        },

        computed: {
            isToDelete(){
                if(this.deletegate === 'delete'){
                    return !this.deleteMode
                }
            },

            isToEdit(){
                if(this.editgate === 'edit'){
                    return !this.editMode
                }
            }
        }
    }
</script>