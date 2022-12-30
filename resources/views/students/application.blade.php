<!doctype html>
<html lang="en">
<head>
    <title>Student Application | Woodside Academy</title>
    <x-headerTag></x-headerTag>
</head>
<body class="bg-gradient-to-r from-blue to-gray-op">
<x-register-header></x-register-header>
<section>
    <div class="m-auto p-space-0.5 text-center">
        <form action="/applications/choice/submission" method="POST" class="grid items-center grid-rows-3 grid-flow-col gap-[3rem]">
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
                <select name="gender" id="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </span>

            <span class="my-space-0.2">
                <label for="course">Course to Apply to :</label>
                <select name="course" id="course" class="w-fit">
                    @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->course_name}}</option>
                    @endforeach
                </select>
            </span>

            <div class="my-space-0.2">
                <input type="hidden" name="faculty" value="0">
                <input type="hidden" name="role" value="{{$studentRole}}">
                <button type="submit">Complete Registration</button>
            </div>
        </form>
    </div>
</section>
</body>
</html>


