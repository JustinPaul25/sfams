<x-mail::message>
# Hello {{ $student->first_name }}

Welcome to Philippine Baptist Christian College of Mindanao, Inc.

This is your credentials to login in our web portal.

Email: {{$student->email}}<br>
Password: sfams_password_{{ $student->id }}

You may also pay using our Gcash
<b>09098171640</b>

Note: Please be careful with this informations.
Since the password is default please login and reset password immediately.

<x-mail::button :url="$url" color="primary">
Go to SFAMS
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
