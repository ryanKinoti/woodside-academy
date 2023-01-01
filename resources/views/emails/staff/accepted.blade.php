<x-mail::message>
# Dear Applicant {{$firstname}} {{$lastname}},
<br>
It is with utmost pleasure that I write to you on behalf of Woodside Academy to inform you of your acceptance and
hiring into the {{$department}} department of the {{$faculty}} faculty.
<br><br>
Due to our education procedures taking place and opening of the school on 1st February 2023 we would like you Mr./Ms. {{$firstname}}
to avail yourself 3 weeks prior to the above-mentioned date in order complete your successful hiring formalities at the
Academy.
<br><br>
Our hiring round is extremely competitive, and we would like to congratulate you on your successful application.

<x-mail::button url="{{ 'http://127.0.0.1:8000/staff/register/' . $application_id . '/staff' }}">
Complete your Registration
</x-mail::button>

Kindest regards,<br>
{{ config('app.name') }}
</x-mail::message>
