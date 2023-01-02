@php
    use Illuminate\Support\Facades\DB;
@endphp
{{--DEPARTMENT MESSAGING--}}
<section class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl" id="main-3-0">

    <div class="title__card flex">

        <h1 class="mx-space-0.2 p-space-0.2 text-[20px] text-brown bg-green-op-1 rounded-xl">
            DEPARTMENT MESSAGING
        </h1>

        <a class="mx-space-0.2 p-space-0.1 bg-green-op-1 rounded-full tablinks" title="Academy Messaging"
           onclick="switchcommon(event, 'main-3-1')"
           style="cursor: pointer">
            <i class="uil uil-arrow-right text-brown text-[30px]"></i>
        </a>
    </div>

    <div class="message__card flex">

        <div class="message__navigation">
            <div class="message__search">
                <input type="text" id="myInput" onkeyup="main31()" placeholder="Seach...">
            </div>

            <ul class="message__list" id="myUL">
                @php
                    $counter = 1;
                @endphp
                @foreach($departments as $item)
                    <li class="message__item" id="department{{ $counter }}">
                        <a style="cursor: pointer">
                            {{$item->department_name}} Department
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
            @foreach($departments as $item)
                <div class="message__container" id="department{{$counter}}">
                    <div class="message__history my-space-0.3 p-space-0.2">

                        <div class="history__title">
                            <h1>
                                Recent Messages to {{$item->department_name}} department
                            </h1>
                        </div>
                        <div class="history__content">
                            @foreach($messages->where('to_department_id', $item->id)->where('bulk_send','no') as $item_2)
                                @php
                                    $firstName = DB::table('users')
                                    ->where('id',$item_2->from_user_id)->get('firstName')->first()->firstName;
                                    $lastName = DB::table('users')
                                    ->where('id',$item_2->from_user_id)->get('lastName')->first()->lastName;
                                @endphp
                                <div class="content__container">
                                    <div class="history__from">
                                        <h2>{{$firstName}} {{$lastName}} :</h2>
                                    </div>
                                    <div class="history__to">
                                        {{$item_2->title}}
                                        {{$item_2->message_content}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="message__input">
                        <form action="/admin/messages/department" method="post">
                            @csrf
                            <div class="form__inner__container">
                                <div class="form__inner">
                                    <div class="input__title">
                                        <label for="title">Message Title:</label>
                                        <input type="text" name="title" id="title" required autocomplete="off">
                                    </div>
                                    <div class="input__content">
                                        <label for="message_content">Your Content:</label>
                                        <textarea name="message_content" id="message_content" cols="0" rows="7"
                                                  required autocomplete="off">
                                    </textarea>
                                    </div>
                                </div>
                                <button type="submit" class="text-[20px]">
                                    <input type="hidden" name="from_user_id" value="{{session('userID')}}">
                                    <input type="hidden" name="to_department_id" value="{{$item->id}}">
                                    Send Message
                                    <i class="uil uil-message text-[20px]"></i>
                                </button>
                            </div>
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

{{--ACADEMY/FACULTY MESSAGING--}}
<section class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl" id="main-3-1">

    <div class="title__card flex">
        <a class="mx-space-0.2 p-space-0.1 bg-green-op-1 rounded-full tablinks" title="Department Messaging"
           onclick="switchcommon(event, 'main-3-0')"
           style="cursor: pointer">
            <i class="uil uil-arrow-left text-brown text-[30px]"></i>
        </a>

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
                <input type="text" id="myInput" onkeyup="main31()" placeholder="Seach...">
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
                        <div class="history__title">
                            <h1>
                                Recent Messages to {{$item->faculty_name}} academy
                            </h1>
                        </div>
                        <div class="history__content">
                            @foreach($messages->where('to_faculty_id', $item->id) as $item_2)
                                @php
                                    $firstName = DB::table('users')
                                    ->where('id',$item_2->from_user_id)->get('firstName')->first()->firstName;
                                    $lastName = DB::table('users')
                                    ->where('id',$item_2->from_user_id)->get('lastName')->first()->lastName;
                                @endphp
                                <div class="content__container">
                                    <div class="history__from">
                                        <h2>{{$firstName}} {{$lastName}} :</h2>
                                    </div>
                                    <div class="history__to">
                                        {{$item_2->title}}
                                        {{$item_2->message_content}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="message__input">
                        <form action="/admin/messages/faculty" method="post">
                            @csrf
                            <div class="form__inner__container">
                                <div class="form__inner">
                                    <div class="input__title">
                                        <label for="title">Message Title:</label>
                                        <input type="text" name="title" id="title" required autocomplete="off">
                                    </div>
                                    <div class="input__content">
                                        <label for="message_content">Your Content:</label>
                                        <textarea name="message_content" id="message_content" cols="0" rows="7"
                                                  required autocomplete="off">
                                    </textarea>
                                    </div>
                                </div>
                                <button type="submit" class="text-[20px]">
                                    <input type="hidden" name="from_user_id" value="{{session('userID')}}">
                                    <input type="hidden" name="to_faculty_id" value="{{$item->id}}">
                                    Send Message
                                    <i class="uil uil-message text-[20px]"></i>
                                </button>
                            </div>
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

{{--COURSE MESSAGING--}}
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
                <input type="text" id="myInput" onkeyup="main32()" placeholder="Seach...">
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
                        <div class="history__title">
                            <h1>
                                Recent Messages to {{$item->course_name}} course
                            </h1>
                        </div>
                        <div class="history__content">
                            @foreach($messages->where('to_course_id', $item->id) as $item_2)
                                @php
                                    $firstName = DB::table('users')
                                    ->where('id',$item_2->from_user_id)->get('firstName')->first()->firstName;
                                    $lastName = DB::table('users')
                                    ->where('id',$item_2->from_user_id)->get('lastName')->first()->lastName;
                                @endphp
                                <div class="content__container">
                                    <div class="history__from">
                                        <h2>{{$firstName}} {{$lastName}} :</h2>
                                    </div>
                                    <div class="history__to">
                                        {{$item_2->title}}
                                        {{$item_2->message_content}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="message__input">
                        <form action="/admin/messages/course" method="post">
                            @csrf
                            <div class="form__inner__container">
                                <div class="form__inner">
                                    <div class="input__title">
                                        <label for="title">Message Title:</label>
                                        <input type="text" name="title" id="title" required autocomplete="off">
                                    </div>
                                    <div class="input__content">
                                        <label for="message_content">Your Content:</label>
                                        <textarea name="message_content" id="message_content" cols="0" rows="7"
                                                  required autocomplete="off">
                                    </textarea>
                                    </div>
                                </div>
                                <button type="submit" class="text-[20px]">
                                    <input type="hidden" name="from_user_id" value="{{session('userID')}}">
                                    <input type="hidden" name="to_course_id" value="{{$item->id}}">
                                    Send Message
                                    <i class="uil uil-message text-[20px]"></i>
                                </button>
                            </div>
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

{{--ALL STAFF OF A DEPARTMENT MESSAGING--}}
<section class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl" id="main-3-3">

    <div class="title__card flex">
        <a class="mx-space-0.2 p-space-0.1 bg-green-op-1 rounded-full tablinks" title="Course Messaging"
           onclick="switchcommon(event, 'main-3-2')"
           style="cursor: pointer">
            <i class="uil uil-arrow-left text-brown text-[30px]"></i>
        </a>

        <h1 class="mx-space-0.2 p-space-0.2 text-[20px] text-brown bg-green-op-1 rounded-xl">
            ALL STAFF OF AN ACADEMY MESSAGES
        </h1>

        <a class="mx-space-0.2 p-space-0.1 bg-green-op-1 rounded-full tablinks" title="Lecturers Messaging"
           onclick="switchcommon(event, 'main-3-4')"
           style="cursor: pointer">
            <i class="uil uil-arrow-right text-brown text-[30px]"></i>
        </a>
    </div>

    <div class="message__card flex">

        <div class="message__navigation">
            <div class="message__search">
                <input type="text" id="myInput" onkeyup="main33()" placeholder="Seach...">
            </div>

            <ul class="message__list" id="myUL">
                @php
                    $counter = 1;
                @endphp
                @foreach($departments as $item)
                    <li class="message__item" id="staff{{ $counter }}">
                        <a style="cursor: pointer">
                            Staff of: <br> {{$item->department_name}} Department
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
            @foreach($departments as $item)
                <div class="message__container" id="staff{{ $counter }}">
                    <div class="message__history my-space-0.3 p-space-0.2">
                        <div class="history__title">
                            <h1>
                                Recent Messages to Staff of {{$item->department_name}} department
                            </h1>
                        </div>
                        <div class="history__content">
                            @foreach($messages->where('to_department_id', $item->id)->where('bulk_send','yes') as $item_2)
                                @php
                                    $firstName = DB::table('users')
                                    ->where('id',$item_2->from_user_id)->get('firstName')->first()->firstName;
                                    $lastName = DB::table('users')
                                    ->where('id',$item_2->from_user_id)->get('lastName')->first()->lastName;
                                @endphp
                                <div class="content__container">
                                    <div class="history__from">
                                        <h2>{{$firstName}} {{$lastName}} :</h2>
                                    </div>
                                    <div class="history__to">
                                        {{$item_2->title}}
                                        {{$item_2->message_content}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="message__input">
                        <form action="/admin/messages/all-staff" method="post">
                            @csrf
                            <div class="form__inner__container">
                                <div class="form__inner">
                                    <div class="input__title">
                                        <label for="title">Message Title:</label>
                                        <input type="text" name="title" id="title" required autocomplete="off">
                                    </div>
                                    <div class="input__content">
                                        <label for="message_content">Your Content:</label>
                                        <textarea name="message_content" id="message_content" cols="0" rows="7" required
                                                  autocomplete="off">
                                    </textarea>
                                    </div>
                                </div>
                                <button type="submit" class="text-[20px]">
                                    <input type="hidden" name="from_user_id" value="{{session('userID')}}">
                                    <input type="hidden" name="to_department_id" value="{{$item->id}}">
                                    Send Message
                                    <i class="uil uil-message text-[20px]"></i>
                                </button>
                            </div>
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

{{--ALL LECTURERS OF A COURSE MESSAGING--}}
<section class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl" id="main-3-4">

    <div class="title__card flex">
        <a class="mx-space-0.2 p-space-0.1 bg-green-op-1 rounded-full tablinks" title="Staff Messaging"
           onclick="switchcommon(event, 'main-3-3')"
           style="cursor: pointer">
            <i class="uil uil-arrow-left text-brown text-[30px]"></i>
        </a>

        <h1 class="mx-space-0.2 p-space-0.2 text-[20px] text-brown bg-green-op-1 rounded-xl">
            ALL LECTURERS OF A COURSE MESSAGES
        </h1>

        <a class="mx-space-0.2 p-space-0.1 bg-green-op-1 rounded-full tablinks" title="Students Messaging"
           onclick="switchcommon(event, 'main-3-5')"
           style="cursor: pointer">
            <i class="uil uil-arrow-right text-brown text-[30px]"></i>
        </a>
    </div>

    <div class="message__card flex">

        <div class="message__navigation">
            <div class="message__search">
                <input type="text" id="myInput" onkeyup="main33()" placeholder="Seach...">
            </div>

            <ul class="message__list" id="myUL">
                @php
                    $counter = 1;
                @endphp
                @foreach($courses as $item)
                    <li class="message__item" id="lecturer{{ $counter }}">
                        <a style="cursor: pointer">
                            Lecturers of: <br> {{$item->course_name}}
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
                <div class="message__container" id="lecturer{{ $counter }}">
                    <div class="message__history my-space-0.3 p-space-0.2">

                        <div class="history__title">
                            <h1>
                                Recent Messages to Lecturers of {{$item->course_name}} course
                            </h1>
                        </div>
                        <div class="history__content">
                            @foreach($messages->where('to_course_id', $item->id)->where('bulk_send','yes') as $item_2)
                                @php
                                    $firstName = DB::table('users')
                                    ->where('id',$item_2->from_user_id)->get('firstName')->first()->firstName;
                                    $lastName = DB::table('users')
                                    ->where('id',$item_2->from_user_id)->get('lastName')->first()->lastName;
                                @endphp
                                <div class="content__container">
                                    <div class="history__from">
                                        <h2>{{$firstName}} {{$lastName}} :</h2>
                                    </div>
                                    <div class="history__to">
                                        {{$item_2->title}}
                                        {{$item_2->message_content}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="message__input">
                        <form action="/admin/messages/all-lecturers" method="post">
                            @csrf
                            <div class="form__inner__container">
                                <div class="form__inner">
                                    <div class="input__title">
                                        <label for="title">Message Title:</label>
                                        <input type="text" name="title" id="title" required autocomplete="off">
                                    </div>
                                    <div class="input__content">
                                        <label for="message_content">Your Content:</label>
                                        <textarea name="message_content" id="message_content" cols="0" rows="7" required
                                                  autocomplete="off">
                                    </textarea>
                                    </div>
                                </div>
                                <button type="submit" class="text-[20px]">
                                    <input type="hidden" name="from_user_id" value="{{session('userID')}}">
                                    <input type="hidden" name="to_course_id" value="{{$item->id}}">
                                    Send Message
                                    <i class="uil uil-message text-[20px]"></i>
                                </button>
                            </div>
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

{{--ALL STUDENTS OF A COURSE MESSAGING--}}
<section class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl" id="main-3-5">

    <div class="title__card flex">
        <a class="mx-space-0.2 p-space-0.1 bg-green-op-1 rounded-full tablinks" title="Lecturers Messaging"
           onclick="switchcommon(event, 'main-3-4')"
           style="cursor: pointer">
            <i class="uil uil-arrow-left text-brown text-[30px]"></i>
        </a>

        <h1 class="mx-space-0.2 p-space-0.2 text-[20px] text-brown bg-green-op-1 rounded-xl">
            ALL STUDENTS OF A COURSE MESSAGES
        </h1>
    </div>

    <div class="message__card flex">

        <div class="message__navigation">
            <div class="message__search">
                <input type="text" id="myInput" onkeyup="main31()" placeholder="Seach...">
            </div>

            <ul class="message__list" id="myUL">
                @php
                    $counter = 1;
                @endphp
                @foreach($courses as $item)
                    <li class="message__item" id="students{{ $counter }}">
                        <a style="cursor: pointer">
                            Students of: <br> {{$item->course_name}}
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
                <div class="message__container" id="students{{ $counter }}">
                    <div class="message__history my-space-0.3 p-space-0.2">

                        <div class="history__title">
                            <h1>
                                Recent Messages to Students of {{$item->course_name}} course
                            </h1>
                        </div>
                        <div class="history__content">
                            @foreach($messages->where('to_department_id', $item->id)->where('bulk_send','no') as $item_2)
                                @php
                                    $firstName = DB::table('users')
                                    ->where('id',$item_2->from_user_id)->get('firstName')->first()->firstName;
                                    $lastName = DB::table('users')
                                    ->where('id',$item_2->from_user_id)->get('lastName')->first()->lastName;
                                @endphp
                                <div class="content__container">
                                    <div class="history__from">
                                        <h2>{{$firstName}} {{$lastName}} :</h2>
                                    </div>
                                    <div class="history__to">
                                        {{$item_2->title}}
                                        {{$item_2->message_content}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="message__input">
                        <form action="/admin/messages/all-students" method="post">
                            @csrf
                            <div class="form__inner__container">
                                <div class="form__inner">
                                    <div class="input__title">
                                        <label for="title">Message Title:</label>
                                        <input type="text" name="title" id="title" required autocomplete="off">
                                    </div>
                                    <div class="input__content">
                                        <label for="message_content">Your Content:</label>
                                        <textarea name="message_content" id="message_content" cols="0" rows="7" required
                                                  autocomplete="off">
                                    </textarea>
                                    </div>
                                </div>
                                <button type="submit" class="text-[20px]">
                                    <input type="hidden" name="from_user_id" value="{{session('userID')}}">
                                    <input type="hidden" name="to_course_id" value="{{$item->id}}">
                                    Send Message
                                    <i class="uil uil-message text-[20px]"></i>
                                </button>
                            </div>
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
