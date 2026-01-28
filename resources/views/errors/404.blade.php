<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>404 page</title>
    <link rel="stylesheet" href="{{ asset('website/assets/css/style.css') }}" />

    <link rel="icon" href="{{ asset('website/assets/icons/favicon/favicon.ico') }}" type="image/x-icon" />
    <link rel="icon" href="{{ asset('website/assets/icons/favicon/Monogram.png') }}" sizes="32x32" />
    <link rel="icon" href="{{ asset('website/assets/icons/favicon/Monogram.png') }}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{ asset('website/assets/icons/favicon/Monogram.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
        body {
            padding: 0;
            margin: 0;
            background: #E32636;
        }

        #notfound {
            position: relative;
            height: 100vh;
            text-align: center;
        }

        #notfound .notfound {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .notfound p {
            font-size: 40px;
            color: #fff;
        }

        .notfound a {
            outline: none;
            background: #F9FDFF;
            border-radius: 191.313px;
            width: 300px;
            height: 70px;
            display: inline-block;

            font-size: 25px;
            line-height: 70px;
            text-decoration: none;

            font-family: 'Poppins', sans-serif;
            color: #000;

        }

        @media screen and (max-width: 1024px) {
            #notfound .notfound {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                width: 100%;
                max-width: 600px;
            }

            .notfound p {
                font-size: 28px;
            }

            .notfound img {
                max-width: 350px;
            }

            .notfound p {
                font-size: 24px;
            }

            .notfound a {
                width: 200px;
                height: 50px;
                line-height: 50px;
                font-size: 18px;
            }

        }

        @media (max-width: 480px) {
            .notfound img {
                max-width: 250px;
            }
        }
    </style>
</head>

<body>
    <div id="notfound">
        <div class="notfound">

            <img src="{{ asset('website/assets/images/404-eye-animation.gif') }}" alt="404 Image">

            <p>Your curiosity led you to an undiscovered page.</p>
            <a href="/">Homepage</a>
        </div>
    </div>
</body>

</html>