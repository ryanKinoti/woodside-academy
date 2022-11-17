<x-mail::message>
# Your Application Was Successful

Congratulations,
    Your Application to our Academy has been accepted,
    Kindly click the button bellow to proceed to registration

<x-mail::button :url="'http://127.0.0.1:8000'">
Complete Registration
</x-mail::button>

Kindest Regards,<br>
{{ config('app.name') }}
</x-mail::message>
