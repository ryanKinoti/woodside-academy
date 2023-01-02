<!doctype html>
<html lang="en">
<head>
    <title>Staff Application | Woodside Academy</title>
    <x-headerTag></x-headerTag>
</head>
<body class="bg-gradient-to-r from-blue to-gray-op">
<x-register-header></x-register-header>
<section>
    <div class="m-auto p-space-0.5 text-center">
        <form action="/applications/choice/submission" method="POST" class="grid items-center ">
            @csrf
            <div class="staff-form-container">
                <input type="text" placeholder="First name" name="firstName" id="firstName" required autocomplete="off">
                <input type="text" placeholder="Last name" name="lastName" id="lastName" required autocomplete="off">
                <input type="text" placeholder="Phone No " name="phoneNo" id="phoneNo" required autocomplete="off">
                <input type="text" placeholder="Personal Email" name="email" id="email" required autocomplete="off">
                <select name="gender" id="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <select name="faculty" id="faculty" class="w-fit">
                    @foreach($faculties as $faculty)
                        <option value="{{$faculty->id}}">{{$faculty->faculty_name}}</option>
                    @endforeach
                </select>
                <select name="department" id="department" class="w-fit">
                    @foreach($departments as $item)
                        <option value="{{$item->id}}">{{$item->department_name}}</option>
                    @endforeach
                </select>
                <input type="hidden" name="course" value="0">
                <input type="hidden" name="role" value="{{$staffRole}}">
                <button id="reg-staff" type="submit">Complete Registration</button>
            </div>
        </form>
        <div class="staff-image">
            <img src="{{asset('images/Brotherton Library.jfif')}}" alt="">
        </div>
    </div>
</section>
</body>
</html>
