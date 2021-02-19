<template>
    
        <ul class="pagination items-center " v-if="last => 1">
            <li v-show="isValueOne">
                <a class="pagination__link" href="javascript:;" @click.prevent="changeFunctionValue(first)" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left w-4 h-4"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg> </a>
            </li>
            <li v-show="isValueOne">
                <a class="pagination__link" href="javascript:;" @click.prevent="changeFunctionValue(previous)" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-4 h-4"><polyline points="15 18 9 12 15 6"></polyline></svg> </a>
            </li>
            <li> <a class="pagination__link" v-show="isValueOne"  href="javascript:;" @click.prevent="moveThirdToFirst()">...</a> </li>
            <template v-if="last >= 3">
            <li> <a class="pagination__link"  href="javascript:;"  @click="changeFunctionValue(valueOne)">{{valueOne}}</a> </li>
            <li > <a class="pagination__link pagination__link--active"  href="javascript:;" @click.prevent="changeFunctionValue(valueTwo)" >{{valueTwo}}</a> </li>
            <li> <a class="pagination__link"  href="javascript:;" @click.prevent="changeFunctionValue(valueThree)" >{{valueThree}}</a> </li>
            </template>
            <template v-if="last === 2">
            <li> <a class="pagination__link"  href="javascript:;"  @click="changeFunctionValue(valueOne)">{{valueOne}}</a> </li>
            <li > <a class="pagination__link pagination__link--active"  href="javascript:;" @click.prevent="changeFunctionValue(valueTwo)" >{{valueTwo}}</a> </li>
            </template>
            <template v-if="last === 1">
            <li > <a class="pagination__link pagination__link--active"  href="javascript:;" @click.prevent="changeFunctionValue(valueOne)" >{{valueOne}}</a> </li>
            </template>

            <li> <a class="pagination__link" v-show="isValueOne" href="javascript:;"  @click.prevent="moveFirstToThird()" >...</a> </li>
            <li v-show="isValueOne">
                <a class="pagination__link" href="javascript:;"  @click.prevent="changeFunctionValue(next)" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-4 h-4"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
            </li>
            <li v-show="isValueOne">
                <a class="pagination__link" href="javascript:;" @click.prevent="changeFunctionValue(last)" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right w-4 h-4"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg> </a>
            </li>
        </ul>

</template>

<script>


    export default {
        props:['totalData','dividerData'],
        components: {

        },
        data() {
            return {
                total:this.totalData,

                valueOne:1,
                valueTwo:2,
                valueThree:3,
                next:Number,
                previous:Number,
                last:Number,
                first:1,
                previousPage:"privious",
                nextPage: "next",
            }
        },

        methods: {

            changeFunctionValue(value){
                if(value===this.last && value > 2 ){this.checkLast(this.last);}
                else if(value===this.first && value !== this.valueOne){this.checkFirst(this.first);}
                else if(value===this.valueOne){this.changeValue(value)}
                else if(value===this.valueTwo){this.changeValue(value); }
                else if(value===this.valueThree){this.changeValue(value)}
                let i = value*this.dividerData;
                appBus.fire('paginated',i);

            },


            checkLast(value){
                this.valueOne=value-2;
                this.valueTwo=value-1;
                this.valueThree=value;
            },
            checkFirst(value){
                this.valueOne=value;
                this.valueTwo=value+1;
                this.valueThree=value+2;
            },

            changeValue(value){
                if(this.last === 1){
                }
                else if(this.last === 2){
                    this.valueOne=1;
                    this.valueTwo=2;
                }
                else if(value === 1){
                    this.valueOne=1;
                    this.valueTwo=2;
                    this.valueThree=3;
                }
                else if(value < this.valueTwo){
                    this.valueOne=value - 1;
                    this.valueTwo=value;
                    this.valueThree=value + 1;
                }
                else if(value > this.valueTwo){
                    this.valueOne=value - 1;
                    this.valueTwo=value;
                    this.valueThree=value + 1;
                }
                
            },

            moveFirstToThird(){
                if (this.valueThree + 3 <= this.last){
                    let value = this.valueThree + 2;
                    this.changeValue(this.valueThree + 2);
                    let i = value*this.dividerData;
                    appBus.fire('paginated',i);
                }
            },
            moveThirdToFirst(){
                if (this.valueOne - 3 >= 1){
                    let value = this.valueOne - 2;
                    this.changeValue(this.valueOne - 2);
                    let i = value*this.dividerData;
                    appBus.fire('paginated',i);
                }
            },
            

        },

        computed: {
            isValueOne(){ 
                this.last = Math.ceil(this.totalData/this.dividerData) 
                if(this.valueOne === 1 &&  this.last <=2){ 
                    return false;
                }
                return true; 
            },
        },

        // updated(){
        //     let i = 1*this.dividerData;
        //     appBus.fire('paginated',i);
        // },

        created() {
            appBus.listen('paginated-change',(datadiv)=>{
                    this.valueOne=1;
                    this.valueTwo=2;
                    this.valueThree=3;
                appBus.fire('paginated',datadiv);
            });  
        },
       
    }
</script>
