<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Register Page</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    {{-- Select2 CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
                $('.js-example-basic-single').select2();
        });
    </script>

    <script src="https://www.google.com/recaptcha/api.js"></script>

</head>

<body style="">
    <header class="h-25 bg-primary p-3 m-1">
        @include('layouts.navbar')
        <h2 class="text-center fst-italic text-white mt-5">Register Page</h2>
    </header>

    <main class="h-75 m-1 p-3 bg-secondary">
        <form action="{{route('register')}}" method="POST"
            class="h-75 d-flex flex-column p-2 align-items-center" id="recaptchaForm">
            @csrf
            <h3 class="text-white fst-italic">Enter Your Info</h3>

            {{-- Name Section --}}
            <div class="m-3 w-25">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                    placeholder="Enter Your Name">
                @error('name')
                {{$message}}
                @enderror
            </div>

            {{-- Email Section --}}
            <div class="mb-3 w-25">
                <label for="exampleFormControlInput2" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput2"
                    placeholder="name@example.com">
                @error('email')
                {{$message}}
                @enderror
            </div>

            {{-- Country Section --}}
            <div class="m-3 w-25">
                <label for="exampleFormControlInput3" class="form-label">Country</label>
                <select class="js-example-basic-single w-50" name="country">
                    <option value="lebanon">Lebanon</option>
                    <option value="usa">USA</option>
                    <option value="ksa">KSA</option>
                    <option value="uk">UK</option>
                </select>
            </div>

            {{-- Skills Section --}}
            <div class="m-3 w-25">
                <label for="exampleFormControlInput4" class="form-label">Skills</label>
                <select class="js-example-basic-multiple w-75" name="skills[]" multiple="multiple">
                    <option value="html">HTML</option>
                    <option value="css">CSS</option>
                    <option value="js">JS</option>
                    <option value="php">PHP</option>
                </select>
            </div>

            {{-- Password Section --}}
            <div class="mb-3 w-25">
                <label for="inputPassword5" class="form-label">Password</label>
                <input type="password" name="password" id="inputPassword5" class="form-control"
                    aria-describedby="passwordHelpBlock">
                @error('password')
                {{$message}}
                @enderror
                <div id="passwordHelpBlock" class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain
                    spaces,
                    special characters, or emoji.
                </div>
            </div>

            {{-- Modal Section --}}

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Test Modal</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h2>Hello From Modal</h2>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Submit Section --}}
            <input class="btn-success btn w-25 g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key')}}"
                data-callback='onSubmit' data-action='submit' type="submit" value="Register">

        </form>
    </main>

    {{-- <div id="responseMessage"></div>

    <div id="userInfo" class="border border-primary d-flex justify-content-center p-3 m-1 bg-secondary">
        <ol id="list">
            <h2 class="text-white fst-italic text-center m-4 fs-1">Users :</h2>
        </ol>
    </div> --}}





    <script>
        // Handle form submission via AJAX
        $(document).ready(function() {
            $('#userForm').on('submit', function(event) {
                event.preventDefault();

                // Get form data
                var formData = $(this).serialize();

                // Make the AJAX request
                $.ajax({
                    url: "{{ route('submitForm') }}", // Adjust route name
                    method: "POST",
                    data: formData,
                    success: function(response) {
                        // Show success message
                        $('#responseMessage').html('');
                        $('#responseMessage').append('<h2>' + response.message + '</h2>');
                        $('#list').html("");
                        showUsers();
                    },
                    error: function(xhr, status, error) {
                        // Show error message
                        $('#responseMessage').append('<p>Error: ' + xhr.responseJSON.message + '</p>');
                    }
                });
                $('#userForm')[0].reset();
            });

            function showUsers()
            {
                $.ajax({
                    type: "GET",
                    url: "{{ route('getUserInfo') }}",
                    success: function (response) {

                        data = response.data;


                        data.forEach(user => {

                            $('#list').append(
                                '<li class="fs-2">'+
                                    '<ul>'+
                                        '<li>'+
                                            user.name+
                                        '</li>'+

                                        '<li>'+
                                            user.email+
                                        '</li>'+
                                        '<br>'+

                                    '</ul>' +
                                '</li>' +
                                '<button id="delete" class="btn btn-danger">Delete</button>'+
                                '<button id="edit" class="btn btn-primary">Edit</button>'
                            );

                        });

                    },
                });
            }

            $('#delete').on('click' , function(){
                $('#responseMessage').text('Tested');
            });

            showUsers();

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        function onSubmit(token) {
      document.getElementById("recaptchaForm").submit();
    }
    </script>

</body>

</html>
