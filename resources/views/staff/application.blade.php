<!doctype html>
<html lang="en">
<head>
    <x-header-tag></x-header-tag>
</head>
<body class="bg-gradient-to-r from-blue to-gray-op">
<x-register-header></x-register-header>
<section>
    <div class="m-auto p-space-0.5 text-center">
        <form action="/applications/choice/staff-submission" method="POST" class="grid items-center ">
            @csrf
            <div class="staff-form-container">
                <input type="text" placeholder="First name" name="firstName" id="firstName" required>
                <input type="text" placeholder="Last name" name="lastName" id="lastName" required>
                <input type="text" placeholder="Phone No " name="phoneNo" id="phoneNo" required>
                <input type="text" placeholder="Personal Email" name="email" id="email" required>
                <select name="gender" id="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <select name="faculty" id="faculty" class="w-fit">
                    @foreach($faculties as $faculty)
                        <option value="{{$faculty->id}}">{{$faculty->faculty_name}}</option>
                    @endforeach
                </select>
                <input type="hidden" name="role" value="{{$staffRole}}">
                <button id="reg-staff" type="submit">Complete Registration</button>  
        </div>
        </form>
        <div class="staff-image">
                <img src="{{asset('images/applyforstaff.jpg')}}" alt="">
            </div>
    </div>
</section>
</body>
</html>
