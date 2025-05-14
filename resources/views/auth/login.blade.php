<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('admin/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('admin/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/pages/auth.css') }}">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo" style="margin-bottom: 2rem">
                        <a href="index.html"><img src="{{asset('images/logo.png')}}" alt="Logo"
                                style="height: 50%;width: 50%;"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <form method="POST" action="{{ route('logins') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            {{-- <input type="text" class="form-control form-control-xl" placeholder="Username"> --}}
                            <input id="email" type="email" placeholder="Email"
                                class="form-control form-control-xl @error('email') is-invalid  @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if(session('error'))
                                <div class="alert alert-danger" role="alert" id="errorMessage">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left">
                            <input id="password" type="password"
                                class="form-control form-control-xl @error('password') is-invalid @enderror"
                                placeholder="Password" name="password" required autocomplete="current-password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>

    </div>
</body>

</html>
<!-- Add an empty div to display the error message -->
{{-- <div id="errorMessage" class="alert alert-danger" style="display: none;"></div> --}}

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var errorMessage = "{{ session('error') }}";

        if(errorMessage) {
            document.getElementById("errorMessage").innerText = errorMessage;
            document.getElementById("errorMessage").style.display = "block";
        }
        setTimeout(function() {
            document.getElementById("errorMessage").style.display = "none";
        }, 3000);
    });
</script>
