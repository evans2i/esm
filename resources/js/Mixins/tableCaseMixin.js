export default {

    data() {
        return {
            currentData:[],
            searchQuery:"",

            valueOne:1,
            valueTwo:2,
            valueThree:3,

            next:Number,
            previous:Number,
            last:Number,
            first:1,
            previousPage:"privious",
            nextPage: "next",

            initdivider:0,
            dividerData:5,

            initNo:0,
            currentNo:5,
            lastDivider :5
        }
    },

    methods: {

        dataToDisplay(value){
            this.initNo = (value-this.dividerData);
            this.currentNo = value;
        },

        searchFilterData(data){
            this.angs = data;
            appBus.fire('data-search-show',this.dividerData);
        },

        searchDataInTable(){
            const arrData = this.vangs;
            let searchQuery= event.target.value;
            let searchStr = searchQuery.toLowerCase();

            this.currentData=[];
            let m =false;
            arrData.forEach(obj => {
                let matches = Object.entries(obj).filter(([i, v]) =>{
                    m =false;
                    if(v !== null && isNaN(v) && v !== undefined && !Array.isArray(v) && typeof v !== 'object'){
                        v= v.toLowerCase();
                        if(v.includes(searchStr)){
                            m = true;
                        }
                    }if(m){return true;}
                });
                if (matches === undefined || matches.length == 0) {
                }else{
                    this.currentData.push(obj);
                }
            });
            appBus.fire('search-filter',this.currentData);
            // appBus.fire('paginated');
        },

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

        dividerDataChange(){
            // appBus.fire('paginated-change',this.dividerData)
            let dataNow= 0;
            let remainder = 0;
            let nowDa = 0;
            let lookLast = Math.ceil(this.findingLength / this.dividerData);
            if (this.currentNo > this.dividerData) {
                remainder = this.currentNo % this.dividerData;
                dataNow = Math.ceil(this.currentNo / this.dividerData);
                if (dataNow > 2){
                    if (dataNow >= lookLast && lookLast > 2) {
                        this.valueOne=lookLast-2;
                        this.valueTwo=lookLast-1;
                        this.valueThree=lookLast;

                    }
                     else {
                        this.valueOne=dataNow-1;
                        this.valueTwo=dataNow;
                        this.valueThree=dataNow+1;

                    }
                }else {
                    this.valueOne=1;
                    this.valueTwo=2;
                    this.valueThree=3;
                }
            }else if (this.currentNo < this.dividerData) {
                dataNow = 1;
                remainder = 0;
                this.valueOne=1;
                this.valueTwo=2;
                this.valueThree=3;
            }else if (this.currentNo = this.dividerData) {
                remainder = 0;
                dataNow = 1;
                this.valueOne=1;
                this.valueTwo=2;
                this.valueThree=3;
            }
            if(this.dividerData < this.findingLength){
                nowDa = Math.ceil( this.valueOne * this.dividerData) + eval(this.dividerData);
            }else{
                nowDa = Math.ceil( this.valueOne * this.dividerData);
            }
            appBus.fire('paginated',nowDa);

        },

    },

    computed: {
        // dataDisplaying(){
        //     return this.angs.slice(this.initdivider,this.dividerData);
        // }

        isValueOne(){
            this.last = Math.ceil(this.findingLength/this.dividerData)

            if(this.valueOne === 1 &&  this.last <=2){
                return false;
            }
            return true;
          },


    },

    created() {
        // appBus.listen('paginated-change',(datadiv)=>{
        //         this.valueOne=1;
        //         this.valueTwo=2;
        //         this.valueThree=3;
        //     appBus.fire('paginated',datadiv);
        // });
    },
}
