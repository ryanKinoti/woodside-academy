<section class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl" id="main-3-1">

    <div class="title__card flex">
        <h1 class="mx-space-0.2 p-space-0.2 text-[20px] text-brown bg-green-op-1 rounded-xl">
            FACULTY MESSAGING
        </h1>

        <a class="mx-space-0.2 p-space-0.1 bg-green-op-1 rounded-full tablinks" title="Course Messaging"
           onclick="switchcommon(event, 'main-3-2')"
           style="cursor: pointer">
            <i class="uil uil-arrow-right text-brown text-[30px]"></i>
        </a>
    </div>

    <div class="message__card flex">

        <div class="message__navigation">
            <div class="message__header">
                <h1 class="text-[15px] ">Available Faculties:</h1>
                <i class="uil uil-comment-alt-plus text-[15px]"></i>
            </div>

            <div class="message__search">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Seach...">
                {{--onkeyup="myFunction()"--}}
            </div>

            <ul class="message__list" id="myUL">
                @php
                    $counter = 1;
                @endphp
                @foreach($faculties as $faculty)
                    <li class="message__item" data-index="{{ $counter }}">
                        <a style="cursor: pointer">
                            {{$faculty->faculty_name}}
                        </a>
                    </li>
                    @php
                        $counter++;
                    @endphp
                @endforeach
            </ul>
        </div>

        <div class="message__area">
            @foreach($faculties as $faculty)
                <div class="message__history">
                    <div class="my-space-0.3 p-space-0.2 bg-green-op-2">
                        <h1>
                            Hi there {{$faculty->faculty_name}}
                        </h1>
                    </div>

                    <div class="message__input">
                        <form action="/api/admin/send" method="post">
                            <div class="input__title">
                                <label for="title">Message Title:</label>
                                <input type="text" name="title" id="title">
                            </div>
                            <div class="input__content">
                                <label for="message_content">Your Content</label>
                                <textarea name="message_content" id="message_content" cols="0" rows="7"></textarea>
                            </div>
                            <button type="submit">
                                <input type="hidden" name="from_user_id" value="{{session('userID')}}">
                                <input type="hidden" name="to_faculty_id" value="{{$faculty->id}}">
                                <i class="uil uil-message text-[30px]"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
