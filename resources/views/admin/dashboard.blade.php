@php
    use Illuminate\Support\Facades\Storage
@endphp

    <!doctype html>
<html lang="en">
<head>
    <title>Woodside Academy Administrator</title>
    <x-headerTag></x-headerTag>
</head>
<body class="bg-gradient-to-r from-blue to-gray-op">

<div class="bg-green-op text-center text-xl p-space-0.1">
    <div class="text-brown text-xl p-space-0.1 ">
        WOODSIDE ACADEMY ADMINISTRATOR DASHBOARD
        <span>
            <a class="p-space-0.1 tablinks" id="defaultOpen" onclick="switchcommon(event, 'notification')"
               style="cursor: pointer">
                <i class="uil uil-bell text-[30px] text-brown"></i>
            </a>
        </span>
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

    <x-panel></x-panel>

    <section class="tabcontent mr-[10px] ml-[17%] my-space-0.3 w-v-w h-v-h p-space-0.3 bg-green-op-2 rounded-xl" id="main-1">
        <article id="user-information">

            <span class="flex w-fit">
                <div class="w-fit">
                    @if(empty($userInfo->profile_photo))
                        <i class="uil uil-image-question text-[115px]"></i>
                    @else
                        <img src="{{Storage::url($userInfo->profile_photo)}}"
                             class="rounded-full border-4 border-brown w-[100px] h-[100px]">
                    @endif
                </div>
                <h2 class="text-2xl text-brown text-center bg-green-op-1 rounded-xl p-space-0.1 w-fit h-fit my-[55px] ml-space-0.2">
                    Welcome :
                </h2>
                <h1 class="text-4xl text-brown text-center bg-green-op-1 rounded-xl p-space-0.1 w-fit h-fit my-space-0.5 ml-space-0.2">
                    {{$userInfo->firstName}} {{$userInfo->lastName}}
                </h1>
            </span>

            <div class="flex justify-between my-space-0.3">
                <span class="text-center">
                    <h2 class="text-brown text-xl text-center bg-green-op-1 rounded-xl p-space-0.1">User Id :</h2>
                    <h3 class="my-space-0.1 text-green-op-1 text-4xl">
                        #{{$userInfo->id}}
                    </h3>
                </span>
                <span class="text-center">
                    <h2 class="text-brown text-xl text-center bg-green-op-1 rounded-xl p-space-0.1 w-fit">User Email :</h2>
                    <h3 class="my-space-0.1 text-green-op-1 text-4xl">
                        {{$userInfo->email}}
                    </h3>
                </span>
                <span>
                    <h2 class="text-brown text-xl text-center bg-green-op-1 rounded-xl p-space-0.1">Phone Number :</h2>
                    <h3 class="my-space-0.1 text-green-op-1 text-4xl">
                        {{$userInfo->phoneNumber}}
                    </h3>
                </span>
            </div>

        </article>

        <article id="chart-container" class="w-50-p">
            {{--<div>--}}
            {{--{!! $chart->container() !!}--}}

            {{--</div>--}}
            {{--{!! $chart->script() !!}--}}
        </article>
    </section>

    @include('admin.tasks.applications')
    @include('admin.tasks.communications')
    @include('commons.settings')
</div>

<x-footerTag></x-footerTag>
</body>
</html>
