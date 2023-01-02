<!doctype html>
<html lang="en">
<head>
    <title>Lecturer Application | Woodside Academy</title>
    <x-headerTag></x-headerTag>
</head>
<body class="bg-gradient-to-r from-blue to-gray-op">
<x-register-header></x-register-header>
<section>
    <div class="m-auto p-space-0.5 text-center">
        <form action="/applications/choice/submission" method="POST" class="grid items-center">
            @csrf
            <div class="lecturer-form-container">
                <input type="firstName" placeholder="First Name" name="firstName" id="firstName" required>
                <input type="lastName" placeholder="Last Name" name="lastName" id="lastName" required>
                <input type="phoneNo" placeholder="Phone No" name="phoneNo" id="phoneNo" required>
                <input type="email" placeholder="Personal Email" name="email" id="email" required>
                <select name="gender" id="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <select name="course" id="course" class="w-fit">
                    @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->course_name}}</option>
                    @endforeach
                </select>
                <input type="hidden" name="role" value="{{$lecturerRole}}">
                <button id="reg-lec" type="submit">Complete Registration</button>
            </div>

        </form>
        <div class="lecturer-image">
            <img src="{{asset('images/applyforlec.jpg')}}" alt="">
        </div>
    </div>
</section>
</body>
</html>


