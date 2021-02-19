<template>
    <div class="grid grid-cols-1 gap-1 gap-1 lg:mt-5">
        <div class="intro-y box px-5 pt-5" >
            <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                <div class="flex flex-1 items-center justify-center lg:justify-start">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative border ">
                        <!-- rounded-full mx-auto  -->
                        <img alt="School One" class="rounded-full" src="/dist/images/profile-10.jpg">
                        <div class="absolute mb-1 mr-1 flex items-center bottom-0 right-0 bg-theme-1 rounded-full p-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera w-4 h-4 text-white"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg> </div>
                    </div>
                    <div class="ml-5">
                        <div class="truncate sm:whitespace-normal font-medium text-lg">{{ studentData.name }}</div>
                        <div class="text-gray-600">{{ studentData.reg_no }}</div>
                    </div>
                </div>
                <div class="flex mt-6 lg:mt-0 items-center lg:items-start flex-1 flex-col justify-center text-gray-600 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">
                    <div class="truncate sm:whitespace-normal flex font-medium text-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user mx-auto"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>{{ studentData.name }}</div>
                    <div class="truncate sm:whitespace-normal flex items-center"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail w-4 h-4 mr-2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> {{ studentData.email }}</div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram w-4 h-4 mr-2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg> {{ studentData.reg_no }} </div>
                    <!-- <div class="truncate sm:whitespace-normal flex items-center mt-3"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter w-4 h-4 mr-2"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg> Twitter Kevin Spacey </div> -->
                </div>
                <div class="mt-6 lg:mt-0 flex-1 px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 pt-5 lg:pt-0">
                    <div class="font-medium text-center lg:text-left lg:mt-5">Current Class</div>
                    <div class="flex items-center justify-center lg:justify-start mt-2">
                        <!-- <span class="ml-3 font-medium text-theme-9"> </span> -->
                        <div class="mr-2 w-20 flex"> {{ studentData.facultyName }} </div>
                        <div class="w-32 lg:w-40"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas class="simple-line-chart-1 chartjs-render-monitor" height="80" width="320" style="display: block; width: 160px; height: 40px;"></canvas>
                        </div>
                    </div>
                    <div class="flex items-center justify-center lg:justify-start">
                        <div class="mr-2 w-20 flex"> {{ studentData.semesterName }}</div>
                        <div class="w-32 lg:w-40"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas class="simple-line-chart-2 chartjs-render-monitor" height="80" width="320" style="display: block; width: 160px; height: 40px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </div>

</template>

<script>
    export default {
        props:['studentData'],
        name: "StudentShow",
    }
</script>

<style scoped>

</style>
