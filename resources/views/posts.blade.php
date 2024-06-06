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
                <a href="/post/create" class="md:block hidden text-3xl font-bold tracking-tight text-center text-blue-500 hover:underline">Create NEWS!</a>
                <h1 class="text-xl md:text-3xl font-bold tracking-tight text-gray-900 text-center">📰🔥HOT NEWS!!🔥📰</h1>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 gap-5 {{ count($post) > 2 || count($post) == 0 ? 'justify-around' : 'justify-left' }} flex flex-wrap items-center">
                
                <!-- Your content -->
                @forelse ($post as $p)
                    <div class="card max-w-[85%] md:max-w-[30%]">
                        <div class="card-img">
                            <img class="rounded-t-lg" src="{{ Storage::url($p->image) }}" alt="">
                        </div>

                        <div class="card-body shadow-lg py-3 px-4 rounded-b-lg">
                            <h1 class="uppercase font-bold text-xl">{{ $p->title }}</h1>
                            <p class="mb-1">
                                {{ Str::limit($p->description, 50) }}
                            </p>
                            <a href="{{ route('post.show', $p->id) }}" class="font-medium text-blue-500 hover:underline">Read More &raquo;</a>
                        </div>
                    </div>
                @empty
                <div class="text-center mt-16 px-3">
                    <h1 class="text-xl md:text-3xl font-semibold mb-3">Whoops! Sorry we have no News for today :&#40;</h1>
                    <a href="post/create" class="text-blue-500 hover:underline text-lg md:text-xl font-medium">Click here to add News &raquo;</a>
                </div>
                @endforelse
            </div>
        </main>
    </div>

</body>

</html>
