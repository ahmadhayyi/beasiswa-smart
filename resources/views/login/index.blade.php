<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan - Login</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="/dashboard/css/login.css" rel="stylesheet">
    <link rel="shortcut icon" href="/dashboard/img/logo-mv.ico" type="image/x-icon">
</head>

<body class="text-center">
    <main class="form-signin">
        <form action="{{ route('login') }}" method="post">
            @csrf @method('post')
            @include('dashboard.components.alert')
            <h1 class="h3 mb-5 fw-normal">Please Sign In</h1>
            <div class="form-floating">
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                    id="username" placeholder="Username" value="{{ old('username') }}" autofocus required>
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                    required>
                <label for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            {{-- <p class="my-3">Belum mempunyai akun? <a class="text-decoration-none" href="/dashboard/register">daftar
                    sekarang</a></p> --}}
            <p class="my-4 text-muted"><small>Beasiswa Apps</small></p>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
