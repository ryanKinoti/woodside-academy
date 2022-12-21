<x-mail::message>
# Dear {{$firstname}} {{$lastname}},
<br>
It is with utmost pleasure that I write to you on behalf of Woodside Academy to inform you of your
provisional admission into the {{$course}} course of the {{$faculty}} faculty.
<br><br>
The course is scheduled to start on 1st February 2023.
<br><br>
Details on the modalities of teaching and learning including the resumption of on-campus activities will be
communicated in due course by the Academy. This is fully dependent on the Government of Kenya’s directives
that will be in place on institutions of higher learning due to the ongoing pandemic.
<br><br>
Our admission round is extremely competitive, and we would like to congratulate you on your successful application.

<x-mail::button :url="'http://127.0.0.1:8000/student/register'">
Complete your Registration
</x-mail::button>

Kindest regards,<br>
{{ config('app.name') }}
</x-mail::message>
