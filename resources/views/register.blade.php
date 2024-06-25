<x-layout>
    <h1>LARA MOVIES</h1>

    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Register</h2>

    <form class="max-w-sm mx-auto" action={{ route('register') }} method="POST">
        @csrf
        <div class="mb-5">
            <label for="name" class="label">Your name</label>
            <input type="text" name="name" id="name" class="input" placeholder="John Doe" required />
            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="email" class="label">Your
                email</label>
            <input type="email" id="email" name="email" class="input" placeholder="name@flowbite.com"
                required />
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="password" class="label">Your
                password</label>
            <input type="password" id="password" name="password" class="input" required />
            @error('password')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="submit">Submit</button>
    </form>
    <a href={{ route('login') }} class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Login</a>
</x-layout>
