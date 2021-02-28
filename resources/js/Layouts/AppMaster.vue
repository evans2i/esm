<template>
    <div class="app">
        <!-- BEGIN: Mobile Menu -->
        <mobile-link></mobile-link>
        <!-- END: Mobile Menu -->
        <!-- BEGIN: Top Bar -->
        <div class="border-b border-theme-600 -mt-10 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 pt-3 md:pt-0 mb-10">
            <div class="top-bar-boxed flex items-center">
                <!-- BEGIN: Logo -->
                <a href="" class="-intro-x hidden md:flex">
                    <img alt="Shool Logo" class="w-4 bg-white w-10 h-10 rounded-full overflow-hidden shadow-lg" src="/dist/images/book-and-pen.svg">
                    <span class="text-white text-lg ml-3"> Sch<span class="font-medium">ool</span> </span>
                </a>
                <!-- END: Logo -->
                <!-- BEGIN: Breadcrumb -->
                    <slot name="header"></slot>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Search -->
                        <app-searching></app-searching>
                    <!-- END: Search -->

                    <!-- BEGIN: Notifications -->
                        <app-notification></app-notification>
                    <!-- END: Notifications -->

                    <!-- BEGIN: Account Menu -->
                        <account-settings></account-settings>
                    <!--  <portal-target name="profile-setting"></portal-target>-->
                <!-- END: Account Menu -->
            </div>
        </div>
        <!-- END: Top Bar -->
        <!-- BEGIN: Top Menu -->
        <nav class="top-nav">
            <app-links></app-links>
        </nav>
        <!-- END: Top Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <slot></slot>
        </div>
        <portal-target name="modal" multiple> </portal-target>
   </div>
</template>


<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'
    import JetApplicationMark from '@/Jetstream/ApplicationMark'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetNavLink from '@/Jetstream/NavLink'
    import AppBtnLink from '@/Buttons/BtnLink'
    import AppLinks from '@/Layouts/Navigtions/Links'
    import AppSearching from '@/Layouts/Navigtions/Searching'
    import AppNotification from '@/Layouts/Navigtions/Notification'
    import AccountSettings from '@/Layouts/Navigtions/AccountSettings'
    import MobileLink from '@/Layouts/Navigtions/MobileLink'

    export default {
        components: {
            JetApplicationLogo,
            JetApplicationMark,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            AppBtnLink,
            AppLinks,
            AppSearching,
            AppNotification,
            AccountSettings,
            MobileLink
        },

        data() {
            return {

            }
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(route('current-team.update'), {
                    'team_id': team.id
                }, {
                    preserveState: false
                })
            },
        },
        computed: {
            path() {
                return window.location.pathname
            }
        },
        created (){
            if(this.$page.user === null){
                window.location ='/login';
            }
        }
    }
</script>
