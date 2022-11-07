<x-mail::message>
# Hello {{ $student->first_name }}

Welcome to Philippine Baptist Christian College of Mindanao, Inc.

This is your credentials to login in our we application.

Email: {{$student->email}}<br>
Password: sfams_password_{{ $student->id }}

Note: Please be careful with this informations.

<x-mail::button :url="$url" color="primary">
Go to SFAMS
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
