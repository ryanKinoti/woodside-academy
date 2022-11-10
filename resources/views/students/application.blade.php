<!doctype html>
<html lang="en">
<head>
    <x-header-tag></x-header-tag>
</head>
<body class="bg-gradient-to-r from-blue to-gray-op">
<x-register-header></x-register-header>
<section>
    <div>
        <form action="/applications/choice/submission" method="POST" class="grid items-center">
            @csrf
            <span class="my-space-0.2">
                <label for="firstName">First Name :</label>
                <input type="text" name="firstName" id="firstName" required>
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
                <label for="gender">Gender :</label>
                <input type="text" name="gender" id="gender" required>
            </span>

            <span class="my-space-0.2">
                <label for="course">Course to Apply to :</label>
                <input type="text" name="course" id="course" required>
            </span>

            <div class="my-space-0.2">
                <input type="hidden" name="role" value="{{$studentRole}}">
                <button type="submit">Complete Registration</button>
            </div>
        </form>
    </div>
</section>
</body>
</html>


