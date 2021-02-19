<template>
    <div class="col-span-12 mt-8">
        <div class="intro-y flex items-center h-10">
            <h2 class="text-lg  font-medium truncate mr-5">
                General Report for <u class="block mt-1 font-extrabold">{{staff.name}}</u>
            </h2>
            <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10">
                <i class="feather icon-refresh-ccw w-4 h-4 mr-3"></i>Reload Data
                <!-- <i class="feather icon-refresh-ccw" class="w-4 h-4 mr-3"></i>   -->
            </a>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in justify-center">
                    <div class="box p-5 justify-center">
                        <div class="text-3xl font-bold leading-8 mt-6 text-center">{{maximum}}</div>
                        <div class="text-base text-gray-600 mt-1 text-center">Maximum Allowed</div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in justify-center">
                    <div class="box p-5 justify-center">
                        <div class="text-3xl font-bold leading-8 mt-6 text-center">{{issued}}</div>
                        <div class="text-base text-gray-600 mt-1 text-center">Issued Books</div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in justify-center">
                    <div class="box p-5 justify-center">
                        <div class="text-3xl font-bold leading-8 mt-6 text-center">{{findRemaining}}</div>
                        <div class="text-base text-gray-600 mt-1 text-center">Eligible</div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in justify-center">
                    <div class="box p-5 justify-center">
                        <div class="text-3xl font-bold leading-8 mt-6 text-center">{{total}}</div>
                        <div class="text-base text-gray-600 mt-1 text-center">Transactions</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="nav-tabs flex flex-col sm:flex-row justify-center lg:justify-start">
            <a data-toggle="tab" @click="changeToggleView('profile')" data-target="#dashboard" href="javascript:;" class="py-4 sm:mr-8 active">PROFILE</a>
            <a data-toggle="tab" @click="changeToggleView('takenbook')" data-target="#account-and-profile" href="javascript:;" class="py-4 sm:mr-8">BOOK TAKEN - {{issued}}</a>
            <a data-toggle="tab" @click="changeToggleView('givebook')" data-target="#activities" href="javascript:;" class="py-4 sm:mr-8">
                <div class="feather icon-add"></div>ISSUE BOOK</a>
            <a data-toggle="tab" @click="changeToggleView('totaltaken')" data-target="#tasks" href="javascript:;" class="py-4 sm:mr-8">HISTORY - {{total}}</a>
        </div>
        <staff-show v-show="profile" :studentData="staff"></staff-show>

        <book-taken v-show="takenbook" :bookTaken="bookTaken" :member="libmember" ></book-taken>

        <issue-staff v-show="givebook" :member="libmember"></issue-staff>

        <book-taken v-show="totaltaken" :bookTaken="books" :member="libmember" ></book-taken>
    </div>
</template>

<script>
    import StaffShow from "@/Customers/StaffShow";
    import BookTaken from "@/MyComponent/Library/Student/BookTaken";
    import IssueStaff from '@/MyComponent/Library/Student/IssueStaff';
    export default {
        components: {StaffShow,BookTaken,IssueStaff},
        props:['vans','urls','pagetitle'],
        name: "DetailStudent",

        data(){
            return{
                libmember: this.vans.libmember,
                staff: this.vans.member.data,
                bookTaken: this.vans.issuedBooks.data,
                books: this.vans.totalBooks.data,
                issued : this.vans.issued,
                total: this.vans.total,
                maximum : 20,


                totaltaken:false,
                givebook:false,
                takenbook:false,
                profile:false,
            }
        },

        methods:{
            changeToggleView(value){
                this.clearedToggle();
                if (value ==="profile"){
                    this.profile = true;
                }
                if (value ==="takenbook"){
                    this.takenbook = true;
                }
                if (value ==="givebook"){
                    this.givebook = true;
                }
                if (value ==="totaltaken"){
                    this.totaltaken = true;
                }
            },
          clearedToggle(){
              this.totaltaken = false;
              this.givebook = false;
              this.takenbook = false;
              this.profile = false;
          },

          changingValueOfData(data){
              this.issued -= 1;
              let arry = this.books;
              let tr = arry.indexOf(data[0])
              arry.splice(tr, 1,data[1]);
              this.books = arry;
          }
        },

        computed:{
            findRemaining(){
                return this.maximum-this.issued;
            }
        },

        created(){
            this.profile = true;
            appBus.listen('book-taken',this.changingValueOfData);
        }
    }
</script>

<style scoped>

</style>
