@php
    use Illuminate\Support\Facades\DB;
@endphp

<section class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl" id="main-2-1">
    <div class="title__card flex">
        <h1 class="mx-space-0.2 p-space-0.2 text-[20px] text-brown bg-green-op-1 rounded-xl">
            STAFF APPLICATIONS
        </h1>

        <a class="mx-space-0.2 p-space-0.1 bg-green-op-1 rounded-full tablinks" title="Lecturer's Application"
           onclick="switchcommon(event, 'main-2-2')"
           style="cursor: pointer">
            <i class="uil uil-arrow-right text-brown text-[30px]"></i>
        </a>
    </div>

    <div class="content">
        <table>
            <tr class="thead">
                <td><h1>First Name</h1></td>
                <td><h1>Last Name</h1></td>
                <td><h1>Phone Number</h1></td>
                <td><h1>Email</h1></td>
                <td><h1>Gender</h1></td>
                <td><h1>Faculty Applied</h1></td>
                <td><h1>Application Status</h1></td>
                <td><h1>Action</h1></td>
            </tr>

            @foreach($staffs as $staff)
                <tr class="tbody">
                    @php
                        $facultyname = DB::table('faculties')->where('id', $staff->faculty_id)->get('faculty_name')->first()->faculty_name;
                        $status = DB::table('application_states')
                            ->selectRaw('application_states.status as status')
                            ->join('applications', 'application_states.application_id', '=', 'applications.id')
                            ->where('applications.id',$staff->id)
                            ->get()
                            ->first();
                    @endphp
                    <td>{{$staff->first_name}}</td>
                    <td>{{$staff->last_name}}</td>
                    <td>{{$staff->phone_number}}</td>
                    <td>{{$staff->email }}</td>
                    <td>{{$staff->gender}}</td>
                    <td>{{$facultyname}}</td>
                    @if($status->status == 'pending')
                        <td>
                            <h2 class="bg-red p-space-0.1 text-[white]">{{$status->status}}</h2>
                        </td>
                    @elseif($status->status == 'accepted')
                        <td>
                            <h2 class="bg-brown p-space-0.1 text-[black]">{{$status->status}}</h2>
                        </td>
                    @elseif($status->status == 'registered')
                        <td>
                            <h2 class="bg-alert-green p-space-0.1">{{$status->status}}</h2>
                        </td>
                    @elseif($status->status == 'annulled')
                        <td>
                            <h2 class="bg-gray p-space-0.1 text-[black]">{{$status->status}}</h2>
                        </td>
                    @endif
                    <td>
                        <form action="/admin/emailing/staff-email" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$staff->id}}">
                            <input type="hidden" name="facultyID" value="{{$staff->faculty_id}}">
                            <button type="submit">Send Confirmation</button>
                        </form>

                    </td>
                </tr>
            @endforeach

        </table>
    </div>

</section>

<section class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl" id="main-2-2">
    <div class="title_card flex">
        <a class="mx-space-0.2 p-space-0.1 bg-green-op-1 rounded-full tablinks" title="Staff's Applications"
           onclick="switchcommon(event, 'main-2-1')"
           style="cursor: pointer">
            <i class="uil uil-arrow-left text-brown text-[30px]"></i>
        </a>

        <h1 class="mx-space-0.2 p-space-0.2 text-[20px] text-brown bg-green-op-1 rounded-xl">
            LECTURER APPLICATIONS
        </h1>

        <a class="mx-space-0.2 p-space-0.1 bg-green-op-1 rounded-full tablinks" title="Students' Application"
           onclick="switchcommon(event, 'main-2-3')"
           style="cursor: pointer">
            <i class="uil uil-arrow-right text-brown text-[30px]"></i>
        </a>
    </div>

    <div class="content">
        <table>
            <tr class="thead">
                <td><h1>First Name</h1></td>
                <td><h1>Last Name</h1></td>
                <td><h1>Phone Number</h1></td>
                <td><h1>Email</h1></td>
                <td><h1>Gender</h1></td>
                <td><h1>Course Applied</h1></td>
                <td><h1>Application Status</h1></td>
                <td><h1>Action</h1></td>
            </tr>

            @foreach($lecturers as $lecturer)
                <tr class="tbody">
                    @php
                        $abbreviation = DB::table('courses')
                        ->where('id',$lecturer->course_id)->get('abbreviation')->first()->abbreviation;
                        $coursename = DB::table('courses')
                        ->where('id',$lecturer->course_id)->get('course_name')->first()->course_name;

                        $status = DB::table('application_states')
                            ->selectRaw('application_states.status as status')
                            ->join('applications', 'application_states.application_id', '=', 'applications.id')
                            ->where('applications.id',$lecturer->id)
                            ->get()
                            ->first();
                    @endphp
                    <td>{{$lecturer->first_name}}</td>
                    <td>{{$lecturer->last_name}}</td>
                    <td>{{$lecturer->phone_number}}</td>
                    <td>{{$lecturer->email }}</td>
                    <td>{{$lecturer->gender}}</td>
                    <td>{{$abbreviation}}</td>
                    @if($status->status == 'pending')
                        <td>
                            <h2 class="bg-red p-space-0.1 text-[white]">{{$status->status}}</h2>
                        </td>
                    @elseif($status->status == 'accepted')
                        <td>
                            <h2 class="bg-brown p-space-0.1 text-[black]">{{$status->status}}</h2>
                        </td>
                    @elseif($status->status == 'registered')
                        <td>
                            <h2 class="bg-alert-green p-space-0.1">{{$status->status}}</h2>
                        </td>
                    @elseif($status->status == 'annulled')
                        <td>
                            <h2 class="bg-gray p-space-0.1 text-[black]">{{$status->status}}</h2>
                        </td>
                    @endif
                    <td>
                        <form action="/admin/emailing/lecturer-email" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$lecturer->id}}">
                            <input type="hidden" name="coursename" value="{{$coursename}}">
                            <button type="submit">Send Confirmation</button>
                        </form>

                    </td>
                </tr>
            @endforeach

        </table>
    </div>

