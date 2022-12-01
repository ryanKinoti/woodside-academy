@php
    use Illuminate\Support\Facades\Storage
@endphp

    <!doctype html>
<html lang="en">
<head>
    <title>Woodside Academy Administrator</title>
    <x-header-tag></x-header-tag>
</head>
<body class="bg-gradient-to-r from-blue to-gray-op">

<div class="bg-green-op text-center text-xl p-space-0.1">
    <span class="text-brown text-xl p-space-0.1">
        WOODSIDE ACADEMY ADMINISTRATOR DASHBOARD
    </span>
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
    <x-panel></x-panel>
    <section class="tabcontent ml-[17%]" id="main-1">
        {{$userInfo->id}}
        {{$userInfo->firstName}}
        {{$userInfo->lastName}}
        {{$userInfo->email}}
        {{$userInfo->phoneNumber}}
        {{--        <img src="{{Storage::url($userInfo->profile_photo)}}" alt="">--}}
    </section>
    @include('admin.tasks.applications')
</div>


<script>
    function switchcommon(evt, mainName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(mainName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
</body>
</html>
