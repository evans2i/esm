<template>
    <div>

        <div class="intro-y flex flex-col sm:flex-row items-center mt-3">
            <h1 class="text-lg font-medium mr-auto">
                {{pagetitle}}
            </h1>
        </div>
        <div class="intro-y flex flex-col sm:flex-row items-center mt-0 lg:mt-2  sm:mt-2 mt-2">
            <h4 class="text-lg font-medium mr-auto">{{ headingValue }} </h4>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <button class="button text-white shadow-md mr-2" :class="addingTheme" @click="changeViews">{{ txtDiplay }}</button>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-1 lg:mt-5">
            <div class="intro-y box">
                <schedule-table :vans="vans"  urls="urls" v-show="tableshow"></schedule-table>
                <add-mark :vans ="vans" :urls="urls" :pagetitle="pagetitle" :option="option" v-show="!tableshow"></add-mark>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-1" >
    
        </div>

    </div>
</template>

<script>
    import ScheduleTable from '@/MyComponent/Examination/ExamTable'
    import AddMark from '@/MyComponent/Examination/AddMark'



    export default {
        props:['vans','urls','pagetitle','option'],
        components: {
            ScheduleTable,
            AddMark,
        },

        data() {
            return {
                tableshow:true,
                txtDiplay:"Add Examination Marks",
                headingValue: "Filter To View Marks",
                addingTheme:"bg-theme-1",
            }
        },

        methods: {
            changeViews(){
                this.tableshow = !this.tableshow;
                if(this.tableshow === true){
                    this.addingTheme = "bg-theme-1";
                    this.headingValue= "Filter To View Marks";
                    this.txtDiplay = "Add Examination Marks";
                }else{
                    this.txtDiplay = "Display Examination Marks"
                    this.headingValue= "Please Filter To Add Marks"
                    this.addingTheme = "bg-theme-1"
                }
            },


        },
}
</script>

<style lang="stylus" scoped>

</style>
