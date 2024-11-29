<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Bootstrap</title>
</head>

<body>
    <h1 class="text-center">Center H1</h1>
    <h1 class="text-end">End H1</h1>

    <p class="text-sm-end">End aligned text on viewports sized SM (small) or wider.</p>
    <p class="text-md-end">End aligned text on viewports sized MD (medium) or wider.</p>
    <p class="fs-1">Size 1 text</p>
    <p class="fs-2">Size 2 text</p>

    <p class="fw-bold">Bold Text</p>
    <p class="fw-bolder">Bold Text</p>
    <p class="fst-italic">Bold Text</p>

    <p class="text-decoration-underline">Primary Text</p>

    <p class="bg-primary">Bold Text</p>
    <p class="bg-danger">Danger Text</p>
    <p class="bg-black text-white">Danger Text</p>
    <p class="bg-black text-white bg-opacity-75">Danger Text</p>

    <div class="border border-primary">Border div</div>
    <div class="mt-5 me-3 border-top border-end border-primary text-center text-primary">Border top div</div>
    <div class="border border-primary border-5 p-5">Border width 5 div</div>

    <div class="rounded bg-primary m-5">Rounded Div</div>
    <div class="rounded-top bg-primary m-5">Rounded Div</div>

    <div class="bg-primary w-25 p-5 ">25% Div</div>
    <div class="bg-primary w-50 p-5 m-3 h-50 ">25% Div</div>

    <h2>Grid</h2>

    <div class="container text-center m-5">
        <div class="row m-3">
            <div class="col border m-1 bg-primary">Column 1</div>
            <div class="col border m-1 bg-primary">Column 2</div>
            <div class="col border m-1 bg-primary">Column 3</div>
        </div>

        <div class="row m-3">
            <div class="col border m-1 bg-primary">Column 1</div>
            <div class="col-6 border m-1 bg-primary">Column 2</div>
            <div class="col border m-1 bg-primary">Column 3</div>
        </div>

        <div class="row row-cols-3">
            <div class="col border bg-primary">Column 1</div>
            <div class="col border bg-primary">Column 2</div>
            <div class="col border bg-primary">Column 3</div>
            <div class="col border bg-primary">Column 4</div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
            <div class="col border bg-primary">Column 1</div>
            <div class="col border bg-primary">Column 2</div>
            <div class="col border bg-primary">Column 3</div>
            <div class="col border bg-primary">Column 4</div>
        </div>

    </div>

    <div class="grid text-center">
        <div class="">.g-col-6</div>
        <div class="">.g-col-6</div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
