<x-mail::message>
# Hello {{ $student->first_name }}

Thank you for paying, below is the description of your payment.

{{ $desc }}

<x-mail::button :url="$url" color="primary">
SFAMS Link
</x-mail::button>

Regards,<br>
{{ config('app.name') }}
</x-mail::message>
