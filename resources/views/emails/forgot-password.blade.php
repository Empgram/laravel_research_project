@component('mail::message')
# Reset Password

You are receiving this email because a password reset request was made for your account.

@component('mail::button', ['url' => $url])
Reset Password
@endcomponent

If you did not request a password reset, no further action is required.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
