<x-mail::message>

# Application for your Student Position

Dear {{$firstname}} {{$lastname}}, <br><br>
It is with utmost pleasure that I write to you on behalf of Woodside Academy to inform you of your
provisional admission into the {{$course}} course of the {{$faculty}} faculty.
<br><br>
The course is scheduled to start on 1st January 2023.

<x-mail::button :url="'http://127.0.0.1:8000'">
Complete your Registration
</x-mail::button>

Kindest regards,<br>
{{ config('app.name') }}
</x-mail::message>
