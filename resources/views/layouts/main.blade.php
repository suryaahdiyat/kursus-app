<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Course</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-900">
    <header class="py-4 mb-5 border-b-4">
        <a href="/" class="ml-4 text-5xl font-bold text-indigo-600 duration-100 hover:text-indigo-800">My Course</a>
    </header>
    <div>
        @yield('content')
    </div>
</body>
</html>