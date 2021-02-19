<template>
    <div>
        
        <h2 class="text-lg font-medium mr-auto">
            Profile Layout
        </h2>

        <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: Profile Menu -->
            
            <!-- END: Profile Menu -->
            <div class="col-span-12 lg:col-span-6 xxl:col-span-6  flex lg:block flex-col-reverse">
                <!-- BEGIN: Daily Sales -->
                <div class="intro-y box lg:mt-5">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Daily Sales
                        </h2>
                        <div class="dropdown ml-auto sm:hidden">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700 dark:text-gray-300"></i> </a>
                            <div class="dropdown-box w-40">
                                <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                                    <a href="javascript:;" class="flex items-center p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Excel </a>
                                </div>
                            </div>
                        </div>
                        <button class="button border relative flex items-center text-gray-700 dark:border-dark-5 dark:text-gray-300 hidden sm:flex"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Excel </button>
                    </div>
                    <div class="p-5">
                        <div class="relative flex items-center">
                            <div class="w-12 h-12 flex-none image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/dist/images/profile-4.jpg">
                            </div>
                            <div class="ml-4 mr-auto">
                                <a href="" class="font-medium">Al Pacino</a> 
                                <div class="text-gray-600 mr-5 sm:mr-5">Bootstrap 4 HTML Admin Template</div>
                            </div>
                            <div class="font-medium text-gray-700 dark:text-gray-500">+$19</div>
                        </div>
                        <div class="relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/dist/images/profile-8.jpg">
                            </div>
                            <div class="ml-4 mr-auto">
                                <a href="" class="font-medium">Brad Pitt</a> 
                                <div class="text-gray-600 mr-5 sm:mr-5">Tailwind HTML Admin Template</div>
                            </div>
                            <div class="font-medium text-gray-700 dark:text-gray-500">+$25</div>
                        </div>
                        <div class="relative flex items-center mt-5">
                            <div class="w-12 h-12 flex-none image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/dist/images/profile-9.jpg">
                            </div>
                            <div class="ml-4 mr-auto">
                                <a href="" class="font-medium">Nicolas Cage</a> 
                                <div class="text-gray-600 mr-5 sm:mr-5">Vuejs HTML Admin Template</div>
                            </div>
                            <div class="font-medium text-gray-700 dark:text-gray-500">+$21</div>
                        </div>
                    </div>
                </div>
                <!-- END: Daily Sales -->
            </div>

            <div class="col-span-12 lg:col-span-6 xxl:col-span-6">
                <div class="intro-y box mt-5">
                    <div class="relative flex items-center p-5">
                        <div class="w-12 h-12 image-fit">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/dist/images/profile-4.jpg">
                        </div>
                        <div class="ml-4 mr-auto">
                            <div class="font-medium text-base">Al Pacino</div>
                            <div class="text-gray-600">Backend Engineer</div>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700 dark:text-gray-300"></i> </a>
                            <div class="dropdown-box w-56">
                                <div class="dropdown-box__content box dark:bg-dark-1">
                                    <div class="p-4 border-b border-gray-200 dark:border-dark-5 font-medium">Export Options</div>
                                    <div class="p-2">
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="activity" class="w-4 h-4 text-gray-700 dark:text-gray-300 mr-2"></i> English </a>
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                            <i data-feather="box" class="w-4 h-4 text-gray-700 dark:text-gray-300 mr-2"></i> Indonesia 
                                            <div class="text-xs text-white px-1 rounded-full bg-theme-6 ml-auto">10</div>
                                        </a>
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="layout" class="w-4 h-4 text-gray-700 dark:text-gray-300 mr-2"></i> English </a>
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="sidebar" class="w-4 h-4 text-gray-700 dark:text-gray-300 mr-2"></i> Indonesia </a>
                                    </div>
                                    <div class="px-3 py-3 border-t border-gray-200 dark:border-dark-5 font-medium flex">
                                        <button type="button" class="button button--sm bg-theme-1 text-white">Settings</button>
                                        <button type="button" class="button button--sm bg-gray-200 text-gray-600 dark:bg-dark-5 dark:text-gray-300 ml-auto">View Profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                        <a class="flex items-center text-theme-1 dark:text-theme-10 font-medium" href=""> <i data-feather="activity" class="w-4 h-4 mr-2"></i> Personal Information </a>
                        <a class="flex items-center mt-5" href=""> <i data-feather="box" class="w-4 h-4 mr-2"></i> Account Settings </a>
                        <a class="flex items-center mt-5" href=""> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Change Password </a>
                        <a class="flex items-center mt-5" href=""> <i data-feather="settings" class="w-4 h-4 mr-2"></i> User Settings </a>
                    </div>
                    <div class="p-5 border-t flex">
                        <button type="button" class="button button--sm block bg-theme-1 text-white">New Group</button>
                        <button type="button" class="button button--sm border text-gray-700 dark:border-dark-5 dark:text-gray-300 ml-auto">New Quick Link</button>
                    </div>
                </div>
            </div>


        </div>
    </div>
</template>

<script>

    import JetButton from '@/Jetstream/Button'
    import BtnButton from '@/Buttons/BtnButton'

    export default {
        components: {
            JetButton,
            BtnButton,
        },
        data() {
            return {
                
            }
        },

        methods: {
          openModal(){
            console.log("evans")
             this.$modal.show('superlarge-modal-size-preview');
          }
            
        },

        computed: {
          
        }
    }
</script>