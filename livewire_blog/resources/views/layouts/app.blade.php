<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <style>
        .border_red{
            border: 2px solid red;
        }
        .border_green{
            border: 2px solid green;
        }
    </style>
    @livewireStyles
</head>
<body>
   {{$slot}}
</body>
@livewireScripts
{{-- alpine --}}
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js"></script>
</html>