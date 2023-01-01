<x-mail::message>
# Dear Applicant {{$firstname}} {{$lastname}},
<br>
It is with utmost pleasure that I write to you on behalf of Woodside Academy to inform you of your acceptance and
hiring into the {{$department}} department.
<br>
Likewise your application of teaching the {{$course}} course has been accepted.
<br><br>
The above-mentioned course is scheduled to start on 1st February 2023 and as such we would like Mr./Ms. {{$firstname}}
to avail yourself at the Academy premises 2 weeks earlier for further formalities.
<br><br>
Our hiring round is extremely competitive, and as such we would like to congratulate you on your successful application.

<x-mail::button url="{{ 'http://127.0.0.1:8000/lecturer/register/' . $application_id . '/lecturer' }}">
Complete your Registration
</x-mail::button>

Kindest regards,<br>
{{ config('app.name') }}
</x-mail::message>
