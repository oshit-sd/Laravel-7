<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <livewire:styles />
    <title>Comments System | Laravel 7</title>
</head>

<body>
    <div class="flex justify-center">
        <div class="w-6/12">
            @yield('content')
        </div>
    </div>
    <livewire:scripts />
</body>

</html>