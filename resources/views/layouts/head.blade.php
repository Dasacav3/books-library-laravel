<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://api.iconify.design/emojione/blue-book.svg" type="image/x-icon">
    <title>{{ $title }}</title>
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;500;700;900&display=swap" rel="stylesheet">
    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    {{-- CSS --}}
    <link href="{{ url('/css/app.css') }}" rel="stylesheet">
    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.5.1/dist/cdn.min.js"></script>
    <style>
        * {
            /*font-family: 'Lobster', cursive;*/
            font-family: 'Raleway', sans-serif;
        }

    </style>
</head>

<body>
