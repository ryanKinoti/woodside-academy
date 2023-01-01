<x-mail::message>
# Dear Applicant {{$firstname}} {{$lastname}},
<br>
It is with utmost pleasure that I write to you on behalf of Woodside Academy to inform you of your
provisional admission into the {{$course}} course.
<br><br>
The above-mentioned course is scheduled to start on 1st February 2023 and as such we would like
Mr./Ms. {{$firstname}}
to avail yourself at the Academy premises 1 week earlier for further admission formalities.
<br><br>
Our admission round is extremely competitive, and we would like to congratulate you on your successful application.

<x-mail::button url="{{ 'http://127.0.0.1:8000/student/register/' . $application_id . '/student' }}">
Complete your Registration
</x-mail::button>

Kindest regards,<br>
{{ config('app.name') }}
</x-mail::message>
