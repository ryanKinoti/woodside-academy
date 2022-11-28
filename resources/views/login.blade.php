<!doctype html>
<html lang="en">
<head>
    <x-header-tag></x-header-tag>
</head>
<body class="bg-gradient-to-r from-blue to-gray-op">
<x-register-header></x-register-header>
<section>
    <div class="m-auto p-space-0.5 text-center">
        @if($errors->any())
            <h3 class="m-auto p-2 text-center rounded-xl bg-red text-white w-fit"
                style="font-family: 'Outfit',sans-serif; font-size: 35px;">
                {{$errors->first()}}
            </h3>
        @endif
        <form action="/login/validation" method="POST" class="grid items-center">
            @csrf

            <span class="my-space-0.2">
                <label for="email">Email :</label>
                <input type="text" name="email" id="email" required>
            </span>

            <span class="my-space-0.2">
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" required>
            </span>

            <div class="my-space-0.2">
                <button type="submit">Login Now</button>
            </div>
        </form>
    </div>
</section>
</body>
</html>
