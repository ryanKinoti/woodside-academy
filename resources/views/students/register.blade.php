<!doctype html>
<html lang="en">
<head>
    <x-header-tag></x-header-tag>
</head>
<body class="bg-gradient-to-r from-blue to-gray-op">
<x-register-header></x-register-header>
<section>
    <div>
        <form action="students" method="POST" class="grid items-center">
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
                <label for="phoneNo">Phone Number :</label>
                <input type="text" name="phoneNo" id="phoneNo" required>
            </span>

            <span class="my-space-0.2">
                <label for="email">Personal Email :</label>
                <input type="text" name="email" id="email" required>
            </span>

            <span class="my-space-0.2">
                <label for="password">Password :</label>
                <input type="text" name="password" id="password" required>
            </span>

            <span class="my-space-0.2">
                <label for="gender">Gender :</label>
                <input type="text" name="gender" id="gender" required>
            </span>

            <span class="my-space-0.2">
                <label for="location">Physical Location :</label>
                <input type="text" name="location" id="location" required>
            </span>

            <div class="my-space-0.2">
                <button type="submit">Complete Registration</button>
            </div>
        </form>
    </div>
</section>
</body>
</html>

