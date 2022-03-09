@component('mail::message')
# Forgot Password 

Click the button to reset your password 

@component('mail::button', ['url' => '/auth/resetpassword'])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
