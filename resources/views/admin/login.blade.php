<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('panel/css/SignInSignup.css') }}" />
    {{--
    <link rel="stylesheet" href="./css/style.css" /> --}}
    <link rel="stylesheet" href="{{ asset('panel/css/style.css') }}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
</head>

<body>
    <section class="login-signup-section">
        <div class="login-signup-container">
            <div class="headerLog">
                <img src="{{ asset('website/assets/logo/logo.png') }}" alt="" class="instImg" />
                <!-- <h1 class="text-white"><b>College Vorti</b></h1> -->
                <h6 class="InstTitle">Admin Login</h6>
            </div>

            <form action="{{ url('admin/login') }}" method="post" name="admin_login" id="admin_login" class="form"
                novalidate>
                @csrf

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(Session::has('error_message'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('error_message')}}
                </div>
                @endif
                @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif


                <!-- not -->
                <div class="form-group">
                    <div class="input-group border">
                        <div class="input-group-prepend border-right">
                            <span class="input-group-text">
                                <span class="material-symbols-outlined"> mail </span>
                            </span>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                            value="{{ old('email') }}" required />
                    </div>
                </div>
                <label id="email-error" class="error" for="email" style="color:red;"></label>

                <div class="form-group">
                    <div class="input-group border">
                        <div class="input-group-prepend border-right">
                            <span class="input-group-text">
                                <span class="material-symbols-outlined">lock</span>
                            </span>
                        </div>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter your password" value="{{ old('password') }}" required />
                        <div class="input-group-prepend border-left">
                            <span class="input-group-text" id="togglePassword">
                                <span class="material-symbols-outlined"> visibility_off</span>
                            </span>
                        </div>
                    </div>
                    <label id="password-error" class="error" for="password" style="color:red;"></label>
                </div>

                <div class="form-group">
                    <div class="input-group border">
                        <div class="input-group-prepend border-right">
                            <span class="input-group-text" id="icon">
                                <span class="material-symbols-outlined">robot</span>
                            </span>
                        </div>
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <span id="num1"></span> + <span id="num2"></span>=
                            </span>
                        </div>
                        <input type="text" id="robotAnswer" name="robotAnswer" class="form-control" />
                        <div class="input-group-prepend border-left" id="refresh-btn">
                            <span class="input-group-text">
                                <span class="material-symbols-outlined">refresh</span>
                            </span>
                        </div>
                    </div>
                    <p id="result-message" style="color: red; display: none">
                        Incorrect answer. Please try again.
                    </p>
                    <label id="robotAnswer-error" class="error" for="robotAnswer" style="color:red;"></label>
                </div>

                <!-- <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="remember-container" id="remembarbtn">
                        <input type="checkbox" id="rememberCheckbox" /> Remember Me
                    </div>
                    <a href="{{ route('admin.forgotPassword') }}" class="forgotPassword">Forgot Password?</a>
                </div> -->

                <!--done  -->
                <button type="submit" class="login-btn">Sign In</button>
            </form>
        </div>
    </section>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
    integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
    crossorigin="anonymous"></script>

<script src="{{ asset('panel/js/admin.js') }}"></script>



</html>