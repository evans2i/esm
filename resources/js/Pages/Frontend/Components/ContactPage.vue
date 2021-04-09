<template>

            <div class="border-b pt-20">

                <div class="border-b pt-20 mx-auto flex flex-wrap pb-0 max-w-screen-xl grid gap-8 grid-cols-1 md:grid-cols-2 bg-gray-100 text-gray-900 shadow-lg">
                    <div class="flex flex-col justify-between">
                        <div>
                            <h2 class="text-2xl lg:text-3xl text-center font-bold leading-tight">Lets Discuss about everything!</h2>
                            <div class="text-gray-700 w-full text-center mt-8 text-xl">
                                Send us an <span class="underline"> <a :href="`mailto:${van.email}`">Email</a> </span> instead.
                            </div>

                            <h3 class="text-2xl ml-5 lg:text-xl text-start font-medium pt-2 leading-tight" >Phone :{{van.phone}} </h3>
                            <h3 class="text-2xl ml-5 lg:text-xl text-start font-medium pt-2 leading-tight" >email :{{van.email}} </h3>
                            <h3 class="text-2xl ml-5 lg:text-xl text-start font-medium pt-2 leading-tight" >Whatsapp :{{van.whatsapp}} </h3>
                            <h3 class="text-2xl ml-5 lg:text-xl text-start font-medium pt-2 leading-tight" >Address :{{van.address}} </h3>
                        </div>
                        <div class="text-center flex">
                            <FullContact/>
                        </div>
                    </div>
                    <div class="">
                        <div>
                            <span class="uppercase text-sm text-gray-600 font-bold">Full Name</span>
                            <input v-model="form.name" class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="text" placeholder="" required>
                        </div>
                        <div class="mt-8">
                            <span class="uppercase text-sm text-gray-600 font-bold">Email</span>
                            <input id="contactemail" @blur="validateEmail" v-model="form.email" class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" type="text" required>
                        </div>
                        <div class="mt-8">
                            <span class="uppercase text-sm text-gray-600 font-bold">Message</span>
                            <textarea v-model="form.note" class="w-full h-32 bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline" required></textarea>
                        </div>
                        <div class="mt-8">
                            <button :disabled="isDisabled" @click="submitContact" class="uppercase text-sm font-bold tracking-wide bg-indigo-500 text-gray-100 p-3 rounded-lg w-full focus:outline-none focus:shadow-outline">
                                Send Message
                            </button>
                        </div>
                    </div>
                </div>
            </div>





</template>

<script>
    import FullContact from '@/Layouts/SVGHelper/FullContact';
    export default {
        name: "ContactPage",
        props: {
            van: {
                type: Object,
                required: true,
            },
        },
        components: {
            FullContact,
        },

        data() {
            return {
                checkEmail :false,
                form : new Form({
                    name: "",
                    email: "",
                    note: "",
                }),

            }
        },

        methods: {
            submitContact() {
                this.form.post('institute/contact').then((data)=>{
                    Swal.fire("Thank You",`We Have received, We will Contact You If it Need Response`,'success')
                    this.form.reset();
                }).catch(e=>{
                    Swal.fire("I'm sorry I Can not Process Data",`${e.message}`,'error');
                })
            },
            // isImailValid(){
            //     if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(this.form.email))
            //
            // },
            validateEmail() {
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.form.email)) {
                    this.checkEmail= true;
                    contactemail.classList.remove("text-red");
                    contactemail.classList.remove("border");
                    contactemail.classList.remove("border-theme-6");
                } else {
                    let contactemail = document.getElementById('contactemail');
                    contactemail.classList.add("text-red");
                    contactemail.classList.add("border");
                    contactemail.classList.add("border-theme-6");
                    this.checkEmail= false;
                }
            }
        },

        computed: {
            isDisabled() {
                return !this.form.name || !this.form.email || !this.form.note;
            },

        },



    }
</script>

<style scoped>

</style>
