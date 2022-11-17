<!doctype html>
<html lang="en">
<head>
    <x-header-tag></x-header-tag>
</head>
<body class="bg-gradient-to-r from-blue to-gray-op">
<x-register-header></x-register-header>
<section>
    <div class="m-auto p-space-0.5 text-center">
        <form action="/login/validation" method="POST" class="grid items-center">
            @csrf

            <span class="my-space-0.2">
                <label for="email">Email :</label>
                <input type="text" name="email" id="email" required>
            </span>

            <span class="my-space-0.2">
                <label for="password">Password :</label>
                <input type="text" name="password" id="password" required>
            </span>

            <div class="my-space-0.2">
                <button type="submit">Login Now</button>
            </div>
        </form>
    </div>
</section>
</body>
</html>