</section>

<section class="tabcontent mr-[1%] ml-[19%] my-space-0.3 w-v-w p-space-0.3 bg-green-op-2 rounded-xl" id="main-2-3">
    <div class="title_card flex">
        <a class="mx-space-0.2 p-space-0.1 bg-green-op-1 rounded-full tablinks" title="Lecturer's Application"
           onclick="switchcommon(event, 'main-2-2')"
           style="cursor: pointer">
            <i class="uil uil-arrow-left text-brown text-[30px]"></i>
        </a>

        <h1 class="mx-space-0.2 p-space-0.2 text-[20px] text-brown bg-green-op-1 rounded-xl">
            STUDENT APPLICATIONS
        </h1>
    </div>

    <div class="content">
        <table>
            <tr class="thead">
                <td col-index="1"><h1>First Name</h1></td>
                <td col-index="2"><h1>Last Name</h1></td>
                <td col-index="3"><h1>Phone Number</h1></td>
                <td col-index="4"><h1>Email</h1></td>
                <td col-index="5"><h1>Gender</h1></td>
                <td col-index="6"><h1>Course Applied</h1></td>
                <td col-index="7"><h1>Application Status</h1></td>
                <td><h1>Action</h1></td>
            </tr>

            @foreach($students as $student)
                <tr class="tbody">
                    @php
                        $abbreviation = DB::table('courses')
                        ->where('id',$student->course_id)->get('abbreviation')->first()->abbreviation;
                        $coursename = DB::table('courses')
                        ->where('id',$student->course_id)->get('course_name')->first()->course_name;

                        $status = DB::table('application_states')
                            ->selectRaw('application_states.status as status')
                            ->join('applications', 'application_states.application_id', '=', 'applications.id')
                            ->where('applications.id',$student->id)
                            ->get()
                            ->first();
                    @endphp
                    <td>{{$student->first_name}}</td>
                    <td>{{$student->last_name}}</td>
                    <td>{{$student->phone_number}}</td>
                    <td>{{$student->email }}</td>
                    <td>{{$student->gender}}</td>
                    <td>{{$abbreviation}}</td>
                    @if($status->status == 'pending')
                        <td>
                            <h2 class="bg-red p-space-0.1 text-[white]">{{$status->status}}</h2>
                        </td>
                    @elseif($status->status == 'accepted')
                        <td>
                            <h2 class="bg-brown p-space-0.1 text-[black]">{{$status->status}}</h2>
                        </td>
                    @elseif($status->status == 'registered')
                        <td>
                            <h2 class="bg-alert-green p-space-0.1">{{$status->status}}</h2>
                        </td>
                    @elseif($status->status == 'annulled')
                        <td>
                            <h2 class="bg-gray p-space-0.1 text-[black]">{{$status->status}}</h2>
                        </td>
                    @endif
                    <td>
                        <form action="/admin/emailing/student-email" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$student->id}}">
                            <input type="hidden" name="coursename" value="{{$coursename}}">
                            <button type="submit">Send Confirmation</button>
                        </form>

                    </td>
                </tr>
            @endforeach

        </table>
    </div>

</section>

<style> @import "{{asset('css/tables.css')}}"; </style>
