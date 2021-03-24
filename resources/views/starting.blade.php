<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title></title>
    <link rel="stylesheet" href="/dist/css/app.css" />
    <link href="/css/app.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <style>
        .gradient { background: linear-gradient(90deg, blue 0%, #daacef 100%); }
    </style>
    @routes
</head>
<body class="font-sans antialiased text-white gradient" >
        @inertia
        <script src="/js/mobile-menu.js"></script>
        <script src="/js/frontapp.js"></script>
        <!-- jQuery if you need it
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        -->
        <script>
            var scrollpos = window.scrollY;
            var header = document.querySelectorAll(".headering");
            var toToggle = document.querySelectorAll(".toggleColour");

            document.addEventListener("scroll", function () {
                scrollpos = window.scrollY;

                if (scrollpos > 10) {

                    for (let i = 0; i < header.length; i++) {
                        header[i].classList.add("gradient");
                        header[i].classList.add("text-white");
                        header[i].classList.add("shadow");
                    }
                    //Use to switch toggleColour colours
                    for (let i = 0; i < toToggle.length; i++) {
                        toToggle[i].classList.add("text-gray-800");
                        toToggle[i].classList.remove("text-white");
                    }
                } else {

                    for (let i = 0; i < toToggle.length; i++) {
                        toToggle[i].classList.add("text-white");
                        toToggle[i].classList.remove("text-gray-800");
                    }
                    for (let i = 0; i < header.length; i++) {
                        header[i].classList.remove("shadow");
                        header[i].classList.remove("gradient")
                        header[i].classList.remove("text-white");
                    }
                    ;
                }
            });
        </script>
</body>
</html>

