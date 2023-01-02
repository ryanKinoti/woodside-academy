<!doctype html>
<html lang="en">
<head>
    <title>Student | Woodside Academy Dashboard</title>
    <x-headerTag></x-headerTag>
</head>
<body class="bg-gradient-to-r from-blue to-gray-op">

<div class="bg-green-op text-center text-xl p-space-0.1">
    <div class="text-brown text-xl p-space-0.1 ">
        STUDENT DASHBOARD: {{session('firstName')}} {{session('lastName')}}
    </div>
    @if($errors->any())
        <h3 class="m-auto p-2 text-center rounded-xl bg-red text-white w-fit my-[10px]"
            style="font-family: 'Outfit',sans-serif; font-size: 35px;" id="hideMe">
            {{$errors->first()}}
            <script>
                setTimeout(() => {
                    const elem = document.getElementById("hideMe");
                    elem.parentNode.removeChild(elem);
                }, 5000);
            </script>
        </h3>
    @endif
</div>

<div class="flex h-full">
    <section class="sidebar">

        <div class="login-header">
            <a href="/">
                <h1 id='login-title'> Woodside <br> Academy</h1>
            </a>
        </div>

        <x-student-panel></x-student-panel>

    </section>

    {{--
    loading:
    1. common content for navigation panel
    2. secondary navigation buttons for the actions with more than 1 option
    --}}
    @include('commons.userProfile')
    @include('commons.options')
    @include('commons.settings')
    @include('commons.notifications')

    {{--
    loading:
    1. respective pages dependent on the user
    --}}
    @include('actions.students.materials')
    @include('actions.students.courses')
</div>

<x-footerTag></x-footerTag>
</body>
</html>
