<!DOCTYPE html>
<html>
<head>
    <title>Fermentasi App</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    @include('partials.navbar')

    <div class="container mx-auto p-6">
        @yield('content')
    </div>

    @include('partials.footer')

</body>
</html>