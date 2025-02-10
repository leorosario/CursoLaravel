<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("assets/bootstrap/bootstrap.min.css") }}">
    <title>Livewire</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                {{ $slot }}
            </div>
        </div>
    </div>

    <script crc="{{ asset("assets/bootstrap/bootstrap.bundle.min.js") }}"></script>
</body>
</html>