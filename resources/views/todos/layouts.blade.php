<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('assets/css/tailwind.min.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('assets/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <!-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"> -->
    @livewireStyles
    <title>Todo Project</title>
</head>

<body>
    <div class="text-center flex justify-center pt-10">
        <div class="w-1/3 border broder-gray-400 rounded py-4">
            @yield('content')
        </div>
    </div>
    @livewireScripts
</body>

</html>