<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>404 page</title>
    <link rel="stylesheet" href="{{ asset('website/assets/css/404.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/@dannymichel/proxima-nova@4.5.2/index.min.css " rel="stylesheet" />
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
        }

        #notfound {
            position: relative;
            height: 100vh;
        }

        #notfound .notfound {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .notfound {
            max-width: 920px;
            width: 100%;
            line-height: 1.4;
            text-align: center;
            padding-left: 15px;
            padding-right: 15px;
        }

        .notfound .notfound-404 {
            position: absolute;
            height: 100px;
            top: 0;
            left: 50%;
            -webkit-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
            z-index: -1;
        }

        .notfound h2 {
            font-family: "Proxima Nova";
            font-size: 46px;
            color: #000;
            font-weight: 900;
            text-transform: uppercase;
            margin: 0px;
        }

        .notfound p {
            font-family: "Proxima Nova";
            font-size: 16px;
            color: #000;
            font-weight: 400;
            text-transform: uppercase;
            margin-top: 15px;
        }

        .notfound a {
            font-family: "Proxima Nova";
            font-size: 14px;
            text-decoration: none;
            text-transform: uppercase;
            display: inline-block;
            padding: 16px 38px;
            border: 2px solid transparent;
            border-radius: 40px;
            color: #fff;
            font-weight: 400;
            -webkit-transition: 0.2s all;
            transition: 0.2s all;
            background: linear-gradient(266deg, #EF4B4F -0.04%, #991F3D 72.43%);
        }

        .notfound .notfound-404 h1 {
            font-family: "Proxima Nova";
            color: #ececec;
            font-weight: 900;
            font-size: 276px;
            margin: 0px;
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>404</h1>
            </div>
            <h2>WE ARE SORRY, PAGE DOES NOT EXIST!</h2>
            <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
            <a class="backtohome" href="/">Back To Homepage</a>
        </div>
    </div>
</body>

</html>