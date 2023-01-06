<!DOCTYPE html>
<html class="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="/dashboard/js/init-alpine.js"></script>
</head>

<body>
    <div class="flex min-h-screen items-center bg-slate-100 p-6">
        <div class="mx-auto h-full max-w-lg flex-1 overflow-hidden rounded-lg bg-white border-2 border-slate-200">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-full">
                    <div class="w-full py-10 px-5">
                        <h1 class="mb-5 text-2xl text-center font-semibold text-gray-700">
                            Login Admin
                        </h1>
                        @include('dashboard.components.alert')
                        <form action="{{ route('login') }}" method="post">
                            @csrf @method('post')
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Username</span>
                                <input
                                    class="mt-2 block w-full rounded-md p-2 outline-none @error('nisn') ring-red-500 @enderror focus:ring-4 focus:border-0 border-2 border-slate-200 bg-gray-50 text-slate-700"
                                    id="username" name="username" value="{{ old('username') }}" type="text" required autofocus>
                                @error('username')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </label>
                            <label class="mt-4 block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Password</span>
                                <input
                                    class="mt-2 block w-full rounded-md p-2 outline-none @error('password') ring-red-500 @enderror focus:ring-4 focus:border-0 border-2 border-slate-200 bg-gray-50 text-slate-700"
                                    id="password" name="password" value="" type="password" required>
                                @error('password')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </label>

                            <button type="submit"
                                class="focus:shadow-outline-purple mt-8 block w-full rounded-lg border border-transparent bg-green-600 px-4 py-2 text-center text-sm font-medium leading-5 text-white transition-colors duration-150 hover:bg-green-700 focus:outline-none active:bg-green-600">
                                Log in
                            </button>
                        </form>

                        {{--
                        <hr class="my-8" />

                        <a href="/login"
                            class="focus:shadow-outline-gray flex w-full items-center justify-center rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 hover:border-gray-500 focus:border-gray-500 focus:outline-none active:bg-transparent active:text-gray-500 dark:text-gray-400">
                            login sebagai siswa
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
