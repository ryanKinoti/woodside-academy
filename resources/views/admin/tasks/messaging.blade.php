<section class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl" id="main-3-1">

    <div class="title__card flex">
        <h1 class="mx-space-0.2 p-space-0.2 text-[20px] text-brown bg-green-op-1 rounded-xl">
            ACADEMY MESSAGING
        </h1>

        <a class="mx-space-0.2 p-space-0.1 bg-green-op-1 rounded-full tablinks" title="Course Messaging"
           onclick="switchcommon(event, 'main-3-2')"
           style="cursor: pointer">
            <i class="uil uil-arrow-right text-brown text-[30px]"></i>
        </a>
    </div>

    <div class="message__card flex">

        <div class="message__navigation">
            <div class="message__search">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Seach...">
            </div>

            <ul class="message__list" id="myUL">
                @php
                    $counter = 1;
                @endphp
                @foreach($faculties as $item)
                    <li class="message__item" id="faculty{{ $counter }}">
                        <a style="cursor: pointer">
                            {{$item->faculty_name}}
                        </a>
                    </li>
                    @php
                        $counter++;
                    @endphp
                @endforeach
            </ul>
        </div>

        <div class="message__area">
            @php
                $counter = 1;
            @endphp
            @foreach($faculties as $item)
                <div class="message__container" id="faculty{{$counter}}">
                    <div class="message__history my-space-0.3 p-space-0.2">
                        <h1>
                            Recent Messages to {{$item->faculty_name}}
                        </h1>
                    </div>

                    <div class="message__input">
                        <form action="/admin/messages/faculty" method="post" class="flex">
                            @csrf
                            <div class="form__inner">
                                <div class="input__title">
                                    <label for="title">Message Title:</label>
                                    <input type="text" name="title" id="title" required>
                                </div>
                                <div class="input__content">
                                    <label for="message_content">Your Content:</label>
                                    <textarea name="message_content" id="message_content" cols="0" rows="7" required>
                                    </textarea>
                                </div>
                            </div>
                            <button type="submit" class="text-[20px]">
                                <input type="hidden" name="from_user_id" value="{{session('userID')}}">
                                <input type="hidden" name="to_faculty_id" value="{{$item->id}}">
                                Send Message
                                <i class="uil uil-message text-[20px]"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @php
                    $counter++;
                @endphp
            @endforeach
        </div>

    </div>
</section>

<section class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl" id="main-3-2">

    <div class="title__card flex">
        <a class="mx-space-0.2 p-space-0.1 bg-green-op-1 rounded-full tablinks" title="Academy Messaging"
           onclick="switchcommon(event, 'main-3-1')"
           style="cursor: pointer">
            <i class="uil uil-arrow-left text-brown text-[30px]"></i>
        </a>

        <h1 class="mx-space-0.2 p-space-0.2 text-[20px] text-brown bg-green-op-1 rounded-xl">
            COURSE MESSAGING
        </h1>

        <a class="mx-space-0.2 p-space-0.1 bg-green-op-1 rounded-full tablinks" title="Staff Messaging"
           onclick="switchcommon(event, 'main-3-3')"
           style="cursor: pointer">
            <i class="uil uil-arrow-right text-brown text-[30px]"></i>
        </a>
    </div>

    <div class="message__card flex">

        <div class="message__navigation">
            <div class="message__search">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Seach...">
            </div>

            <ul class="message__list" id="myUL">
                @php
                    $counter = 1;
                @endphp
                @foreach($courses as $item)
                    <li class="message__item" id="course{{ $counter }}">
                        <a style="cursor: pointer">
                            {{$item->course_name}}
                        </a>
                    </li>
                    @php
                        $counter++;
                    @endphp
                @endforeach
            </ul>
        </div>

        <div class="message__area">
            @php
                $counter = 1;
            @endphp
            @foreach($courses as $item)
                <div class="message__container" id="course{{ $counter }}">
                    <div class="message__history my-space-0.3 p-space-0.2">
                        <h1>
                            Recent Messages to: {{$item->course_name}}
                        </h1>
                    </div>

                    <div class="message__input">
                        <form action="/admin/messages/course" method="post" class="flex">
                            @csrf
                            <div class="form__inner">
                                <div class="input__title">
                                    <label for="title">Message Title:</label>
                                    <input type="text" name="title" id="title" required>
                                </div>
                                <div class="input__content">
                                    <label for="message_content">Your Content:</label>
                                    <textarea name="message_content" id="message_content" cols="0" rows="7" required>
                                    </textarea>
                                </div>
                            </div>
                            <button type="submit" class="text-[20px]">
                                <input type="hidden" name="from_user_id" value="{{session('userID')}}">
                                <input type="hidden" name="to_course_id" value="{{$item->id}}">
                                Send Message
                                <i class="uil uil-message text-[20px]"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @php
                    $counter++;
                @endphp
            @endforeach
        </div>

    </div>
</section>

