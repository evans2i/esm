

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="LEFT4CODE">

    <title>Login - School </title>

    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="/dist/css/app.css" />
    <style>
        .submitBtn {
          width: 99%;
          position: relative;
          background: linear-gradient(180deg, #3ce77b 0%, #0c1218 25%, #008eff 75%,#420E09 100% );
          border-radius: 15px;
          transition: 0.3s ease-in-out;
        }
    </style>
    {{-- <link rel="stylesheet" href="{{ asset('css/login.css') }}" /> --}}
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="/" class="-intro-x flex items-center pt-5">
                        <img alt="School" class="w-6" src="/dist/images/student-for-head.svg">
                        <span class="text-white text-xl ml-3"> S<span class="font-medium">chool</span></span>
                    </a>
                    <div class="my-auto">
                        <img  class="-intro-x w-1/2 -mt-16 " src="/dist/images/student-computer.svg">
                        <div class="border border-b border-gray dark:border-dark-5">
                            <div class="-intro-x text-white font-medium text-lg leading-tight mt-10">Welcome Sign in to Your Account And</div>
                            <div class="-intro-x mt-1 text-white text-xl text-center dark:text-gray-500">I Realy Promise</div>
                            <div class="-intro-x mt-1 text-white text-2xl text-right dark:text-gray-500">You Will Enjoy The Digital Life</div>
                        </div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-1 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-center">Sign In</h2>
                        <div class="intro-x mt-2 text-gray-500 xl:hidden text-xl text-center">Welcome  sign in to your account. Enjoy The Digital Life</div>
                        <div class="intro-x mt-8">
                            <form id="login-form">
                                <input type="text" id="input-email" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Email" >
                                <div id="error-email" class="login__input-error w-5/6 text-theme-6 mt-2"></div>
                                <input type="password" id="input-password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Password" >
                                <div id="error-password" class="login__input-error w-5/6 text-theme-6 mt-2"></div>
                            </form>
                        </div>

                        <div class="intro-x flex text-gray-700 dark:text-gray-600 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input type="checkbox" class="input border mr-2" id="input-remember-me">
                                <label class="cursor-pointer select-none" for="input-remember-me">Remember me</label>
                            </div>
                            <a href="#">Forgot Password?</a>
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button id="btn-login" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3 submitBtn align-top">Login</button>
                            {{-- <button id="btn-register" class="button button--lg w-full xl:w-32 text-gray-700 border border-gray-300 dark:border-dark-5 dark:text-gray-300 mt-3 xl:mt-0 align-top">Sign up</button> --}}
                        </div>
                      <div class="intro-x mt-10 xl:mt-24 text-gray-700 dark:text-gray-600 text-center xl:text-left">
                            Do You Want To Go Home <br>
                            <a href="/" class="text-theme-1 justify-end dark:text-theme-10" href="">Go Home</a>
                        </div>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>

        <!-- BEGIN: JS Assets-->
        <script src="/js/logincash.js"></script>
        <script>
            cash(function () {
                async function login() {
                    // Reset state
                    cash('#login-form').find('.input').removeClass('border-theme-6')
                    cash('#login-form').find('.login__input-error').html('')
                    // Post form
                    let email = cash('#input-email').val()
                    let password = cash('#input-password').val()
                    let rememberMe = cash('#input-remember-me').val()

                    // Loading state
                    cash('#btn-login').html('<i data-loading-icon="oval" data-color="white" class="w-5 h-5 mx-auto"></i>').svgLoader()

                    axios.post(`login`, {
                        email: email,
                        password: password,
                        remember_me: rememberMe
                    }).then(res => {
                        location.href = '/dashboard'
                    }).catch(err => {
                        cash('#btn-login').html('Login')
                        if (err.response.data.message != 'Wrong email or password.') {
                            for (const [key, val] of Object.entries(err.response.data.errors)) {
                                cash(`#input-${key}`).addClass('border-theme-6')
                                cash(`#error-${key}`).html(val)
                            }
                        } else {
                            cash(`#input-password`).addClass('border-theme-6')
                            cash(`#error-password`).html(err.response.data.message)
                        }
                    })
                }

                cash('#login-form').on('keyup', function(e) {
                    if (e.keyCode === 13) {
                        login()
                    }
                })

                cash('#btn-login').on('click', function() {
                    login()
                })

                // cash('#btn-register').on('click', function() {
                //     location.href = '/register'
                // })

            })
        </script>
    </body>

</html>
