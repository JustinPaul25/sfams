<x-mail::message>
# Hello {{ $branch->name }} Officer,

This is your credentials to login in our web portal.

Email: {{ $user->email }}<br>
Password: branchpassword

Since the password is default please login and reset password immediately.

<x-mail::button :url="$url" color="primary">
    Go to SFAMS
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
