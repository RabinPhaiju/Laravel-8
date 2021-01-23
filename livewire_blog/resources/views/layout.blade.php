<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire Blog</title>
    @livewireStyles
    <style>
        .header_component{
            display: flex;
            background: rgba(165, 165, 165, 0.538);
        }
        .header_component a{
            padding:4px;
            margin:4px;
            text-decoration: none;
            background: #777;
            color: white;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    @livewire('header',['name'=>'Rabin Phaiju'])
    @livewire('counter')
    @livewire('search')
</body>
@livewireScripts
</html>