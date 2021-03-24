<template>
    <ul class="border-t border-theme-24 py-5 hidden" style="display: none;">
        <li>
            <inertia-link href="/dashboard"  class="menu menu--active" >
                <div class="menu__icon"> <i class="feather icon-home"></i> </div>
                <div class="menu__title"> Dashboard </div>
            </inertia-link>
        </li>
        <li>
            <inertia-link href="/accountant/quickReceiveFee"  class="menu" >
                <div class="menu__title">Quick Receive Fee</div>
            </inertia-link>
        </li>
        <li>
            <inertia-link href="/accountant/feeCollections"  class="menu" >
                <div class="menu__title">Collect Fee</div>
            </inertia-link>
        </li>
        <li>
            <inertia-link href="/accountant/feeMasters"  class="menu" >
                <div class="menu__title">Heloo</div>
            </inertia-link>
        </li>
        <li >
            <inertia-link href="/login"  class="menu" >
                <div class="menu__title">Login</div>
            </inertia-link>
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
