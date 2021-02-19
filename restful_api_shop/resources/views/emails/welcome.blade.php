@component('mail::message')
# Hello {{$user->name}} 

Thank You for create an account. Please verify your email.

@component('mail::button',['url'=>route('verify',$user->verification_token)])
Verify Account
@endcomponent
Thanks,<br>
{{config('app.name')}}

@endcomponent