<!doctype html>
<html lang="en">
<head>
    <x-header-tag></x-header-tag>
</head>
<body class="bg-gradient-to-r from-blue to-gray-op">
<x-register-header></x-register-header>
<section>
    <div class="m-auto p-space-0.5 text-center">
        <form action="/lecturer/register" method="POST" class="grid items-center grid-rows-3 grid-flow-col gap-[3rem]">
            @csrf
            <span class="my-space-0.2">
                <label for="firstName">First Name :</label>
                <input type="text" name="firstName" id="firstName" required>
            </span>

            <span class="my-space-0.2">
                <label for="secondName">Second Name :</label>
                <input type="text" name="secondName" id="secondName" required>
            </span>

            <span class="my-space-0.2">
                <label for="lastName">Last Name :</label>
                <input type="text" name="lastName" id="lastName" required>
            </span>

            <span class="my-space-0.2">
                <label for="id_number">ID Number :</label>
                <input type="text" name="id_number" id="id_number" required>
            </span>

            <span class="my-space-0.2">
                <label for="phoneNumber">Phone Number :</label>
                <input type="text" name="phoneNumber" id="phoneNumber" required>
            </span>

            <span class="my-space-0.2">
                <label for="email">Personal Email :</label>
                <input type="text" name="email" id="email" required>
            </span>

            <span class="my-space-0.2">
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" required>
            </span>

            <span class="my-space-0.2">
                <label for="gender">Gender :</label>
                <input type="text" name="gender" id="gender" required>
            </span>

            <span class="my-space-0.2">
                <label for="country">Country :</label>
                <input type="text" name="country" id="country" required>
            </span>

            <span class="my-space-0.2">
                <label for="city">City :</label>
                <input type="text" name="city" id="city" required>
            </span>

            <div class="my-space-0.2">
                <input type="hidden" name="user_role" value="lecturer">
                <button type="submit">Complete Registration</button>
            </div>
        </form>
    </div>
</section>
</body>
</html>

