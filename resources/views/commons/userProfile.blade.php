<section class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl" id="main-1">
    <article id="user-information">
        <div class="flex w-fit">
            <div class="w-fit">
                @if(empty($userInfo->profile_photo))
                    <i class="uil uil-image-question text-[115px]"></i>
                @else
                    <img src="{{Storage::url($userInfo->profile_photo)}}"
                         class="rounded-full border-4 border-brown my-space-0.2 w-[115px] h-[115px]">
                @endif
            </div>
            <h2 class="text-2xl text-brown text-center bg-green-op-1 rounded-xl p-space-0.1 w-fit h-fit my-[55px] ml-space-0.2">
                Welcome :
            </h2>
            <h1 class="text-4xl text-brown text-center bg-green-op-1 rounded-xl p-space-0.1 w-fit h-fit my-space-0.5 ml-space-0.2">
                {{$userInfo->firstName}} {{$userInfo->lastName}}
            </h1>
        </div>

        <div class="flex justify-between my-space-0.3">
            <div class="text-center">
                <h2 class="text-brown text-xl text-center bg-green-op-1 rounded-xl p-space-0.1">User Id :</h2>
                <h3 class="my-space-0.1 text-green-op-1 text-4xl">
                    #{{$userInfo->id}}
                </h3>
            </div>
            <div class="text-center">
                <h2 class="text-brown text-xl text-center bg-green-op-1 rounded-xl p-space-0.1 w-fit">User Email :</h2>
                <h3 class="my-space-0.1 text-green-op-1 text-4xl">
                    {{$userInfo->email}}
                </h3>
            </div>
            <div>
                <h2 class="text-brown text-xl text-center bg-green-op-1 rounded-xl p-space-0.1">Phone Number :</h2>
                <h3 class="my-space-0.1 text-green-op-1 text-4xl">
                    {{$userInfo->phoneNumber}}
                </h3>
            </div>
        </div>

    </article>
</section>
