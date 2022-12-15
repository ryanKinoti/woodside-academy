<div class="container">
    <form method="post" action="/student/profile/set-image" enctype="multipart/form-data">
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
