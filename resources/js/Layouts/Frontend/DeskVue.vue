<template>
    <ul  class="headering w-full justify-end  flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0  lg:bg-transparent text-black p-4 lg:p-0 z-20">
        <li>
            <a href="javascript:;" class="top-menu">
                <div class="top-menu__icon"> <i class="feather icon-book"></i> </div>
                <div class="top-menu__title"> Accademic <i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
            </a>
            <ul>
                <li class="text-center">
                    <h2 class="top-menu text-center text-3xl mt-5 top-menu__title">Accademic</h2>
                </li>

                <li>
                    <inertia-link href="#"  class="top-menu " >
                        <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                        <div class="top-menu__title">Assign Faculty/Class</div>
                    </inertia-link>
                </li>
                <li>
                    <inertia-link href="#"  class="top-menu" >
                        <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                        <div class="top-menu__title">Assign Subject</div>
                    </inertia-link>
                </li>

                <li>
                    <inertia-link href="#"  class="top-menu" >
                        <div class="top-menu__icon"> <i class="feather icon-user"></i></div>
                        <div class="top-menu__title">Examination Schedule</div>
                    </inertia-link>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="top-menu">
                <div class="top-menu__icon"> <i class="feather icon-book-open"></i> </div>
                <div class="top-menu__title"> Library <i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
            </a>
            <ul class="">
                <li class="text-center">
                    <h2 class="top-menu text-center text-3xl mt-5 top-menu__title">Library</h2>
                </li>
                <li>
                    <inertia-link href="#"  class="top-menu" >
                        <div class="top-menu__icon"> <i class="feather icon-user"></i></div>
                        <div class="top-menu__title">Staff</div>
                    </inertia-link>
                </li>

                <li>
                    <inertia-link href="#"  class="top-menu" >
                        <div class="top-menu__icon"> <i class="feather icon-plus"></i></div>
                        <div class="top-menu__title">Issue Books</div>
                    </inertia-link>
                </li>


                <li>
                    <inertia-link href="#"  class="top-menu" >
                        <div class="top-menu__icon"> <i class="feather icon-book"></i></div>
                        <div class="top-menu__title">All Books</div>
                    </inertia-link>
                </li>
                <li>
                    <inertia-link href="#"  class="top-menu" >
                        <div class="top-menu__icon"> <i class="feather icon-book"></i></div>
                        <div class="top-menu__title">Books Category</div>
                    </inertia-link>
                </li>

            </ul>
        </li>
        <li>
            <a href="javascript:;" class="top-menu">
                <div class="top-menu__icon"> <i class="feather icon-wind"></i> </div>
                <div class="top-menu__title"> Events <i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
            </a>
            <ul class="">
                <li class="text-center">
                    <h2 class="top-menu text-center text-3xl mt-5 top-menu__title">Events</h2>
                </li>
                <li>
                    <inertia-link href="#"  class="top-menu" >
                        <div class="top-menu__icon"> <i class="feather icon-user"></i></div>
                        <div class="top-menu__title">Comming Event</div>
                    </inertia-link>
                </li>
                <li>
                    <inertia-link href="#"  class="top-menu" >
                        <div class="top-menu__icon"> <i class="feather icon-user"></i></div>
                        <div class="top-menu__title">All Events</div>
                    </inertia-link>
                </li>

                <li>
                    <inertia-link href="#"  class="top-menu" >
                        <div class="top-menu__icon"> <i class="feather icon-plus"></i></div>
                        <div class="top-menu__title">Examination Event</div>
                    </inertia-link>
                </li>



            </ul>
        </li>
        <li>
            <inertia-link href="/about-us"  class="top-menu" style="cursor:pointer;" >
                <div class="top-menu__icon"> <i class="feather icon-smartphone"></i> </div>
                <div class="top-menu__title"> About Us </div>
            </inertia-link>
        </li>
        <li>
            <inertia-link href="/contact"  class="top-menu" style="cursor:pointer;" >
                <div class="top-menu__icon"> <i class="feather icon-smartphone"></i> </div>
                <div class="top-menu__title"> Contacts </div>
            </inertia-link>
        </li>
        <li>
            <inertia-link href="/"  class="top-menu" style="cursor:pointer;" >
                <div class="top-menu__icon"> <i class="feather icon-home"></i> </div>
                <div class="top-menu__title"> Home </div>
            </inertia-link>
        </li>
        <li>
            <!--top-menu--active -->
            <a href="/login"  class="top-menu" style="cursor:pointer;" >
                <div class="top-menu__icon"> <i class="feather icon-log-in"></i> </div>
                <div class="top-menu__title"> Login </div>
            </a>
        </li>
    </ul>
</template>

<script>
    export default {
        name: "DeskVue"
    }
</script>

<style scoped>

</style>
