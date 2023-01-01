<!doctype html>
<html lang="en">
<head>
    <x-header-tag></x-header-tag>
</head>
<body class="bg-gradient-to-r from-blue to-gray-op">
<x-register-header></x-register-header>
<section>
    <div class="m-auto p-space-0.5 text-center">
        <form action="/applications/choice/submission" method="POST" class="grid items-center grid-rows-3 grid-flow-col gap-[3rem]">
            @csrf
            <div class="students-form-container">
                <input type="text" placeholder="First Name" name="firstName" id="firstName" required>
                <input type="text" placeholder="Last Name" name="lastName" id="lastName" required>
                <input type="text" placeholder="Phone No" name="phoneNo" id="phoneNo" required>
                <input type="text" placeholder="Personal Email" name="email" id="email" required>
                <select name="gender" placeholder="Gender" id="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <select name="course" id="course" class="w-fit">
                    @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->course_name}}</option>
                    @endforeach
                </select>
                <input type="hidden" name="faculty" value="0">
                <input type="hidden" name="role" value="{{$studentRole}}">
                <button id="reg-student" type="submit">Complete Registration</button>
            </div>
        </form>
        <div class="student-image">
                <img src="{{asset('images/appstu.jpg')}}" alt="">
            </div>
    </div>
</section>
</body>
</html>


