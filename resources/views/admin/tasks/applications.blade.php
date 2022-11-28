@php
    use Illuminate\Support\Facades\DB;
@endphp
<section class="tabcontent ml-[17%]" id="main-2">

    <div class="title_card">
        <div style="width: fit-content">
            <h1>
                STUDENT APPLICATIONS
            </h1>
        </div>
    </div>

    <div class="content">
        <table>
            <tr class="thead">
                <td><u>First Name</u></td>
                <td><u>Last Name</u></td>
                <td><u>Phone Number</u></td>
                <td><u>Email</u></td>
                <td><u>Gender</u></td>
                <td><u>Course Applied</u></td>
                <td><u>Action</u></td>
            </tr>

            @foreach($students as $student)
                <tr class="tbody">
                    @php
                        $coursename = DB::table('courses')
                        ->where('id',$student->course_id)->get('course_name')->first()->course_name;
                    @endphp
                    <td>{{$student->first_name}}</td>
                    <td>{{$student->last_name}}</td>
                    <td>{{$student->phone_number}}</td>
                    <td>{{$student->email }}</td>
                    <td>{{$student->gender}}</td>
                    <td>{{$coursename}}</td>
                    <td>
                        <form action="/admin/student-email" method="post">
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

<section class="tabcontent ml-[17%]" id="main-3">

    <div class="title_card">
        <div style="width: fit-content">
            <h1>
                LECTURER APPLICATIONS
            </h1>
        </div>
    </div>

    <div class="content">
        <table>
            <tr class="thead">
                <td><u>First Name</u></td>
                <td><u>Last Name</u></td>
                <td><u>Phone Number</u></td>
                <td><u>Email</u></td>
                <td><u>Gender</u></td>
                <td><u>Course Applied</u></td>
                <td><u>Action</u></td>
            </tr>

            @foreach($lecturers as $lecturer)
                <tr class="tbody">
                    @php
                        $coursename = DB::table('courses')
                        ->where('id',$lecturer->course_id)->get('course_name')->first()->course_name;
                    @endphp
                    <td>{{$lecturer->first_name}}</td>
                    <td>{{$lecturer->last_name}}</td>
                    <td>{{$lecturer->phone_number}}</td>
                    <td>{{$lecturer->email }}</td>
                    <td>{{$lecturer->gender}}</td>
                    <td>{{$coursename}}</td>
                    <td>
                        <form action="/admin/lecturer-email" method="post">
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

<style>
    table {
        padding: 10px;
        text-indent: 0;
        border-color: inherit;
        border-collapse: collapse;
    }

    .thead {
        border-collapse: separate;
        border-spacing: 0 15px;
        border-radius: 10px;
    }

    .thead td, .tbody td {
        color: #4a271d;
        width: fit-content;
        text-align: center;
        padding: 15px;
        border: 2px solid whitesmoke;
    }
</style>
