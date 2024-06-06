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
                <h1 class="text-xl md:text-3xl font-bold tracking-tight text-gray-900 text-center">📰 NEWS DETAILS 📰</h1>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <!-- Your content -->
                <div class="card max-w-[85%] md:max-w-[40rem] mx-auto">
                    <div class="card-img">
                        <img class="rounded-t-lg" src="{{ Storage::url($post->image) }}" alt="">
                    </div>

                    <div class="card-body shadow-lg py-3 px-4 rounded-b-lg">
                        <h1 class="uppercase font-bold text-xl">{{ $post->title }}</h1>
                        <p class="mb-1">
                            {{ $post->description }}
                        </p>

                        <p class="mb-1">
                            {!! $post->content !!}
                        </p>
                        <div class="mt-6 flex items-center justify-end gap-x-2">
                            <a href="{{ route('post.edit', $post->id) }}"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>
                            <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>
