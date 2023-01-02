<x-mail::message>
# Dear Applicant {{$firstname}} {{$lastname}},

We at Woodside Academy would like to thank you for your application for the position in the {{$department}}
department of the {{$faculty}} faculty, where we have acknowledged your application and took it into consideration.
<br><br>
However, we wish to inform you that after careful consideration, your application to the
{{$department}} department was unsuccessful.
<br>
In spite of this, we will keep your application in mind and get back to you via email the moment the position you
applied for was successful

Kindest Regards,<br>
{{ config('app.name') }}
</x-mail::message>
