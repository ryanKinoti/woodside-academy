<x-mail::message>
# Dear {{$firstname}} {{$lastname}},
<br>
It is with utmost pleasure that I write to you on behalf of Woodside Academy to inform you of your acceptance and
hiring into the {{$faculty}} faculty.
<br><br>
The course is scheduled to start on 1st February 2023.
<br><br>
Details on the modalities of workload assignment and supervision including the resumption of on-campus activities will be
communicated in due course by the Academy. This is fully dependent on the Government of Kenya’s directives
that will be in place on institutions of higher learning due to the ongoing pandemic.
<br><br>
Our hiring round is extremely competitive, and we would like to congratulate you on your successful application.

<x-mail::button :url="'http://127.0.0.1:8000/staff/register'">
Complete your Registration
</x-mail::button>

Kindest regards,<br>
{{ config('app.name') }}
</x-mail::message>
