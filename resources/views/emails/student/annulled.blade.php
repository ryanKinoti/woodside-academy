<x-mail::message>
# Dear Applicant {{$firstname}} {{$lastname}},

We at Woodside Academy would like to thank you for your application for the position in the {{$course}}
course, where we have acknowledged your application and took it into consideration.
<br><br>
However, we wish to inform you that after careful consideration, your application to the
{{$course}} course was unsuccessful.
<br>
In spite of this, we will keep your application in mind and get back to you via email the moment the position you
applied for was successful

Kindest Regards,<br>
{{ config('app.name') }}
</x-mail::message>
