<template>
    <footer class="bg-white">
        <div class=" mx-auto px-8">
            <div class="w-full flex flex-col md:flex-row py-6">
                <div class="flex-1 mb-6 text-black">
                    <a class="text-pink-600 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
                        <svg class="h-8 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.005 512.005">
                            <rect fill="#2a2a31" x="16.539" y="425.626" width="479.767" height="50.502" transform="matrix(1,0,0,1,0,0)" />
                            <path
                                class="plane-take-off"
                                d=" M 510.7 189.151 C 505.271 168.95 484.565 156.956 464.365 162.385 L 330.156 198.367 L 155.924 35.878 L 107.19 49.008 L 211.729 230.183 L 86.232 263.767 L 36.614 224.754 L 0 234.603 L 45.957 314.27 L 65.274 347.727 L 105.802 336.869 L 240.011 300.886 L 349.726 271.469 L 483.935 235.486 C 504.134 230.057 516.129 209.352 510.7 189.151 Z "
                            />
                        </svg>
                        LANDING
                    </a>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Links</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="/not-found" class="no-underline hover:underline text-gray-800 hover:text-pink-500">FAQ</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="/not-found" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Help</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="/not-found" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Support</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Legal</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Terms</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Privacy</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Social</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a :href="van.facebook" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Facebook</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a :href="van.linkedin" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Linkedin</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a :href="van.twiter" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Twitter</a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Company</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <inertia-link href="/official-blog" style="cursor:pointer;" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Official Blog</inertia-link>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <inertia-link href="/about-us" style="cursor:pointer;" class="no-underline hover:underline text-gray-800 hover:text-pink-500">About Us</inertia-link>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <inertia-link href="/contact" style="cursor:pointer;" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Contact</inertia-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        name: "FooterFront",
        props: {
            van: {
                type: Object,
                required: true,
            },
        },
    }
</script>

<style scoped>

</style>
