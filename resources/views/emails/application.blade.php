<x-mail::message>
# Your Application Was Successful

The body of your message.

<x-mail::button :url="''">
Click to Complete Registration
</x-mail::button>

Kindest Regards,<br>
{{ config('app.name') }}
</x-mail::message>
