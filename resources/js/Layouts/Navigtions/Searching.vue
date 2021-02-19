<template>
    <div class="intro-x relative mr-3 sm:mr-6">
        <div class="search hidden sm:block">
            <input type="text" class="search__input input dark:bg-dark-1 placeholder-theme-13" placeholder="Search...">
            <i class="feather icon-search search__icon dark:text-gray-300" ></i>
        </div>
        <a class="notification notification--light sm:hidden" href=""> <i class="feather icon-search notification__icon dark:text-gray-300"></i> </a>
        <div class="search-result">
            <div class="search-result__content">
                <div class="search-result__content__title">Pages</div>
                <div class="mb-5">
                    <a href="" class="flex items-center">
                        <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full"> <i class="feather icon-inbox w-4 h-4"></i> </div>
                        <div class="ml-3">Mail Settings</div>
                    </a>
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full"> <i class="feather icon-users w-4 h-4"></i> </div>
                        <div class="ml-3">Users & Permissions</div>
                    </a>
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full"> <i class="feather icon-credit-card w-4 h-4"></i> </div>
                        <div class="ml-3">Transactions Report</div>
                    </a>
                </div>
                <div class="search-result__content__title">Users</div>
                <div class="mb-5">
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/dist/images/profile-9.jpg">
                        </div>
                        <div class="ml-3">Johnny Depp</div>
                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">johnnydepp@left4code.com</div>
                    </a>
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/dist/images/profile-5.jpg">
                        </div>
                        <div class="ml-3">Robert De Niro</div>
                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">robertdeniro@left4code.com</div>
                    </a>
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/dist/images/profile-15.jpg">
                        </div>
                        <div class="ml-3">Hugh Jackman</div>
                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">hughjackman@left4code.com</div>
                    </a>
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/dist/images/profile-6.jpg">
                        </div>
                        <div class="ml-3">Denzel Washington</div>
                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">denzelwashington@left4code.com</div>
                    </a>
                </div>
                <div class="search-result__content__title">Products</div>
                <a href="" class="flex items-center mt-2">
                    <div class="w-8 h-8 image-fit">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/dist/images/preview-8.jpg">
                    </div>
                    <div class="ml-3">Nike Air Max 270</div>
                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Sport &amp; Outdoor</div>
                </a>
                <a href="" class="flex items-center mt-2">
                    <div class="w-8 h-8 image-fit">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/dist/images/preview-11.jpg">
                    </div>
                    <div class="ml-3">Nikon Z6</div>
                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Photography</div>
                </a>
                <a href="" class="flex items-center mt-2">
                    <div class="w-8 h-8 image-fit">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/dist/images/preview-10.jpg">
                    </div>
                    <div class="ml-3">Oppo Find X2 Pro</div>
                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Smartphone &amp; Tablet</div>
                </a>
                <a href="" class="flex items-center mt-2">
                    <div class="w-8 h-8 image-fit">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/dist/images/preview-11.jpg">
                    </div>
                    <div class="ml-3">Sony Master Series A9G</div>
                    <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">Electronic</div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Searching"
    }
</script>

<style scoped>

</style>
