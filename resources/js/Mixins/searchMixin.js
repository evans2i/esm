export default {

    data() {
        return {
            currentData:[],
            searchQuery:"",
        }
    },

    methods: {
        searchDataInTable(){
            const arrData = this.angs;
            let searchQuery= event.target.value;
            let searchStr = searchQuery.toLowerCase();

            console.log(searchQuery);
            this.currentData=[];
            let m =false;
            arrData.forEach(obj => {
                let matches = Object.entries(obj).filter(([i, v]) =>{
                    m =false;
                    if(v !== null && isNaN(v) && v !== undefined){
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
        }

        
    },
}