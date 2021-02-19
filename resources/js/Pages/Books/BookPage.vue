<template>
    <app-master>

        <template #header> 
           <div class="-intro-x breadcrumb breadcrumb--light mr-auto"> 
                <a href="" class="">Application</a> 
                <i class="feather icon-chevron-right breadcrumb__icon" ></i> <a href="" class="breadcrumb--active">{{pagetitle}}</a> 
            </div>
        </template> 
        <template #navigation> </template> 
        <div class="py-12">
            <div class="p-5" id="input">
                <div class="preview">
                    <v-select label="title" :filterable="false" v-model="takeData"  :options="members" @search="onSearch"  @input="takeDataOFMember()">
                        <template slot="no-options">
                            type to search Member...
                        </template>
                        <template slot="option" slot-scope="option">
                            <div class="d-center">
                                {{ option.name }}-{{ option.reg_no }}
                            </div>
                        </template>
                    </v-select>

                </div>
            </div>
        </div>
    </app-master> 
</template>

<script>
    import AppMaster from '@/Layouts/AppMaster'
    import AppLayout from '@/Layouts/AppLayout'
    import BookList from '@/MyComponent/Library/BookList'

    export default {

    props:['pagetitle'],
        name: "BookPage",

        components: {
            AppLayout,
            AppMaster,
            BookList
        },

        data(){
            return {
                members:[],
                takeData:{},
            }
        },

        methods :{
            onSearch(search, loading) {
                if(search.length) {
                    loading(true);
                    this.search(loading, search, this);
                }
            },
            search: _.debounce((loading, search, vm) => {
                axios.get(`/users/findMemberData/${search}`)
                    .then(res => {
                        vm.members = res.data['student'].concat(res.data['staff']);
                        loading(false);
                    });
            }, 350),

            takeDataOFMember(){
                window.location = `/library/studentLibrary/${this.takeData.id}/${this.takeData.type}`;

            },
        }
    }
</script>