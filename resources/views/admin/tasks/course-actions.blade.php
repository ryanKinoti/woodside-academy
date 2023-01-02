@php
    use Illuminate\Support\Facades\DB;
@endphp
<section class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl" id="main-4-1">

    <div class="title_card flex mb-space-0.3">

        <h1 class="mx-space-0.2 p-space-0.2 text-[20px] text-brown bg-green-op-1 rounded-xl">
            COURSE SETTINGS
        </h1>

        <a class="mx-space-0.2 p-space-0.1 bg-green-op-1 rounded-full tablinks" title="Unit Seetings"
           onclick="switchcommon(event, 'main-4-2')"
           style="cursor: pointer">
            <i class="uil uil-arrow-right text-brown text-[30px]"></i>
        </a>
    </div>

    <div class="settings__container flex">

        <div class="settings__Listing">
            <table>
                <tr class="thead">
                    <td><h1>Course Id</h1></td>
                    <td><h1>Course Name</h1></td>
                    <td><h1>Course Status</h1></td>
                    <td><h1>Associated Faculty</h1></td>
                    <td><h1>action 1</h1></td>
                    <td><h1>action 2</h1></td>
                </tr>
                @foreach($courses as $item)
                    <tr class="tbody">
                        @php
                            $facultyname = DB::table('faculties')
                            ->where('id',$item->faculty_id)->get('faculty_name')->first()->faculty_name;
                        @endphp
                        <td>#{{$item->id}}</td>
                        <td>{{$item->course_name}}</td>
                        @if($item->course_status === "open")
                            <td>
                                <h2 class="bg-alert-green p-space-0.1">{{$item->course_status}}</h2>
                            </td>
                        @else
                            <td>
                                <h2 class="bg-red p-space-0.1 text-[white]">{{$item->course_status}}</h2>
                            </td>
                        @endif
                        <td>{{$facultyname}}</td>
                        <td>
                            <form action="/admin/education/open-status" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <input type="hidden" name="type" value="course">
                                <button type="submit">Open Course</button>
                            </form>
                        </td>
                        <td>
                            <form action="/admin/education/close-status" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <input type="hidden" name="type" value="course">
                                <button type="submit">Close Course</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="settings__editing">
            <div class="editing__header">
                <h2>Create New Course</h2>
            </div>

            <div class="editing__container">
                <form action="/admin/education/add-course" method="post">
                    @csrf
                    <div class="settings__context">
                        <label for="courses">Select Associated Faculty:</label>
                        <select name="faculty_id" id="courses">
                            @foreach($faculties as $faculty)
                                <option value="{{$faculty->id}}">{{$faculty->faculty_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="settings__context">
                        <label for="name">Course Name:</label>
                        <input type="text" name="course_name" id="name">
                    </div>
                    <div class="settings__context">
                        <label for="abbreviation">Course Abbreviation:</label>
                        <input type="text" name="course_abbreviation" id="abbreviation">
                    </div>
                    <div class="settings__context">
                        <label for="year">Course Duration:</label>
                        <input type="text" name="course_years_duration" id="year">
                    </div>
                    <div class="settings__context">
                        <label for="number">Number of Semesters:</label>
                        <select name="number_of_semesters" id="number">
                            <option value="1">One Semester</option>
                            <option value="2">Two Semesters</option>
                            <option value="3">Three Semesters</option>
                        </select>
                    </div>

                    <div class="set__button">
                        <button type="submit" class="button w-[3.125rem]">Add</button>
                    </div>

                </form>
            </div>
        </div>

    </div>

</section>

<section class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl" id="main-4-2">

    <div class="title_card flex mb-space-0.3">
        <a class="mx-space-0.2 p-space-0.1 bg-green-op-1 rounded-full tablinks" title="Course Settings"
           onclick="switchcommon(event, 'main-4-1')"
           style="cursor: pointer">
            <i class="uil uil-arrow-left text-brown text-[30px]"></i>
        </a>

        <h1 class="mx-space-0.2 p-space-0.2 text-[20px] text-brown bg-green-op-1 rounded-xl">
            UNIT SETTINGS
        </h1>

        <a class="mx-space-0.2 p-space-0.1 bg-green-op-1 rounded-full tablinks" title="Unit Alert Settings"
           onclick="switchcommon(event, 'main-4-3')"
           style="cursor: pointer">
            <i class="uil uil-arrow-right text-brown text-[30px]"></i>
        </a>
    </div>

    <div class="settings__container flex">

        <div class="settings__Listing">
            <table>
                <tr class="thead">
                    <td><h1>Unit Id</h1></td>
                    <td><h1>Unit Name</h1></td>
                    <td><h1>Unit Year</h1></td>
                    <td><h1>Unit Semester</h1></td>
                    <td><h1>Unit Status</h1></td>
                    <td><h1>Associated Course</h1></td>
                    <td><h1>action 1</h1></td>
                    <td><h1>action 2</h1></td>
                </tr>
                @foreach($units as $item)
                    <tr class="tbody">
                        @php
                            $coursename = DB::table('courses')
                            ->where('id',$item->course_id)->get('course_name')->first()->course_name;
                        @endphp
                        <td>#{{$item->id}}</td>
                        <td>{{$item->unit_name}}</td>
                        <td>{{$item->unit_year}}</td>
                        <td>{{$item->unit_semester}} semester</td>
                        @if($item->unit_status === "available")
                            <td>
                                <h2 class="bg-alert-green p-space-0.1">{{$item->unit_status}}</h2>
                            </td>
                        @else
                            <td>
                                <h2 class="bg-red p-space-0.1 text-[white]">{{$item->unit_status}}</h2>
                            </td>
                        @endif
                        <td>{{$coursename}}</td>
                        <td>
                            <form action="/admin/education/open-status" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <input type="hidden" name="type" value="unit">
                                <button type="submit">Open Unit</button>
                            </form>
                        </td>
                        <td>
                            <form action="/admin/education/close-status" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <input type="hidden" name="type" value="unit">
                                <button type="submit">Close Unit</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="settings__editing">
            <div class="editing__header">
                <h2>Create New Unit</h2>
            </div>

            <div class="editing__container">
                <form action="/admin/education/add-unit" method="post">
                    @csrf
                    <div class="settings__context">
                        <label for="courses">Select Associated Course:</label>
                        <select name="course_id" id="courses">
                            @foreach($courses as $course)
                                @if($course->course_status === "open")
                                    <option value="{{$course->id}}">{{$course->abbreviation}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="settings__context">
                        <label for="name">Unit Name:</label>
                        <input type="text" name="unit_name" id="name">
                    </div>
                    <div class="settings__context">
                        <label for="year">Unit Year:</label>
                        <input type="text" name="unit_year" id="year">
                    </div>
                    <div class="settings__context">
                        <label for="semester">Unit Semester:</label>
                        <select name="unit_semester" id="semester">
                            <option value="first">First Semester</option>
                            <option value="second">Second Semester</option>
                        </select>
                    </div>

                    <div class="set__button">
                        <button type="submit" class="button w-[3.125rem]">Add</button>
                    </div>

                </form>
            </div>
        </div>

    </div>

</section>


<section class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl" id="main-4-3">
    <div class="title_card flex mb-space-0.3">
        <a class="mx-space-0.2 p-space-0.1 bg-green-op-1 rounded-full tablinks" title="Unit Settings"
           onclick="switchcommon(event, 'main-4-2')"
           style="cursor: pointer">
            <i class="uil uil-arrow-left text-brown text-[30px]"></i>
        </a>

        <h1 class="mx-space-0.2 p-space-0.2 text-[20px] text-brown bg-green-op-1 rounded-xl">
            UNIT ALERT NOTIFICATIONS
        </h1>
    </div>

    <div class="settings__container flex">

        <div class="settings__Listing">
            <table>
                <tr class="thead">
                    <td><h1>Unit Id</h1></td>
                    <td><h1>Unit Name</h1></td>
                    <td><h1>Unit Year</h1></td>
                    <td><h1>Unit Semester</h1></td>
                    <td><h1>Unit Status</h1></td>
                    <td><h1>Associated Course</h1></td>
                </tr>
                @foreach($units as $item)
                    <tr class="tbody">
                        @php
                            $coursename = DB::table('courses')
                            ->where('id',$item->course_id)->get('course_name')->first()->course_name;
                        @endphp
                        <td>#{{$item->id}}</td>
                        <td>{{$item->unit_name}}</td>
                        <td>{{$item->unit_year}}</td>
                        <td>{{$item->unit_semester}} semester</td>
                        @if($item->unit_status === "available")
                            <td>
                                <h2 class="bg-alert-green p-space-0.1">{{$item->unit_status}}</h2>
                            </td>
                        @else
                            <td>
                                <h2 class="bg-red p-space-0.1 text-[white]">{{$item->unit_status}}</h2>
                            </td>
                        @endif
                        <td>{{$coursename}}</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="settings__editing">
            <div class="editing__header">
                <h2>Alert Specific groups</h2>
            </div>

            <div class="editing__container">
                @foreach ($openCourses as $item)

                    <form action="/admin/emailing/unit-register" method="post" class="editing__form">
                        @csrf
                        <input type="hidden" name="course_id" value="{{$item->id}}">
                        <button type="submit">
                            Click to Notify all Students of:
                            {{ $item->abbreviation }}
                        </button>
                        <div class="editing__form__inner">
                            <h2>List of Available Units</h2>
                            @foreach ($openUnits->where('course_id',$item->id) as $item_2)
                                <div class="flex">
                                    - <h3>{{ $item_2->unit_name }}</h3>
                                </div>
                            @endforeach
                        </div>
                    </form>

                @endforeach
            </div>
        </div>

    </div>

</section>
<style> @import "{{asset('css/tables.css')}}"; </style>
