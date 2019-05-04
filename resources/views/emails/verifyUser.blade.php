@component('mail::message')
# Welcome to Phone Friend

Welcome to the site {{ucwords($user['name'])}}

Please click on the below link to verify your email account.
@component('mail::button', ['url' => url('user/verify', $user->verifyUser->token)])
Confirm your Account
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent