<x-mail::message>
# Dear {{$firstName}} {{$lastName}}

Greetings,<br>
I hope you are well, and you had a restful break.
Classes will start on 4th February 2023.
<br>
Here is a list of available units:
<br>

<ul>
@foreach (explode("\n", $unitList) as $unit)
<li>{{ $unit }}</li>
@endforeach
</ul>

<br>
We shall inform you when to self register for the units.
<br>

Regards,<br>
{{ config('app.name') }}
</x-mail::message>
