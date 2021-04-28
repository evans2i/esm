<template>
    <ul class="border-t border-theme-24 py-5 hidden" style="display: none;">
        <li>
            <inertia-link href="/"  class="menu menu--active" >
                <div class="menu__icon"> <i class="feather icon-home"></i> </div>
                <div class="menu__title"> Home </div>
            </inertia-link>
        </li>
        <li>
            <inertia-link href="/not-found"  class="menu" >
                <div class="menu__title">Not Found</div>
            </inertia-link>
        </li>
        <li>
            <inertia-link href="/about-us"  class="menu" >
                <div class="menu__title">About Us</div>
            </inertia-link>
        </li>
        <li>
            <inertia-link href="/contact"  class="menu" >
                <div class="menu__title">Contact</div>
            </inertia-link>
        </li>
        <li >
            <a href="/login"  class="menu" >
                <div class="menu__title">Login</div>
            </a>
        </li>


    </ul>
</template>

<script>
    import Velocity from "velocity-animate";

    export default {
        name: "MobileVue",
        data() {
            return {
            }
        },
        mounted(){

            (function(cash) {
                "use strict";

                // Mobile Menu
                cash('#mobile-menu-toggler').on('click', function() {
                    if (cash('.mobile-menu').find('ul').first()[0].offsetParent !== null) {
                        Velocity(cash('.mobile-menu').find('ul').first(), "slideUp")
                    } else {
                        Velocity(cash('.mobile-menu').find('ul').first(), "slideDown")
                    }
                })

                cash('.mobile-menu').find('.menu').on('click', function() {
                    if (cash(this).parent().find('ul').length) {
                        if (cash(this).parent().find('ul').first()[0].offsetParent !== null) {
                            cash(this).find('.menu__sub-icon').removeClass('transform rotate-180')
                            Velocity(
                                cash(this).parent().find('ul').first(),
                                "slideUp",
                                {
                                    duration: 300,
                                    complete: function(el) {
                                        cash(this).removeClass('menu__sub-open')
                                    }
                                }
                            )
                        } else {
                            cash(this).find('.menu__sub-icon').addClass('transform rotate-180')
                            Velocity(
                                cash(this).parent().find('ul').first(),
                                "slideDown",
                                {
                                    duration: 300,
                                    complete: function(el) {
                                        cash(this).addClass('menu__sub-open')
                                    }
                                }
                            )
                        }
                    }
                })
            })(cash)

        }
    }
</script>

<style scoped>

</style>
