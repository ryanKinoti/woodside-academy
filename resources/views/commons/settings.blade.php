{{--
    settings tab:
    1. add/change profile picture
    --}}
<section class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl"
         id="profile-picture">

    <div class="profile__setting__container flex">

        <div class="current__setting w-fit mx-space-0.5">
            <h1 class="text-2xl text-brown text-center bg-green-op-1 rounded-xl p-space-0.1 w-fit">
                Your Current Profile:
            </h1>

            @if(empty($userInfo->profile_photo))
                <i class="uil uil-image-question text-[115px]"></i>
            @else
                <img src="{{Storage::url($userInfo->profile_photo)}}"
                     class="rounded-full border-4 border-brown my-space-0.2 w-[115px] h-[115px]">
            @endif
        </div>

        <div class="change__setting w-fit mx-space-0.5">

            <h1 class="text-2xl text-brown text-center bg-green-op-1 rounded-xl p-space-0.1 w-fit">
                Select Image to Add new or change
            </h1>

            <div class="form__container my-space-0.4">
                <form method="post" action="/images/profile/set-image" enctype="multipart/form-data">
                    @csrf
                    <div class="set__image">
                        <label class="hidden">Add image</label>
                        <input type="file" required name="image">
                        <input type="hidden" name="userID" value="{{session('userID')}}">
                    </div>

                    <div class="set__button">
                        <button type="submit" class="button">Add</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</section>
