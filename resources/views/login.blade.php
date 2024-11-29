<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Login Page</title>
</head>

<body style="height: 100vh">
    <header class="bg-primary h-25 rounded p-3">
        @include('layouts.navbar')
        <h2 class="text-center fst-italic text-white mt-5">Login Page</h2>
    </header>

    <main class="bg-secondary mt-3 p-3 h-75">
        <form class="h-75 d-flex flex-column p-2 align-items-center" action="{{route('login')}}" method="POST">
            @csrf
            <h3 class="text-center text-white fst-italic">Enter Your Credentials</h3>

            {{-- Email Section --}}
            <div class="mb-3 w-25">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                @error('email')
                {{$message}}
                @enderror
            </div>

            {{-- Password Section --}}
            <div class="mb-3 w-25">
                <label for="inputPassword5" class="form-label">Password</label>
                <input type="password" name="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
                @error('password')
                {{$message}}
                @enderror
            </div>

            {{-- Submit Section --}}
            <input class="btn-success btn w-25" type="submit" value="Login">

        </form>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
