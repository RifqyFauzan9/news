<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>CRUD | {{ $title }}</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <x-navbar></x-navbar>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex flex-row-reverse justify-center items-center gap-5">
                <h1 class="text-xl md:text-3xl font-bold tracking-tight text-gray-900 text-center">📰🔥HOT NEWS!!🔥📰</h1>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <!-- Your content -->
                @if (count($post) > 0)
                <div class="text-center mt-16">
                    <h1 class="text-xl md:text-3xl font-semibold mb-3">Whoops! <i class="text-blue-500">{{ count($post) }}</i> News found 📰</h1>
                    <a href="/post" class="text-blue-500 hover:underline text-xl font-medium">Here is your News! &raquo;</a>
                </div>
                @else
                <div class="text-center mt-16 px-3">
                    <h1 class="text-xl md:text-3xl font-semibold mb-3">Whoops! Sorry we have no News for today :&#40;</h1>
                    <a href="post/create" class="text-blue-500 hover:underline text-lg md:text-xl font-medium">Click here to add News &raquo;</a>
                </div>
                @endif
            </div>
        </main>
    </div>

</body>

</html>
