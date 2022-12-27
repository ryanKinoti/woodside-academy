{{--
    settings tab:
    1. add/change profile picture
    --}}
<section class="tabcontent mr-[10px] ml-[19%] my-space-0.3 w-v-w h-v-h p-space-0.3 bg-green-op-2 rounded-xl"
         id="main-last">
    <div class="container">
        <form method="post" action="/images/profile/set-image" enctype="multipart/form-data">
            @csrf
            <div class="image">
                <label><h4>Add image</h4></label>
                <input type="file" required name="image">
                <input type="hidden" name="userID" value="{{session('userID')}}">
            </div>

            <div class="post_button">
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </form>
    </div>

</section>
