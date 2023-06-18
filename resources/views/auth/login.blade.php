<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="180x180" href="/images/icons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/images/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/images/icons/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/images/icons/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="/images/icons/favicon.ico">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-config" content="/images/icons/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder login-gradient text-gradient">Welcome back</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" role="form" id="loginForm">
                        @csrf
                        <label for="cpf">{{ __('CPF') }}</label>
                        <div class="mb-3">
                            <input id="cpf" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus>
                            @error('cpf')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label for="password">{{ __('Password') }}</label>
                        <div class="mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="rememberMe">{{ __('Remember Me') }}</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn text-white bg-gradient-login w-100 mt-4 mb-0 g-recaptcha" 
                              data-sitekey="{{ config('services.recaptcha.key') }}" 
                              data-callback='onSubmit' 
                              data-action='submit'>
                              Sign in</button>
                        </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 d-flex align-center item-center">
                <img src="/images/logo.svg" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
          <a href="https://github.com/ebarrosjr/joaodebarro" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-github"></span>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © {{ date("Y") }} eBarrosJr
          </p>
        </div>
      </div>
    </div>
  </footer>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <script>
    function onSubmit(token) {
      document.getElementById("loginForm").submit();
    }
 </script>
</body>
</html>