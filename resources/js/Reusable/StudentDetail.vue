<template>
    <div class="container mx-auto my-5 px-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->

            <!-- Right Side -->
            <div class="w-full md:w-12/12 mx-2 h-auto">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-green-400 item-center">
                    <div class="image overflow-hidden item-center">
                        <img class="h-24 w-24 rounded-full mx-auto" :src="`/organization/${school.logo}`" alt="">
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1 text-center">{{school.institute}}</h1>
                    <h3 class="text-gray-600 font-lg text-semibold leading-6 text-center">{{school.phone}} - {{school.email}}</h3>

                </div>
                <!-- End of profile card -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm justify-center">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide text-center">Student  {{student.name}}</span>
                    </div>

                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Class/Faculty</div>
                                <div class="px-4 py-2">{{student.facultyName}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Semister/Term</div>
                                <div class="px-4 py-2">{{student.semesterName}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Gender</div>
                                <div class="px-4 py-2">{{student.gender}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Contact No.</div>
                                <div class="px-4 py-2">{{ student.home_phone }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Current Address</div>
                                <div class="px-4 py-2">{{ student.address }}</div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email.</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800" :mail="student.email">{{student.email}}</a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Birthday</div>
                                <div class="px-4 py-2">{{student.date_of_birth}}</div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Age</div>
                                <div class="px-4 py-2">{{student.age}}</div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End of about section -->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['student'],
        name: "StudentDetail",
        data() {
            return {
                school:{},
            }
        },
        methods: {
            getSchoolData(){
                axios.get(`/generalSetting`).then((res)=>{ this.school = res.data; })
            },
        },
    }
</script>

<style scoped>

</style>
