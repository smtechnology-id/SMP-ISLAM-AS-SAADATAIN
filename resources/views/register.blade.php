<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Register || SMP ISLAM PLUS AS-SA’ADATAIN">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Register || SMP ISLAM PLUS AS-SA’ADATAIN</title>
    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../../assets/plugins/pace/pace.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="../../assets/css/main.min.css" rel="stylesheet">
    <link href="../../assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/LOGO-SMP-ASSDAT.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/LOGO-SMP-ASSDAT.png') }}" />

</head>

<body>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="{{ route('index') }}">Register Account || SMP ISLAM PLUS AS-SA’ADATAIN</a>
            </div>
            <p class="auth-description">Please sign-in to your account and continue to the dashboard.</p>
            @if (session('success'))
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-primary"><i class="material-icons-outlined">done</i></div>
                    <div class="alert-content">
                        <span class="alert-title">{{ session('success') }}</span>
                    </div>
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-warning"><i class="material-icons-outlined">error</i></div>
                    <div class="alert-content">
                        <span class="alert-title">{{ session('error') }}</span>
                    </div>
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-warning"><i class="material-icons-outlined">error</i></div>
                    <div class="alert-content">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>
                </div>
                @endif
            <form action="{{ route('registerPost') }}" method="post">
                @csrf
                <div class="auth-credentials m-b-xxl">
                    <label for="signInEmail" class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control m-b-md" id="signInEmail" aria-describedby="signInEmail"
                        placeholder="Nama Lengkap">
                    <label for="signInPassword" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="signInPassword" aria-describedby="signInPassword"
                        placeholder="Email">
                    <label for="signInPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="signInPassword" aria-describedby="signInPassword"
                        placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                    <label for="signInPassword" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="signInPassword" aria-describedby="signInPassword"
                        placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                </div>

                <div class="auth-submit">
                    <button class="btn btn-primary" type="submit">Register</button>
                    <a href="{{ route('index') }}" class="auth-forgot-password float-end btn btn-outline-primary">Sudah Punya Akun?</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="{{ asset('assets/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
</body>

</html>
