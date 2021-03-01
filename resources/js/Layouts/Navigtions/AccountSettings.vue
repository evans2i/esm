<template>
    <div class="intro-x dropdown w-8 h-8">
        <div @click="isYes = !isYes" class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110">
            <img :alt="$page.user.email" src="/dist/images/profile-9.jpg">
        </div>
        <!-- <portal to="profile-setting"></portal> -->
            <div class="upddown-box w-56" :class="{'show':isYes}">
                <div class="upddown-box__content box bg-theme-38 dark:bg-dark-6 text-white">
                    <div class="p-4 border-b border-theme-40 dark:border-dark-3">
                        <div class="font-medium">{{ $page.user.name }}</div>
                        <div class="text-xs text-theme-41 dark:text-gray-600">{{ $page.user.email }}</div>
                    </div>
                    <div class="p-2 border-t border-theme-40 dark:border-dark-3">
                        <form method="POST" @submit.prevent="logout">
                            <app-btn-link active="logout" as="button">
                                <i class="feather icon-toggle-right w-4 h-4 mr-2"></i> Logout
                            </app-btn-link>
                        </form>
                    </div>
                </div>
            </div>
    </div>



</template>

<script>
    import AppBtnLink from '@/Buttons/BtnLink'
    export default {
        name: "AccountSettings",
        components: {
            AppBtnLink,
        },

        data(){
            return {
               isYes: false,
            }
        },

        methods:{
            logout() {
                axios.post(url('logout').secure_url()).then(response => {
                    window.location = '/login';
                })
            },
        }
    }
</script>

<style scoped>


</style>
