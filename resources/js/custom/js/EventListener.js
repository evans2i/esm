// 
import Vue from 'vue';
export default class appBus {
        constructor() {
            this.vue = new Vue();
        }

        fire(event, data = null){
            this.vue.$emit(event, data)
        }

        listen(event, data = null){
            this.vue.$on(event, data)
        }
    }


    
